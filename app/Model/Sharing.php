<?php
App::uses('AppModel', 'Model');

/**
 * Sharing Model
 *
 */
class Sharing extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'Sharing';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'Card_ID';

/**
 * Creating a basic belongsTo model association with the Users model
 */
 	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'User_Email'
		)
	);
	
/**
 *Creating a basic hasOne model association with the Card model
 */
 	public $hasOne = array(
 		'Card' => array(
			'className' => 'Card',
			'foreignKey' => 'Card_ID'
		) 
	);	

}
