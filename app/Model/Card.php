<?php
App::uses('AppModel', 'Model');
/**
 * Card Model
 *
 */
class Card extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'Cards';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'Card_ID';

}
