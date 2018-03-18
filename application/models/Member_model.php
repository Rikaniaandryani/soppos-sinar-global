<?php 

/**
* member model
*/
class Member_model extends MY_Model
{
	
	protected $_table_name 		= 'member';
	protected $_primary_key 	= 'member_id';
	protected $_order_by 			= 'member_id';
	protected $_order_by_type = 'DESC';
	
	/*
	| nilai dari variable diatas akan dikirim ke MY_Model dan digunakan untuk mengakses table
	*/

	public $rules = array(
		'name' => array(
			'field' => 'nama',
			'label' => 'Nama',
			'rules' => 'required'
			),
		'phone' => array(
			'field' => 'telp',
			'label' => 'No Telepon',
			'rules' => 'required'
			),
		'address' => array(
			'field' => 'alamat',
			'label' => 'Alamat',
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

	public function get_member($where = NULL, $limit = NULL, $offset = NULL, $single = FALSE, $select = NULL)
	{
		$this->db->join('{PRE}'.'reason', '{PRE}'.'reason.reason_id = {PRE}'.$this->_table_name.'.reason_id');
		return parent::get_by($where, $limit, $offset, $single, $select);
	}

}