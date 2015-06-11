<?php
/**
 * Thrust: The Audit Management Tool
 * 
 * @author: SANJAY SUTHAR
 * @email:  ss2445@gmail.com
 * @version:	1.0
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
    public static $appuserid = 'admin';
    public static $apppassword = 'admin';
    public static $ActivateUserStatus = 1;
    public static $DeactivateUserStatus = 0;

    public function beforeFilter() {
        $environments = array('DEV/CMAD'=>'DEV/CMAD','INT/CMAQ'=>'INT/CMAQ', 'UAT/QUA'=>'UAT/QUA','PREPROD/TST'=>'PREPROD/TST', 'PROD'=>'PROD');
        $accessTypes = array('Personal'=>'Personal', 'Common'=>'Common');
        $accessPrivileges = array('Read'=>'Read', 'R/W'=>'R/W', 'R/W/X'=>'R/W/X');
        $sysTypes = array('Application'=>'Application', 'Database'=>'Database');
        $auditStatus = array('Success'=>'Success', 'Failed'=>'Failed');
        $auditMonth = array('1'=>'Jan', '2'=>'Feb', '3'=>'March', '4'=>'April', '5'=>'May', '6'=>'June', '7'=>'July', '8'=>'Aug', '9'=>'Sep', '10'=>'Oct', '11'=>'Nov', '12'=>'Dec');
        $auditYear = array('2013'=>'2013', '2014'=>'2014', '2015'=>'2015', '2016'=>'2016', '2017'=>'2017');
        $root = "auditmgmt";
        $this->set(compact('root', 'environments', 'accessTypes', 'accessPrivileges', 'sysTypes', 'auditStatus', 'auditMonth', 'auditYear'));
    }
    /*public $helpers = array('Form' => array('className' => 'BootstrapForm'));*/
}
