<?php
/**
 * Thrust: The Audit Management Tool
 * 
 * @author: Sanjay Suthar
 * @email:  ss2445@gmail.com
 * @version:	2.0
 * @since:	v2.0
 */
App::uses('AppController', 'Controller');

/**
 * Class UsersController
 * Manage Thrust Users and All User's Related Actions
 * @author Sanjay Suthar
 */
class UsersController extends AppController {

    public $components = array('Paginator');
    protected $adminActions = array('resetPassword', 'add', 'edit', 'index', 'delete', 'changeTeam', 'updateThrustFromRepo');

    public function beforefilter() {
        parent::beforeFilter();
        $this->Auth->allow('forgotPassword');
        //checking admin action access
        if(in_array($this->action, $this->adminActions) && !$this->isAuthorized($this->Auth->user())) {
            return $this->redirect($this->Auth->redirectUrl());
        }
    }

    /*
     * All Private/Protected Functions below this
     */

    /**
     * Fetch password reset requests for Admin
     * @role Admin
     */
    private function getPasswordResetRequests() {
        $options = array('conditions' => array('User.forgot_flag' => 1), 'fields'=>'count(*) as count');
        $record = $this->User->find('first', $options);
        if(!empty($record) && $record[0]['count'] != '0'){
            $this->Session->write('resetPasswordCount', $record[0]['count']);
        } else {
            $this->Session->delete('resetPasswordCount');
        }
    }

    /*
     * All Public Functions below this
     */

    /**
     * Login function, if user already logged in redirect user to home page
     * else, check for Auth Login
     * If user is Admin, Team check is disabled, and load Password Reset requests from db
     */
    public function login() {
        //if already logged in, then directly redirect to home page
        if(!is_null($this->Auth->user())) {
            return $this->redirect($this->Auth->redirectUrl());
        }
        if ($this->request->is('post')) {
            $team = $this->request->data['User']['team'];
            if ($this->Auth->login()) {
                //if admin by pass team check
                if($this->Auth->user('role') == 'admin' || $team == $this->Auth->user('Teams.id')) {
                    if($this->Auth->user('role') == 'admin') {
                        $this->getPasswordResetRequests();
                    }
                    $this->setFlash('Login Success!!', AppController::$INFO);
                    return $this->redirect($this->Auth->redirectUrl());
                } else {
                    //if failed to validate team, immediately logout the Auth component
                    $this->Auth->logout();
                }
            }
            $this->setFlash('Invalid username or password, try again', AppController::$WARNING);
        }
    }

    /**
     * Logout function
     * Destroy session and log user out.
     */
    public function logout() {
        //Auth Component Logout, auto destroy session
        $this->Session->destroy();
        return $this->redirect($this->Auth->logout());
    }

    /**
     * Sending request to Admin for reset password
     * Auto update forgot flag of User if a userid match found and User is not Admin
     */
    public function forgotPassword(){
        if( $this->request->is('post') ) {
            $userid = $this->request->data['User']['userid'];
            $options = array('conditions' => array('User.userid' => $userid), 'fields'=>'id, forgot_flag, role');
            $record = $this->User->find('first', $options);
            if(!empty($record) && $record['User']['role'] != 'admin') {
                $record['User']['forgot_flag'] = '1';
                $this->User->save($record, array('validate'=>false));
            }
            $this->setFlash('Request has been send to Admin, If there is a match with User ID.', AppController::$INFO);
            $this->redirect(array('action' => 'login'));
        }
    }

    /**
     * Change Password for currently logged in User
     * Validates old password before changing it
     * @ref User.Model class for logic
     */
    public function changePassword() {
        if ($this->request->is(array('post', 'put'))) {
            if ($this->User->save($this->request->data)) {
                $this->setFlash('Password changed Successfully.', AppController::$SUCCESS);
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->setFlash(AppController::$errorMessage, AppController::$DANGER);
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $this->Auth->user('id')));
            $this->request->data = $this->User->find('first', $options);
            //removing existing password from request, not to be displayed on UI
            $this->request->data['User']['secret'] = '';
        }
    }

    /*
     * All Admin Role functions below this
     */

    /**
     * Add New Thrust User
     * @role Admin
     */
    public function add() {
        if ($this->request->is('post')) {
            if ($this->User->save($this->request->data)) {
                $this->setFlash('New User has been Created!', AppController::$SUCCESS);
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->setFlash(AppController::$errorMessage, AppController::$DANGER);
            }
        }
    }

    /**
     * Default Controller Action
     * List Thrust Users having role = 'auditor', Making sure that we won't display Admin here due to Security Reasons
     * @role Admin
     */
    public function index() {
        $this->User->recursive = 0;
		$this->set('users', $this->User->find('all', array(
            'conditions' => array('User.role' => 'auditor')
        )));
    }

    /**
     * Edit Thrust User Details
     * @role Admin
     * @param null $id
     * @throws NotFoundException
     */
    public function edit($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__(AppController::$invalidRequestMessage));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->User->save($this->request->data)) {
                $this->setFlash('User details has been saved.', AppController::$SUCCESS);
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->setFlash(AppController::$errorMessage, AppController::$DANGER);
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
    }


    /**
     * Delete Thrust User
     * @role Admin
     * @param null $id
     * @throws NotFoundException
     */
    public function delete($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__(AppController::$invalidRequestMessage));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->User->delete()) {
            $this->setFlash('User has been deleted.', AppController::$SUCCESS);
        } else {
            $this->setFlash(AppController::$errorMessage, AppController::$DANGER);
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * Reset Password for any user without checking on old password
     * @role Admin
     * @param null $id
     * @throws NotFoundException
     */
    public function resetPassword($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__(AppController::$invalidRequestMessage));
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->request->data['User']['forgot_flag'] = 0;
            if ($this->User->save($this->request->data)) {
                $this->setFlash('Password Reset Successfully.', AppController::$SUCCESS);
                //reloading password reset requests
                $this->getPasswordResetRequests();
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->setFlash(AppController::$errorMessage, AppController::$DANGER);
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
            //removing existing password from request, not to be displayed on UI
            $this->request->data['User']['secret'] = '';
        }
    }

    /**
     * Login as any team
     * @role Admin
     * @param null $id
     */
    public function changeTeam($id = null){
        //Auto validate team id using getTeamName() method
        $this->getTeamName($id);
        $this->loadModel('Team');
        $options = array('conditions'=>array('Team.id'=>$id));
        //Unbind associated Model, we don't want User data here
        $this->Team->unbindModel(
            array('hasMany' => array('User'))
        );
        $record = $this->Team->find('first', $options);
        $user = $this->Auth->user();
        //Altering session data for team and setting back, Careful here, Critical data change
        $user['Teams'] = $record['Team'];
        $user['teams_id'] = $id;
        if($this->Session->write('Auth.User', $user)){
            $this->setFlash('Logged in as '.$this->getUserTeam().' Team', AppController::$INFO);
        } else {
            $this->setFlash(AppController::$errorMessage, AppController::$DANGER);
        }
        return $this->redirect(array('controller'=>'teams', 'action' => 'index'));
    }

    /**
     * Update Thrust Repo from Remote Server, Provided Git is installed.
     */
    public function updateThrustFromRepo(){
        $command = '"c:\Program Files (x86)\Git\bin\git.exe" pull -v --no-rebase --progress "origin" master';
        exec($command, $output);
        $this->setFlash('Thrust has been updated.', AppController::$SUCCESS);
        return $this->redirect(array('controller'=>'teams', 'action' => 'index'));
    }

    public function about() {
    }
    public function help() {
    }
}