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
 * AuditDetails Controller
 *
 * @property AuditDetail $AuditDetail
 * @property PaginatorComponent $Paginator
 * @author Sanjay Suthar
 */
class AuditDetailsController extends AppController {

    /**
     * Components
     * @var array
     */
	public $components = array('Paginator');

    public function beforefilter() {
        parent::beforeFilter();
    }

    /*
     * All Public Functions below this
     */

    /**
     * Default Action
     * List All Audits for Logged in User
     */
    public function index() {
		$this->AuditDetail->recursive = 0;
		$this->set('auditDetails', $this->AuditDetail->find('all', array(
                                        'contain' => array('AccessDetail'),
                                        'conditions' => array('AccessDetail.Team' => $this->getUserTeam(), 'AccessDetail.Status' => AppController::$ActivateUserStatus)
                            )));
	}

    /**
     * Add New Audit Detail
     * @param null $accessid
     * @throws NotFoundException
     */
    public function add($accessid = null) {
        //Setting Access Id on Audit Page
        $this->loadModel('AccessDetail');
        if (!$this->AccessDetail->exists($accessid)) {
            throw new NotFoundException(__(AppController::$invalidRequestMessage));
        } else {
            $this->request->data['AuditDetail']['access_detail_id'] = $accessid;
        }
		if ($this->request->is('post')) {
            // Initialize filename-variable
            $filename0 = null;
            $filename1 = null;
            //Saving 1st Evidence if exist
            if (!empty($this->request->data['AuditDetail']['evidences'][0]['tmp_name'])
                && is_uploaded_file($this->request->data['AuditDetail']['evidences'][0]['tmp_name']))
            {
                // Strip path information
                $filename0 = basename($this->request->data['AuditDetail']['evidences'][0]['name']);
                $RandomNumber = uniqid();
                $filename0 .= $RandomNumber . '.JPG';
                move_uploaded_file(
                    $this->data['AuditDetail']['evidences'][0]['tmp_name'],
                    WWW_ROOT . DS . 'documents' . DS . $filename0
                );
                // Set the file-name only in the database
                $this->request->data['AuditDetail']['evidence1'] = $filename0;
            }
            //Saving 2nd Evidence if exist
            if (!empty($this->request->data['AuditDetail']['evidences'][1]['tmp_name'])
                && is_uploaded_file($this->request->data['AuditDetail']['evidences'][1]['tmp_name']))
            {
                // Strip path information
                $filename1 = basename($this->request->data['AuditDetail']['evidences'][1]['name']);
                $RandomNumber = uniqid();
                $filename1 .= $RandomNumber . '.JPG';
                move_uploaded_file(
                    $this->data['AuditDetail']['evidences'][1]['tmp_name'],
                    WWW_ROOT . DS . 'documents' . DS . $filename1
                );
                $this->request->data['AuditDetail']['evidence2'] = $filename1;
            }
            //Now Save in DB
			$this->AuditDetail->create();
			if ($this->AuditDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The audit detail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__(AppController::$errorMessage));
			}
		}
	}

    /**
     * Edit an existing Audit Detail
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
	public function edit($id = null) {
		if (!$this->AuditDetail->exists($id)) {
			throw new NotFoundException(__(AppController::$invalidRequestMessage));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->AuditDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The audit detail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__(AppController::$errorMessage));
			}
		} else {
			$options = array('conditions' => array('AuditDetail.' . $this->AuditDetail->primaryKey => $id));
			$this->request->data = $this->AuditDetail->find('first', $options);
		}
	}

    /**
     * Delete an Audit
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
	public function delete($id = null) {
		$this->AuditDetail->id = $id;
		if (!$this->AuditDetail->exists()) {
			throw new NotFoundException(__(AppController::$invalidRequestMessage));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->AuditDetail->delete()) {
			$this->Session->setFlash(__('The audit detail has been deleted.'));
		} else {
			$this->Session->setFlash(__(AppController::$errorMessage));
		}
		return $this->redirect(array('action' => 'index'));
	}

}
