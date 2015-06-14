<?php
/**
 * Thrust: The Audit Management Tool
 * 
 * @author: Sanjay Suthar
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
 * @author Sanjay Suthar
 */
class AccessDetailsController extends AppController {

    /**
     * Components
     * @var array
     */
	public $components = array('Paginator');

    public function beforefilter() {
        parent::beforeFilter();
    }

    /*
     * All Private/Protected Functions below this
     */

    /**
     * Activate / Deactivate User and all corresponding access based on parameter flag
     * @param $activateflag
     * @param $uid
     * @throws FatalErrorException
     */
    private function manageuser($activateflag, $uid) {
        //To Do: remove hard coded query
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
                $this->setFlash('Successfully done!!', AppController::$SUCCESS);
            } else {
                $this->setFlash(AppController::$errorMessage, AppController::$DANGER);
                throw new FatalErrorException(__(AppController::$invalidRequestMessage));
                break;
            }
        }
    }

    /**
     * Validate Access Id against, exist and belongs to logged in User's Team
     * @param null $id
     * @return record array|null
     * @throws NotFoundException
     */
    private function validateAccessId($id = null) {
        $options = array('conditions' => array('AccessDetail.' . $this->AccessDetail->primaryKey => $id, 'AccessDetail.Team' => $this->getUserTeam()));
        $record = $this->AccessDetail->find('first', $options);
        //check so that user can only edit own team data, not others
        if(empty($record)) {
            throw new NotFoundException(__(AppController::$invalidRequestMessage));
        }
        return $record;
    }

    /*
     * All Public Functions below this
     */

    /**
     * Default Action
     * Fetch all Access Details for logged in User
     * Filter: Fetch only for Active Team Members
     * If Referral URL is Manage Team Members then Fetch All Access Active/Non-Active
     * @param string $uid
     * @return void
     */
	public function index($uid = null) {
		$this->AccessDetail->recursive = 0;
        //checking conditions on basis of input parameter
        if(is_null($uid)) {
            /*$query = $this->AccessDetail->find('all', array(
                                    'conditions' => array('AccessDetail.Teams' => $team, 'AccessDetail.Status' => AppController::$ActivateUserStatus)
                    ));*/
            $this->Paginator->settings = array(
                'conditions' => array('1'=>'1=1', 'AccessDetail.Team' => $this->getUserTeam(), 'AccessDetail.status' => AppController::$ActivateUserStatus
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
                'conditions' => array('AccessDetail.Teams' => $team, 'AccessDetail.uniqueid' => $uid)
            ));*/
            $this->Paginator->settings = array(
                'conditions' => array('1'=>'1=1', 'AccessDetail.Team' => $this->getUserTeam(), 'AccessDetail.uniqueid' => $uid
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
            $this->setFlash('Access Details of '.$uid, AppController::$INFO);
        }
        $accessDetails = $this->Paginator->paginate('AccessDetail', array(), array());
        $this->set(compact('accessDetails'));
	}

    /**
     * Upload Excel method
     * Upload Access Details Template
     * @return void
     */
    public function uploadexcel() {
        $excelfile = $this->request->data['AccessDetail']['uploadexcelfile']['tmp_name'];
        $excelData = new Spreadsheet_Excel_Reader($excelfile, true);
        $accessDetailsModel = array();
        //starting with 2, 1 is header skipping it, all index for excel starts with 1
        $rowindex = 2;
        $arrindex = 0;
        while($excelData->value($rowindex, 1) != '') {
            //accessid is auto increment
            $accessDetailsModel['AccessDetail'][$arrindex]['uniqueid'] = $excelData->value($rowindex, 1);
            $accessDetailsModel['AccessDetail'][$arrindex]['fname'] = $excelData->value($rowindex, 2);
            $accessDetailsModel['AccessDetail'][$arrindex]['lname'] = $excelData->value($rowindex, 3);
            $accessDetailsModel['AccessDetail'][$arrindex]['team'] = $this->getUserTeam();
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
                $this->setFlash('Successfully uploaded from excel.', AppController::$SUCCESS);
            } else {
                $this->setFlash(AppController::$errorMessage, AppController::$DANGER);
                break;
            }
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * Add New Access Detail
     * @return void
     */
	public function add() {
		if ($this->request->is('post')) {
			$this->AccessDetail->create();
			if ($this->AccessDetail->save($this->request->data)) {
				$this->setFlash('The access detail has been saved.', AppController::$SUCCESS);
				return $this->redirect(array('action' => 'index'));
			} else {
                $this->setFlash(AppController::$errorMessage, AppController::$DANGER);
			}
		}
	}

    /**
     * Edit existing Access Detail
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
	public function edit($id = null) {
        $record = $this->validateAccessId($id);
		if ($this->request->is(array('post', 'put'))) {
			if ($this->AccessDetail->save($this->request->data)) {
				$this->setFlash('The access detail has been saved.', AppController::$SUCCESS);
				return $this->redirect(array('action' => 'index'));
			} else {
                $this->setFlash(AppController::$errorMessage, AppController::$DANGER);
			}
		} else {
			$this->request->data = $record;
		}
	}

    /**
     * Delete an Access Detail
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
	public function delete($id = null) {
		$this->AccessDetail->id = $id;
        $this->validateAccessId($id);

		$this->request->allowMethod('post', 'delete');
		if ($this->AccessDetail->delete()) {
			$this->setFlash('The access detail has been deleted.', AppController::$SUCCESS);
		} else {
            $this->setFlash(AppController::$errorMessage, AppController::$DANGER);
		}
		return $this->redirect(array('action' => 'index'));
	}

    /**
     * Auto suggest Access Details, Audit to be performed for them, based on access which are not audited from longer time
     * @param null $perc
     * @throws NotFoundException
     */
    public function autosuggest($perc = null) {
        if($perc == null) {
            throw new NotFoundException(__(AppController::$invalidRequestMessage));
        }
        //setting to be visible on UI side
        $this->set(compact('perc'));
        $perc = $perc / 100;
        $percentage = $this->AccessDetail->query("SELECT ROUND((SELECT count(*) FROM access_details WHERE Team = '".$this->getUserTeam()."' AND status = 1) * ". $perc.", 0) AS Percentage FROM DUAL");
        //debug($percentage[0][0]['Percentage']);
        $this->Paginator->settings = array(
            'conditions' => array('1'=>'1=1', 'AccessDetail.Team' => $this->getUserTeam(), 'AccessDetail.status' => AppController::$ActivateUserStatus
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
        $this->setFlash('Auto Suggesting '.($perc*100).'% from All Access Details.', AppController::$INFO);
        $this->set(compact('accessDetails'));
    }

    /**
     * List All Users for a Teams, based on group by by uid column of AccessDetail table
     */
    public function listusers() {
        $this->Paginator->settings = array(
            'conditions' => array('1'=>'1=1', 'AccessDetail.Team' => $this->getUserTeam()
            ),
            'fields' => array('AccessDetail.uniqueid','AccessDetail.fname','AccessDetail.lname', 'count(*) as `accesscount`', 'AccessDetail.status'),
            'group' => array('AccessDetail.uniqueid'),
            'order' => array(
                'AccessDetail.uniqueid'=>'ASC'
            )
        );
        $accessDetails = $this->Paginator->paginate('AccessDetail', array(), array());
        $this->set(compact('accessDetails'));
    }

    /**
     * Deactivate a user and all the access user have
     * @param null $uid
     */
    public function deactivate($uid = null) {
        if($uid == null) {
            return $this->redirect(array('action' => 'index'));
        }
        $this->manageuser(AppController::$DeactivateUserStatus, $uid);
        $this->setFlash('Successfully Deactivated User and all the Access.', AppController::$SUCCESS);
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
        $this->setFlash('Successfully Activated User and all the Access.', AppController::$SUCCESS);
        return $this->redirect(array('action' => 'listusers'));
    }


    /*
     *  All Utility Function below this
     */

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