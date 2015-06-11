<?php
/**
 * Thrust: The Audit Management Tool
 * 
 * @author: SANJAY SUTHAR
 * @email:  ss2445@gmail.com
 * @version:	1.0
 * @since:	v1.0
 */
 
App::uses('AppController', 'Controller');
/**
 * AuditDetails Controller
 *
 * @property AuditDetail $AuditDetail
 * @property PaginatorComponent $Paginator
 */
class AuditDetailsController extends AppController {

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
 *
 * @return void
 */
	public function index() {
		$this->AuditDetail->recursive = 0;
        $team = $this->Session->read('team');
		$this->set('auditDetails', $this->AuditDetail->find('all', array(
                                                        'contain' => array('AccessDetail'),
                                                        'conditions' => array('AccessDetail.Team' => $team, 'AccessDetail.Status' => AppController::$ActivateUserStatus)
                                            )));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	/*public function view($id = null) {
		if (!$this->AuditDetail->exists($id)) {
			throw new NotFoundException(__('Invalid audit detail'));
		}
		$options = array('conditions' => array('AuditDetail.' . $this->AuditDetail->primaryKey => $id));
		$this->set('auditDetail', $this->AuditDetail->find('first', $options));

        $d = $this->AuditDetail->find('first', $options);

        debug($d['AuditDetail']['evidence2']['type']);
	}*/

/**
 * add method
 *
 * @return void
 */
	public function add($accessid = null) {
        //Setting Access Id on Audit Page
        $this->loadModel('AccessDetail');
        if (!$this->AccessDetail->exists($accessid)) {
            throw new NotFoundException(__('Invalid access detail'));
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
				$this->Session->setFlash(__('The audit detail could not be saved. Please, try again.'));
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
		if (!$this->AuditDetail->exists($id)) {
			throw new NotFoundException(__('Invalid audit detail'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->AuditDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The audit detail has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The audit detail could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AuditDetail.' . $this->AuditDetail->primaryKey => $id));
			$this->request->data = $this->AuditDetail->find('first', $options);
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
		$this->AuditDetail->id = $id;
		if (!$this->AuditDetail->exists()) {
			throw new NotFoundException(__('Invalid audit detail'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->AuditDetail->delete()) {
			$this->Session->setFlash(__('The audit detail has been deleted.'));
		} else {
			$this->Session->setFlash(__('The audit detail could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

    public function temp() {


    }
}
