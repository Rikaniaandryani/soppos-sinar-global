<?php
/**
* 
*/
class Order_model extends MY_Model
{
	
	protected $_table_name 		= 'order';
	protected $_primary_key 	= 'order_id';
	protected $_order_by 			= 'order_id';
	protected $_order_by_type = 'ASC';
	public $rules;

	function __construct()
	{
		parent::__construct();
	}

	public function get_order($where = NULL, $limit = NULL, $offset= NULL, $single=FALSE, $select=NULL)
	{
		$this->db->join('{PRE}'.'product', '{PRE}'.'product.product_id = {PRE}'.$this->_table_name.'.product_id');
		$this->db->join('{PRE}'.'image', '{PRE}'.'image.parent_id = {PRE}'.$this->_table_name.'.product_id');
		return parent::get_by($where,$limit,$offset,$single,$select);		
	}
}