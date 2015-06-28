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

    /**
     * Get Limit for Auto Suggest Features based on input Percentage
     * @param $percentage
     * @param $itemOrMember
     * @return mixed
     * @throws InvalidArgumentException
     */
    private function getLimitForAutoSuggest($percentage, $itemOrMember) {
        $percentage = $percentage / 100;
        $db = $this->AccessDetail->getDataSource();
        if($itemOrMember == 'member') {
            $fields = array('uniqueid');
            $group = 'uniqueid';
        } else if($itemOrMember == 'item') {
            $fields = array('1');
            $group = null;
        } else {
            throw new InvalidArgumentException(AppController::$invalidRequestMessage);
        }
        $innerQuery = $db->buildStatement(
            array(
                'conditions' => array('team' => $this->getUserTeam(), 'status' => AppController::$ActivateUserStatus),
                'fields'     => $fields,
                'table'      => $db->fullTableName($this->AccessDetail),
                'alias'      => 'innerQuery',
                'group'      => $group
            ),
            $this->AccessDetail
        );
        $countQuery = $db->buildStatement(
            array(
                'fields'     => array('count(*)'),
                'table'      => '('.$innerQuery.')',
                'alias'      => 'countQuery'
            ),
            $this->AccessDetail
        );
        $result = $this->AccessDetail->query('SELECT ROUND(('.$countQuery.')*'.$percentage.') AS Percentage FROM DUAL');
        //if percentage is zero, fetching at least one record
        if($result[0][0]['Percentage'] == 0) {
            $result[0][0]['Percentage'] = 1;
        }
        return $result[0][0]['Percentage'];
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
            $this->Paginator->settings = array(
                'conditions' => array('1'=>'1=1', 'AccessDetail.Team' => $this->getUserTeam(), 'AccessDetail.status' => AppController::$ActivateUserStatus
                ),
                'fields' => array('AccessDetail.*','lad.latest_audit_month','lad.latest_audit_year'),
                'joins'      => array(
                    array(
                        'table' => 'latest_audit_details',
                        'alias' => 'lad',
                        'type' => 'LEFT',
                        'foreignKey' => false,
                        'conditions'=> array('AccessDetail.accessid = lad.accessid')
                    ),
                ),
                'limit'=>AppController::$limit
            );

        } else {
            $this->Paginator->settings = array(
                'conditions' => array('1'=>'1=1', 'AccessDetail.Team' => $this->getUserTeam(), 'AccessDetail.uniqueid' => $uid
                ),
                'fields' => array('AccessDetail.*','lad.latest_audit_month','lad.latest_audit_year'),
                'joins'      => array(
                    array(
                        'table' => 'latest_audit_details',
                        'alias' => 'lad',
                        'type' => 'LEFT',
                        'foreignKey' => false,
                        'conditions'=> array('AccessDetail.accessid = lad.accessid')
                    ),
                ),
                'limit'=>AppController::$limit
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
     * @param null $percentage
     * @throws NotFoundException
     */
    public function autoSuggestItems($percentage = null) {
        if($percentage == null) {
            throw new NotFoundException(__(AppController::$invalidRequestMessage));
        }
        $this->Paginator->settings = array(
            'conditions' => array('1'=>'1=1', 'AccessDetail.Team' => $this->getUserTeam(), 'AccessDetail.status' => AppController::$ActivateUserStatus
            ),
            'fields' => array('AccessDetail.*','lad.latest_audit_month','lad.latest_audit_year'),
            'joins'      => array(
                array(
                    'table' => 'latest_audit_details',
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
            'limit' =>$this->getLimitForAutoSuggest($percentage, 'item')
        );
        $accessDetails = $this->Paginator->paginate('AccessDetail', array(), array('lad.latest_audit_year', 'lad.latest_audit_month'));
        $this->setFlash('Auto Suggesting '.($percentage).'% from All Access Details.', AppController::$INFO);
        $this->set(compact('accessDetails', 'percentage'));
    }

    /**
     * Auto Suggesting Team Members to be audited for this Month,
     * BR: Getting all the Access, Audit data prior to this month, segregating based on Audited Percentage and displaying result
     * @param null $percentage
     * @throws NotFoundException
     */
    public function autoSuggestMembers($percentage = null) {
        if($percentage == null) {
            throw new NotFoundException(__(AppController::$invalidRequestMessage));
        }
        $this->loadModel('AuditDetail');
        $db = $this->AccessDetail->getDataSource();
        $innerJoinQuery = $db->buildStatement(
            array(
                'conditions' => array('OR'=>
                    array('year <>' => 2015, 'month <>' => 5) ),
                'fields'     => array('access_detail_id', '1 as audited_before'),
                'table'      => $db->fullTableName($this->AuditDetail),
                'alias'      => 'aud',
                'group'      => 'access_detail_id'
            ),
            $this->AccessDetail
        );
        $innerQuery = $db->buildStatement(
            array(
                'conditions' => array('team' => $this->getUserTeam(), 'status' => AppController::$ActivateUserStatus),
                'fields'     => array('acc.uniqueid as uniqueid', 'CONCAT(acc.fname, \' \', acc.lname) as name', 'count(*) as total_access', 'SUM(IFNULL(aud.audited_before,0)) as audited_before'),
                'table'      => $db->fullTableName($this->AccessDetail),
                'alias'      => 'acc',
                'joins'      => array(
                                    array(
                                        'table' => '('.$innerJoinQuery.')',
                                        'alias' => 'aud',
                                        'type' => 'LEFT',
                                        'foreignKey' => false,
                                        'conditions'=> array('acc.accessid = aud.access_detail_id')
                                    )),
                'group'      => 'acc.uniqueid'
            ),
            $this->AccessDetail
        );
        $outerQuery = $db->buildStatement(
            array(
                'fields'     => array('uniqueid', 'name', 'total_access', 'audited_before', 'ROUND((audited_before*100)/total_access) as AccessDetail__auditPerc'),
                'table'      => '('.$innerQuery.')',
                'alias'      => $this->AccessDetail->alias,
                'limit'      => $this->getLimitForAutoSuggest($percentage, 'member'),
                'order'      => 'AccessDetail__auditPerc',
            ),
            $this->AccessDetail
        );
        //Mapping auditPerc to be included in AccessDetail
        $this->AccessDetail->virtualFields['auditPerc'] = 0;
        $teamMembers = $this->AccessDetail->query($outerQuery);
        $this->setFlash('Auto Suggesting '.($percentage).'% of total Team Members.', AppController::$INFO);
        $this->set(compact('teamMembers', 'percentage'));
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
            ),
            'limit'=>AppController::$limit
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
        $this->setFlash('Successfully Dissociated User and all the Access.', AppController::$SUCCESS);
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
        $this->setFlash('Successfully Associated User and all the Access.', AppController::$SUCCESS);
        return $this->redirect(array('action' => 'listusers'));
    }


    /*
     *  All Utility Function below this
     */

    /**
     * Utility Function to Convert UserStatusFlag
     * @param $statusFlag
     * @return string
     */
    public function userStatusFlagConverter($statusFlag) {
        if($statusFlag == AppController::$ActivateUserStatus)
            return "Activated";
        else
            return "Deactivated";
    }

    /**
     * Utility Function to get Audit Status for a Access; 0-NotAudited, 1-Audited
     * @param $statusFlag
     * @return int|mixed
     */
    public function auditStatusFlagConverter($statusFlag) {
        if(is_null($statusFlag))
            return AppController::$DeactivateUserStatus;
        else
            return AppController::$ActivateUserStatus;
    }
}