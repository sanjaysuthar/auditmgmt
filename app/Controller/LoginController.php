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


    public function index() {
        if ($this->request->is('post')) {
            $userid = $this->request->data['loginname'];
            $passwd = $this->request->data['password'];
            if($userid == AppController::$appuserid && $passwd == AppController::$apppassword) {
                //create session here
                return $this->redirect(array('controller'=>'AccessDetails', 'action' => 'index'));
            }
        }
    }

}