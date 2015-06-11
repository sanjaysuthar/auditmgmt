<?php
/**
 * Thrust: The Audit Management Tool
 * 
 * @author: SANJAY SUTHAR
 * @email:  ss2445@gmail.com
 * @version:	2.0
 * @since:	v1.0
 */
App::uses('AppController', 'Controller');
/**
 * AccessDetails Controller
 *
 * @property AccessDetail $AccessDetail
 * @property PaginatorComponent $Paginator
 */
class AccessDetailsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

    public function beforefilter() {
        parent::beforeFilter();
        //session check
        if($this->Session->read('user') == null){
            $this->redirect(array('controller' => 'login', 'action' => 'index'));
        }

    }

/**
 * index method
 * @param string $uid
 * @return void
 */
	public function index($uid = null) {
		$this->AccessDetail->recursive = 0;
        $team = $this->Session->read('team');

        //checking conditions on basis of input parameter
        if(is_null($uid)) {
            /*$query = $this->AccessDetail->find('all', array(
                                    'conditions' => array('AccessDetail.Team' => $team, 'AccessDetail.Status' => AppController::$ActivateUserStatus)
                    ));*/
            $this->Paginator->settings = array(
                'conditions' => array('1'=>'1=1', 'AccessDetail.Team' => $team, 'AccessDetail.status' => AppController::$ActivateUserStatus
                ),
                'fields' => array('AccessDetail.*','lad.latest_audit_month','lad.latest_audit_year'),
                'joins'      => array(
                    array(
                        'table' => 'LATEST_AUDIT_DETAILS',
                        'alias' => 'lad',
                        'type' => 'LEFT',
                        'foreignKey' => false,
                        'conditions'=> array('AccessDetail.accessid = lad.accessid')
                    ),
                )
            );
        } else {
            /*$query = $this->AccessDetail->find('all', array(
                'conditions' => array('AccessDetail.Team' => $team, 'AccessDetail.uniqueid' => $uid)
            ));*/
            $this->Paginator->settings = array(
                'conditions' => array('1'=>'1=1', 'AccessDetail.Team' => $team, 'AccessDetail.uniqueid' => $uid
                ),
                'fields' => array('AccessDetail.*','lad.latest_audit_month','lad.latest_audit_year'),
                'joins'      => array(
                    array(
                        'table' => 'LATEST_AUDIT_DETAILS',
                        'alias' => 'lad',
                        'type' => 'LEFT',
                        'foreignKey' => false,
                        'conditions'=> array('AccessDetail.accessid = lad.accessid')
                    ),
                )
            );
        }
        $accessDetails = $this->Paginator->paginate('AccessDetail', array(), array());
        //debug($accessDetails);
        $this->set(compact('accessDetails'));
	}

    /**
     * Upload Excel method
     * @return void
     */
    public function uploadexcel() {
        $excelfile = $this->request->data['AccessDetail']['uploadexcelfile']['tmp_name'];
        $excelData = new Spreadsheet_Excel_Reader($excelfile, true);
        $accessDetailsModel = array();
        //starting with 2, 1 is header skipping it, all index for excel starts with 1
        $rowindex = 2;
        $arrindex = 0;
        $team = $this->Session->read("team");
        while($excelData->value($rowindex, 1) != '') {
            //accessid is auto increment
            $accessDetailsModel['AccessDetail'][$arrindex]['uniqueid'] = $excelData->value($rowindex, 1);
            $accessDetailsModel['AccessDetail'][$arrindex]['fname'] = $excelData->value($rowindex, 2);
            $accessDetailsModel['AccessDetail'][$arrindex]['lname'] = $excelData->value($rowindex, 3);
            $accessDetailsModel['AccessDetail'][$arrindex]['team'] = $team;
            $accessDetailsModel['AccessDetail'][$arrindex]['systype'] = $excelData->value($rowindex, 4);
            $accessDetailsModel['AccessDetail'][$arrindex]['sysname'] = $excelData->value($rowindex, 5);
            $accessDetailsModel['AccessDetail'][$arrindex]['env'] = $excelData->value($rowindex, 6);
            $accessDetailsModel['AccessDetail'][$arrindex]['accresp'] = $excelData->value($rowindex, 7);
            $accessDetailsModel['AccessDetail'][$arrindex]['acctype'] = $excelData->value($rowindex, 8);
            $accessDetailsModel['AccessDetail'][$arrindex]['accprivilege'] = $excelData->value($rowindex, 9);
            $accessDetailsModel['AccessDetail'][$arrindex++]['accidassigned'] = $excelData->value($rowindex++, 10);
        }
        //debug($accessDetailsModel);
        foreach ($accessDetailsModel['AccessDetail'] as $value ) {
            $accessDetailEntity['AccessDetail'] = $value;
            $this->AccessDetail->create();
            if ($this->AccessDetail->save($accessDetailEntity)) {
                $this->Session->setFlash(__('Successfully uploaded from excel.'));
            } else {
                $this->Session->setFlash(__('The access detail could not be saved. Please, try again.'));
                break;
            }
        }
        return $this->redirect(array('action' => 'index'));
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AccessDetail->exists($id)) {
			throw new NotFoundException(__('Invalid access detail'));
		}
		$options = array('conditions' => array('AccessDetail.' . $this->AccessDetail->primaryKey => $id));
		$this->set('accessDetail', $this->AccessDetail->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AccessDetail->create();
			if ($this->AccessDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The access detail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The access detail could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->AccessDetail->exists($id)) {
			throw new NotFoundException(__('Invalid access detail'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->AccessDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The access detail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The access detail could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AccessDetail.' . $this->AccessDetail->primaryKey => $id));
			$this->request->data = $this->AccessDetail->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->AccessDetail->id = $id;
		if (!$this->AccessDetail->exists()) {
			throw new NotFoundException(__('Invalid access detail'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->AccessDetail->delete()) {
			$this->Session->setFlash(__('The access detail has been deleted.'));
		} else {
			$this->Session->setFlash(__('The access detail could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

    /**
     * auto suggest audits to be performed, based on access which are not audited from longer time
     */
    public function autosuggest($perc = null) {
        if($perc == null) {
            throw new NotFoundException(__('Percentage Missing'));
        }
        $team = $this->Session->read('team');
        //setting to be visible on UI side
        $this->set(compact('perc'));
        $perc = $perc / 100;
        $percentage = $this->AccessDetail->query("SELECT ROUND((SELECT count(*) FROM access_details WHERE team = '".$team."' AND status = 1) * ". $perc.", 0) AS Percentage FROM DUAL");
        //debug($percentage[0][0]['Percentage']);
        $this->Paginator->settings = array(
            'conditions' => array('1'=>'1=1', 'AccessDetail.Team' => $team, 'AccessDetail.status' => AppController::$ActivateUserStatus
            ),
            'fields' => array('AccessDetail.*','lad.latest_audit_month','lad.latest_audit_year'),
            'joins'      => array(
                array(
                    'table' => 'LATEST_AUDIT_DETAILS',
                    'alias' => 'lad',
                    'type' => 'LEFT',
                    'foreignKey' => false,
                    'conditions'=> array('AccessDetail.accessid = lad.accessid')
                ),
            ),
            'order' => array(
                'lad.latest_audit_year'=>'ASC',
                'lad.latest_audit_month'=>'ASC'
            ),
            'limit' =>$percentage[0][0]['Percentage']
        );
        $accessDetails = $this->Paginator->paginate('AccessDetail', array(), array('lad.latest_audit_year', 'lad.latest_audit_month'));
        //debug($accessDetails);
        $this->set(compact('accessDetails'));
    }

    /**
     * List All Users for a Team, based on group by by uid column of AccessDetail table
     */
    public function listusers() {
        $team = $this->Session->read('team');
        $this->Paginator->settings = array(
            'conditions' => array('1'=>'1=1', 'AccessDetail.Team' => $team
            ),
            'fields' => array('AccessDetail.uniqueid','AccessDetail.fname','AccessDetail.lname', 'count(*) as `accesscount`', 'AccessDetail.status'),
            'group' => array('AccessDetail.uniqueid'),
            'order' => array(
                'AccessDetail.uniqueid'=>'ASC'
            )
        );
        $accessDetails = $this->Paginator->paginate('AccessDetail', array(), array());
        //debug($accessDetails);
        $this->set(compact('accessDetails'));
    }

    /**
     * Deactivate a user and all the access user have
     * @param null $uid
     */
    public function deactivate($uid = null) {
        if($uid == null) {
            //throw new NotFoundException(__('Invalid Request'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->manageuser(AppController::$DeactivateUserStatus, $uid);
        $this->Session->setFlash(__('Successfully Deactivated User and all the Access.'));
        return $this->redirect(array('action' => 'listusers'));
    }


    /**
     * Activate a user and all the access user have
     * @param null $uid
     */
    public function activate($uid = null) {
        if($uid == null) {
            return $this->redirect(array('action' => 'index'));
        }
        $this->manageuser(AppController::$ActivateUserStatus, $uid);
        $this->Session->setFlash(__('Successfully Activated User and all the Access.'));
        return $this->redirect(array('action' => 'listusers'));
    }

    /**
     * Activate / Deactivate User and all corresponding access based on parameter flag
     * @param $activateflag
     * @param $uid
     * @throws FatalErrorException
     */
    private function manageuser($activateflag, $uid) {
        $accessids = $this->AccessDetail->query("SELECT accessid FROM access_details WHERE uniqueid = '$uid'");
        foreach ($accessids as $accessid) {
            $entity['accessid'] = $accessid['access_details']['accessid'];
            if($activateflag == AppController::$ActivateUserStatus) {
                $entity['status'] = AppController::$ActivateUserStatus;
            } elseif($activateflag == AppController::$DeactivateUserStatus) {
                $entity['status'] = AppController::$DeactivateUserStatus;
            }
            $accessDetailEntity['AccessDetail'] = $entity;
            if ($this->AccessDetail->save($accessDetailEntity)) {
                $this->Session->setFlash(__('Success'));
            } else {
                $this->Session->setFlash(__('Something went wrong, Contact Sanjay.'));
                throw new FatalErrorException(__('Something went wrong, Contact Sanjay.'));
                break;
            }
        }
    }


    /** All Utility function goes below this */
    /**
     * Utility Function to Convert UserStatusFlag
     * @param $statusflag
     * @return string
     */
    public function userStatusFlagConverter($statusflag) {
        if($statusflag == AppController::$ActivateUserStatus)
            return "Activated";
        else
            return "Deactivated";
    }

    /**
     * Utility Function to get Audit Status for a Access; 0-NotAudited, 1-Audited
     * @param $statusflag
     * @return int|mixed
     */
    public function auditStatusFlagConverter($statusflag) {
        if(is_null($statusflag))
            return AppController::$DeactivateUserStatus;
        else
            return AppController::$ActivateUserStatus;
    }

}
