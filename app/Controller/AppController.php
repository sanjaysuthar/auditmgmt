<?php
/**
 * Thrust: The Audit Management Tool
 * 
 * @author: Sanjay Suthar
 * @email:  ss2445@gmail.com
 * @version:	2.0
 * @since:	v1.0
 */
 
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');
App::import('Vendor', 'php-excel-reader/excel_reader2');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public static $ActivateUserStatus = 1;
    public static $DeactivateUserStatus = 0;
    public static $updateThrustCommand = '"c:\Program Files (x86)\Git\bin\git.exe" pull -v --no-rebase --progress "origin" master';
    public static $errorMessage = 'Did you really think you are allowed to see that?';//'Something went wrong! Pleas try again.';
    public static $invalidRequestMessage = 'Did you really think you are allowed to see that? Thanks to SANJAY for protecting all the URLs ;-)';
    public static $unsupportedBrowser = 'We are sorry, But IE is not a supported browser, So far we support Firefox, Chrome and Safari.';
    public static $SUCCESS = 'success';
    public static $INFO = 'info';
    public static $WARNING = 'warning';
    public static $DANGER = 'danger';
    public static $limit = 999;


    public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'AccessDetails',
                'action' => 'index'
            ),
            'logoutRedirect' => array(
                'controller' => 'users',
                'action' => 'login'
            ),
            'authError' => 'Did you really think you are allowed to see that?',
            'authenticate' => array(
                'Form' => array(
                    'fields' => array('username' => 'userid', 'password' => 'secret'),
                    'passwordHasher' => 'Blowfish'
                )
            )
        )
    );

    public function beforeFilter() {
        $this->Auth->allow('about', 'help');
        $environments = array('DEV/CMAD'=>'DEV/CMAD','INT/CMAQ'=>'INT/CMAQ', 'UAT/QUA'=>'UAT/QUA','PREPROD/TST'=>'PREPROD/TST', 'PROD'=>'PROD');
        $accessTypes = array('Personal'=>'Personal', 'Common'=>'Common');
        $accessPrivileges = array('Read'=>'Read', 'R/W'=>'R/W', 'R/W/X'=>'R/W/X');
        $sysTypes = array('Application'=>'Application', 'Database'=>'Database');
        $auditStatus = array('Success'=>'Success', 'Failed'=>'Failed');
        $auditMonth = array('1'=>'Jan', '2'=>'Feb', '3'=>'Mar', '4'=>'Apr', '5'=>'May', '6'=>'Jun', '7'=>'Jul', '8'=>'Aug', '9'=>'Sep', '10'=>'Oct', '11'=>'Nov', '12'=>'Dec');
        $auditYear = array('2013'=>'2013', '2014'=>'2014', '2015'=>'2015', '2016'=>'2016', '2017'=>'2017');
        $root = "auditmgmt";
        $teamList = $this->getTeamDetails();
        $this->set(compact('root', 'environments', 'accessTypes', 'accessPrivileges', 'sysTypes', 'auditStatus', 'auditMonth', 'auditYear', 'teamList'));
        $this->checkSupportedBrowsers();
    }

    /*
     * All Private/Protected Functions below this
     */


    /**
     * Check for supported browsers, if a browser is not supported, throw exception
     * @throws NotFoundException
     */
    private function checkSupportedBrowsers() {
        if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') ){
            throw new NotFoundException(__(AppController::$unsupportedBrowser));
        }
        if (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident/7.0; rv:11.0') !== false) {
            throw new NotFoundException(__(AppController::$unsupportedBrowser));
        }
    }

    /**
     * Get All Team Details from db in order to display in various drop downs including login drop down, add user form
     * Get and store in Session, in order to achieve performance
     * @return mixed
     */
    private function getTeamDetails() {
        //Check Session first for data existence
        if($this->Session->read('teamList') == null) {
            $teams = array();
            $this->loadModel('Team');
            $options = array('fields'=>'id, name');
            //Unbind associated Model, we don't want User data here
            $this->Team->unbindModel(
                array('hasMany' => array('User'))
            );
            $teamsModel = $this->Team->find('all', $options);
            foreach ($teamsModel as $teamEntity ) {
                $teams[$teamEntity['Team']['id']] = $teamEntity['Team']['name'];
            }
            $this->Session->write('teamList', $teams);
        }
        return $this->Session->read('teamList');
    }

    /**
     * Session check excluding login action
     * @deprecated
     */
    private function checkSession() {
        if(!($this->params['controller'] == 'users' && $this->params['action'] == 'login') && $this->Session->read('Auth.User') == null){
            $this->Session->destroy();
            $this->redirect(array('controller' => 'users', 'action' => 'login'));
        }
    }

    /*
     * All Public Functions below this
     */

    /**
     * Get Team Name of Logged in User
     * @return mixed
     */
    public function getUserTeam(){
        if(!is_null($this->Session->read('Auth.User'))){
            return $this->Session->read('Auth.User.Teams.name');
        }
    }

    /**
     * Fetch team name from team id
     * @param $id
     * @return mixed
     * @throws NotFoundException
     */
    public function getTeamName($id) {
        $teamList = $this->Session->read('teamList');
        if($teamList != null) {
            if(array_key_exists($id, $teamList)) {
                return $teamList[$id];
            } else {
                throw new NotFoundException(__(AppController::$invalidRequestMessage));
            }
        }
    }

    /**
     * Checking if User is Admin, Admin can access every action
     * @param $user
     * @return bool
     */
    public function isAuthorized($user) {
        if (isset($user['role']) && $user['role'] === 'admin') {
            return true;
        }
        // Default deny
        return false;
    }

    /**
     * Set Custom FLash Message based on Various CSS Classes
     * @param $message
     * @param $type
     */
    public function setFlash($message, $type){
        switch ($type) {
            case AppController::$SUCCESS:
                $this->Session->setFlash($message, 'flash-success');
                break;
            case AppController::$INFO:
                $this->Session->setFlash($message, 'flash-info');
                break;
            case AppController::$WARNING:
                $this->Session->setFlash($message, 'flash-warning');
                break;
            case AppController::$DANGER:
                $this->Session->setFlash($message, 'flash-danger');
                break;
            default:
                $this->Session->setFlash($message, 'flash-warning');
        }
    }
}
