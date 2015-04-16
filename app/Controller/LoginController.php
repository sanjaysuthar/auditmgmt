<?php
/**
 * Created by PhpStorm.
 * User: Sanjay
 * Date: 4/15/15
 * Time: 11:30 AM
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