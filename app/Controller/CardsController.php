<?php
App::uses('AppController', 'Controller');

/**
 * Cards Controller
 *
 * @property Card $Card
 */
class CardsController extends AppController {

	public function beforeFilter() {
        parent::beforeFilter();
		$this->Auth->fields = array('username' => 'User_Email', 'password' => 'User_Password');
		$this->Auth->allow('view');
	}
	
/**
 * isAuthorized method
 *
 * @param User $user
 * @return boolean true
 */

	public function isAuthorized($user) {

		if(in_array($this->action, array('view'))){
			return true;
		}
		return parent::isAuthorized($user);
	}	

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Card->recursive = 0;
		$this->set('cards', $this->paginate());
		$this->set('user', $this->Card->read(null, $this->Auth->user('User_ID')));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->loadModel('User');
		$this->layout = 'dashboard';
		$this->set('title_for_layout', 'View Card');
		$this->Card->id = $id;
		if (!$this->Card->exists()) {
			throw new NotFoundException(__('Invalid card'));
		}
		$this->set('user', $this->User->read(null, $this->Auth->user('User_ID')));
		$this->set('card', $this->Card->read(null, $id));

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
		$this->Card->id = $id;
		if (!$this->Card->exists()) {
			throw new NotFoundException(__('Invalid card'));
		}
		if ($this->Card->delete()) {
			$this->Session->setFlash(__('Card deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Card was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

