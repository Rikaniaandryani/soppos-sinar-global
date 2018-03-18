<?php 

/**
* 
*/
class Brand_model extends MY_Model
{
	
	protected $_table_name = 'brand';
	protected $_primary_key = 'brand_id';
	protected $_order_by = 'brand_name';
	protected $_order_by_type = 'ASC';
	public $rules;

	function __construct()
	{
		parent::__construct();
	}

	function get_brand($where = NULL, $limit = NULL, $offset = NULL, $single = FALSE, $select = NULL)
	{
		$this->db->join('{PRE}'.'image', '{PRE}'.'image.parent_id = {PRE}'.$this->_table_name.'.brand_id');
		return parent::get_by($where,$limit,$offset,$single,$select);		
	}
}