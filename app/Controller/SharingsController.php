<?php
App::uses('AppController', 'Controller');
/**
 * Sharings Controller
 *
 * @property Sharing $Sharing
 */
class SharingsController extends AppController {

/**
 * index method
 *
 * @return void
 */	
	public function index() {
		$this->Sharing->recursive = 0;
		$this->set('sharings', $this->paginate());
		$this->set('user', $this->Sharing->read(null, $this->Auth->user('User_ID')));
	}
	
/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Sharing->id = $id;
		if (!$this->Sharing->exists()) {
			throw new NotFoundException(__('Invalid sharing'));
		}
		if ($this->Sharing->delete()) {
			$this->Session->setFlash(__('Sharing deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Sharing was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->set('title_for_layout', 'View');
		$this->Sharing->id = $id;
		if (!$this->Sharing->exists()) {
			throw new NotFoundException(__('Invalid Sharing'));
		}
		$this->set('sharing', $this->Sharing->read(null, $id));
	}


}
