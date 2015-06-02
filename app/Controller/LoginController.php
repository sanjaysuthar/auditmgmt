<?php
/**
 * Thrust: The Audit Management Tool
 * 
 * @author: SANJAY SUTHAR
 * @email:  ss2445@gmail.com
 * @version:	1.0
 * @since:	v1.0
 */
 
class LoginController extends AppController {

    public function beforefilter() {
        parent::beforeFilter();
        //session check
        if($this->action == 'index' && $this->Session->read('user') != null){
            $this->redirect(array('controller' => 'AccessDetails', 'action' => 'index'));
        }
    }

    public function index() {
        if ($this->request->is('post')) {
            $userid = $this->request->data['loginname'];
            $passwd = $this->request->data['password'];
            $team = $this->request->data['team'];
            if($userid == AppController::$appuserid && $passwd == AppController::$apppassword) {
                //create session here
                $this -> Session -> write("team",$team);
                $this -> Session -> write("user",$userid);
                return $this->redirect(array('controller'=>'AccessDetails', 'action' => 'index'));
            }
        }
    }

    public function logout() {
        $this->Session->delete('user');
        $this->Session->delete('team');
        $this->Session->destroy();
        $this->redirect(array('controller' => 'login', 'action' => 'index'));
    }

}