<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    
	//IsAuthorized function, allows the user with the ID 1 to be able to navigate onto any view
	public function isAuthorized($user) {
    	if (isset($user['User_ID']) && $user['User_ID'] === '1') {
        	return true;
		}
		return false;
	}

	//BeforeFilter function, disallows the users to acces to any method without inheritance
    public function beforeFilter() {
	}
	
	//Creating session components and authentication
	public $components = array(
    	'Session',
    	'Auth' => array(
        	'authenticate' => array(
            	'Form' => array(
                	'fields' => array('username' => 'User_Email','password' => 'User_Password')
            	)
        	),
			'loginRedirect' => array('controller' => 'Users', 'action' => 'profile'),
			'logoutRedirect' => array('controller' => 'Users', 'action' => 'index' ),
			'authorize' => array('Controller')
    	)
	);
}
