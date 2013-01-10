<?php
App::uses('AppController', 'Controller');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {
	
	//Initializing the name of the controller and the Javascript-JQuery helper
	public $name = 'Users';
	public $helpers = array('Js' => array('Jquery'), 'Cache');

	//beforeFilter method to allow the non-logged in users to acces the following functions
	public function beforeFilter() {
        parent::beforeFilter();
		$this->Auth->fields = array('username' => 'User_Email', 'password' => 'User_Password');
        $this->Auth->allow('index','logout','signup');
    }

/**
 * isAuthorized method
 * allows the users to access the action when logged in
 *
 * @param User $user
 * @return boolean true
 */

	public function isAuthorized($user) {

		if($this->action === 'profile'){
			return true;
		}
		
		if($this->action === 'share'){
			return true;
		}
		
		if($this->action === 'settings'){
			return true;
		}
		
		if(in_array($this->action, array('Cards/view'))){
			return true;	
		}
		
		return parent::isAuthorized($user);
	}	


/**
 * admin method
 *
 * @return void
 */
	public function admin() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

/**
 * index method
 *
 * @return void
 */
	public function index(){
		$this->set('title_for_layout', 'Welcome to LifeWords');
		$this->layout = 'frontview';
		if ($this->Auth->user())
    	{
        	$this->redirect('profile');
    	}	
	}
	

/**
 * login method
 *
 * @return void
 */
 	public function login(){
		$this->set('title_for_layout', 'LogIn');
		$this->layout = 'frontview';
		if ($this->Auth->user())
    	{
        	$this->redirect('profile');
    	}
		if ($this->request->is('post')) {
        	if ($this->Auth->login()) {
				$this->redirect($this->Auth->redirect());
        	} else {
            	$this->Session->setFlash(__('Invalid Email/Password'));
        	}
    	}
	}

/**
 * logout method
 *
 * @return void
 */	
	public function logout(){
		$this->Session->destroy();
		$this->redirect($this->Auth->logout());	
	}


/**
 * signup method
 *
 * @return void
 */	
	public function signup() {
		$this->layout = 'frontview';
		if ($this->Auth->user())
    	{
        	$this->redirect('profile');
    	}
		$this->set('title_for_layout','Sign up!');
		if ($this->request->is('post')) {
			$this->User->create();
			
				
				
				
			if ($this->User->save($this->request->data)) {
				$this->Auth->login();
				$User_Email = $this->Auth->user('User_Email');
				
				//save the name of the user profile picture with their email id
				$userProfilePhoto = '/storage/users/'.$User_Email.'/user_profile_photo.jpg';			
				
				//creating folder for users profile picture
				$nfolder = new Folder(false, true, 0777);
				
				if ($nfolder->create('storage'. DS .'users'. DS .$User_Email)){}
				
				$folder = new Folder('storage/users/'.$User_Email, false, 0777);
				
				$file = new File('user_profile_photo.jpg');
				
				if($file->exists()){
					$file->copy($folder->path. DS .$file->name);
				}
				
				$this->redirect(array('action' => 'profile'));
			} else{
				$this->Session->setFlash(__('Whoops!'));
			}
		}
	}
	
	
	
/**
 * profile method
 *
 * @return void
 */
 	public function profile(){
		$this->layout = "dashboard";
		$this->loadModel('Card');
		$this->set('title_for_layout', 'Home');
		$this->User->id = $this->Auth->user('User_ID');
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
		$this->set('user', $this->User->read(null, $this->Auth->user('User_ID')));
		$this->set('cards', $this->Card->find('all', array('conditions' => array('Card.Card_Owner' => $this->Auth->user('User_Email')), 'order' => array('Card.Card_ID' => 'desc'))));
	}

/**
 * share method
 *
 * @return void
 */
	public function share(){
		$this->set('title_for_layout', 'Shared Card');
		$this->set('user', $this->User->read(null, $this->Auth->user('User_ID')));
		$this->loadModel('Sharing');
		$this->layout = "dashboard";
		$this->User->id = $this->Auth->user('User_ID');
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
		$this->set('cards', $this->Sharing->find('all', array('conditions' => array('Sharing.User_Email' => $this->Auth->user('User_Email')), 'order' => array('Card.Card_ID' => 'desc'))));
		$this->set('user', $this->User->read(null, $this->Auth->user('User_ID')));
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}


	
/**
 * settings method
 *
 * @return void
 */
	public function settings(){
		$this->set('title_for_layout', 'Settings');
		$this->layout= 'dashboard';
		$this->User->id = $this->Auth->user('User_ID');		
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid User'));
		}
		$User_Email = $this->Auth->user('User_Email');
		
		if ($this->request->is('post') || $this->request->is('put')) {
			
			//Moving the Photo
			$upload_Photo = $this->request->data['User']['User_Profile_Photo']['tmp_name'];	
			$targetPath = WWW_ROOT.'/storage/users/' . $User_Email . '/';
			move_uploaded_file($upload_Photo, $targetPath.'user_profile_photo.jpg');		
			
			
			//save the name of the user profile picture with their email id
			$userProfilePhoto = '/storage/users/'.$User_Email.'/user_profile_photo.jpg';			
			$this->request->data['User']['User_Profile_Photo'] = $userProfilePhoto;
			
			if ($this->User->save($this->request->data)) {
					$this->redirect(array('action' => 'profile'));
			} 
			else {
			}
		} else {
			$this->request->data = $this->User->read(null);
		}
		$this->set('user', $this->User->read(null, $this->Auth->user('User_ID')));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->set('title_for_layout', 'Edit');
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}

