<?php 

/**
* 
*/
class User_model extends MY_Model
{
	
	protected $_table_name = 'user';
	protected $_primary_key = 'user_id';
	protected $_order_by = 'user_id';
	protected $_order_by_type = 'DESC';
	public $rules = array(
		'name' => array(
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'required'
			),
		'level' => array(
			'field' => 'level',
			'label' => 'Level',
			'rules' => 'required'
			),
		'status' => array(
			'field' => 'status',
			'label' => 'Status',
			'rules' => 'required'
			)
		);

	function __construct()
	{
		parent::__construct();
	}
}