<?php
/**
* 
*/
class Payment_model extends MY_Model
{
	
	protected $_table_name 		= 'payment';
	protected $_primary_key 	= 'payment_id';
	public $rules;

	function __construct()
	{
		parent::__construct();
	}

	public function get_payment($where = NULL, $limit = NULL, $offset= NULL, $single=FALSE, $select=NULL)
	{
		$this->db->join('{PRE}'.'transaction', '{PRE}'.'transaction.transaction_id = {PRE}'.$this->_table_name.'.transaction_id');
		$this->db->join('{PRE}'.'bank', '{PRE}'.'bank.bank_id = {PRE}'.$this->_table_name.'.bank_id');
		return parent::get_by($where,$limit,$offset,$single,$select);		
	}

	public function count_payment($where = NULL, $like = NULL)
	{
		$this->db->join('{PRE}'.'transaction', '{PRE}'.'transaction.transaction_id = {PRE}'.$this->_table_name.'.transaction_id');
		if ($like) {
			$this->db->like($like);
		}
		return parent::count($where);
	}
}