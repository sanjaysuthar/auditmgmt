<?php
/**
 * Thrust: The Audit Management Tool
 *
 * @author: Sanjay Suthar
 * @email:  ss2445@gmail.com
 * @version:	2.0
 * @since:	v2.0
 * Date: 6/12/15
 * Time: 11:27 AM
 */
App::uses('AppController', 'Controller');

/**
 * Class TeamsController
 * Manage Thrust Teams
 * @author Sanjay Suthar
 */
class TeamsController extends AppController {

    public $components = array('Paginator');
    protected $adminActions = array('add', 'index', 'delete');

    public function beforefilter() {
        parent::beforeFilter();
        //checking admin action access
        if(in_array($this->action, $this->adminActions) && !$this->isAuthorized($this->Auth->user())) {
            $this->Auth->logout();
            //destroy session to ensure Auth.redirect has been removed from Session, We don't want referral url.
            $this->Session->destroy();
        }
    }

    /*
     * All Public Functions below this
     */

    /**
     * Add New Team in Thrust
     * @role Admin
     */
    public function add() {
        if ($this->request->is('post')) {
            if ($this->Team->save($this->request->data)) {
                $this->Session->setFlash(__('New Team has been created.'));
                //Since we have altered teamList hence, destroying teamList from session so that it can be reloaded from db
                $this->Session->delete('teamList');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__(AppController::$errorMessage));
            }
        }
    }

    /**
     * Default Action
     * List All Thrust Teams
     * @role Admin
     */
    public function index() {
        $this->Team->recursive = 0;
        $this->set('teamModel', $this->Team->find('all'));
    }

    /**
     * Delete Thrust Team
     * @role Admin
     * @param null $id
     * @throws NotFoundException
     */
    public function delete($id = null){
        $this->Team->id = $id;
        if (!$this->Team->exists()) {
            throw new NotFoundException(__('Invalid request'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Team->delete()) {
            $this->Session->setFlash(__('Team has been deleted. All associated users are now deactivated!'));
            //Since we have altered teamList hence, destroying teamList from session so that it can be reloaded from db
            $this->Session->delete('teamList');
        } else {
            $this->Session->setFlash(__(AppController::$errorMessage));
        }
        return $this->redirect(array('action' => 'index'));
    }
}