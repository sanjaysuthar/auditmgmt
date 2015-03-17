<?php
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

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->AccessDetail->recursive = 0;
		$this->set('accessDetails', $this->Paginator->paginate());
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
}
