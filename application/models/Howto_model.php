<?php 

/**
* 
*/
class Howto_model extends MY_Model
{
	protected $_table_name = 'info';
	protected $_primary_key = 'info_id';
	protected $_order_by = 'info_id';
	protected $_order_by_type = 'ASC';
	public $rules = array(
		'name' => array(
			'field' => 'name',
			'label' => 'Step Name',
			'rules' => 'required'
			),
		'desc' => array(
			'field' => 'desc',
			'label' => 'Description',
			'rules' => 'required'
			)
		);

	function __construct()
	{
		parent::__construct();
	}
}