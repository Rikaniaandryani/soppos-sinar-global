<?php
/**
* 
*/
class Transaction_model extends MY_Model
{
	
	protected $_table_name 		= 'transaction';
	protected $_primary_key 	= 'transaction_id';
	protected $_order_by 			= 'transaction_id';
	protected $_order_by_type = 'DESC';
	public $rules;

	function __construct()
	{
		parent::__construct();
	}

	public function get_transaction($where = NULL, $limit = NULL, $offset = NULL, $single = FALSE, $select = NULL)
	{

		$this->db->join('{PRE}'.'city', 'city.city_id = {PRE}'.$this->_table_name.'.city_id');
		$this->db->join('{PRE}'.'province', 'province.province_id = {PRE}'.$this->_table_name.'.province_id');
		$this->db->join('{PRE}'.'trans_status', '{PRE}'.'trans_status.trans_status_id = {PRE}'.$this->_table_name.'.trans_status_id');
		$this->db->join('{PRE}'.'transaction_item', '{PRE}'.'transaction_item.order_no = {PRE}'.$this->_table_name.'.order_no');
		$this->db->group_by('{PRE}'.'transaction_item.order_no');
		return parent::get_by($where,$limit,$offset,$single,$select);		
	}

	public function get_transaction_member($where = NULL, $limit = NULL, $offset = NULL, $single = FALSE, $select = NULL)
	{
		$this->db->join('{PRE}'.'member', 'member.member_id = {PRE}'.$this->_table_name.'.member_id');
		return $this->get_transaction($where,$limit,$offset,$single,$select);
	}
}