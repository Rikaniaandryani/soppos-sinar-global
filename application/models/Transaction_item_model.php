<?php
/**
* 
*/
class Transaction_item_model extends MY_Model
{
	
	protected $_table_name 		= 'transaction_item';
	protected $_primary_key 	= 'transaction_item_id';
	protected $_order_by 			= 'transaction_item_id';
	protected $_order_by_type = 'ASC';
	public $rules;

	function __construct()
	{
		parent::__construct();
	}

	public function get_transaction_item($where = NULL, $limit = NULL, $offset = NULL, $single = FALSE, $select = NULL)
	{
		$this->db->join('{PRE}'.'product', '{PRE}'.'product.product_id = {PRE}'.$this->_table_name.'.product_id');
		$this->db->join('{PRE}'.'image', '{PRE}'.'image.parent_id = {PRE}'.$this->_table_name.'.product_id');
		return parent::get_by($where,$limit,$offset,$single,$select);		
	}
}