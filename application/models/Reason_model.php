<?php 

/**
* 
*/
class Reason_model extends MY_Model
{
	
	protected $_table_name 		= 'reason';
	protected $_primary_key 	= 'reason_id';
	protected $_order_by 			= 'reason_id';
	protected $_order_by_type = 'DESC';
	
	/*
	| nilai dari variable diatas akan dikirim ke MY_Model dan digunakan untuk mengakses table
	*/

	public $rules = array(
		'name' => array(
			'field' => 'name',
			'label' => 'Reason Name',
			'rules' => 'required'
			)
		);

	/*
	| nilai rules digunakan untuk proses validasi form CI
	*/

	function __construct()
	{
		parent::__construct();
	}
}