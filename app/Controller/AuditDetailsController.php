<?php
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

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->AuditDetail->recursive = 0;
		$this->set('auditDetails', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AuditDetail->exists($id)) {
			throw new NotFoundException(__('Invalid audit detail'));
		}
		$options = array('conditions' => array('AuditDetail.' . $this->AuditDetail->primaryKey => $id));
		$this->set('auditDetail', $this->AuditDetail->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
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
}
