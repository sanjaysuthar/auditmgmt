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
        while($excelData->value($rowindex, 1) != '') {
            //accessid is auto increment
            $accessDetailsModel['AccessDetail'][$arrindex]['uniqueid'] = $excelData->value($rowindex, 1);
            $accessDetailsModel['AccessDetail'][$arrindex]['fname'] = $excelData->value($rowindex, 2);
            $accessDetailsModel['AccessDetail'][$arrindex]['lname'] = $excelData->value($rowindex, 3);
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
}
