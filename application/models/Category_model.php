<?php

/**
*
*/
class Category_model extends MY_Model
{

	protected $_table_name = 'category';
	protected $_primary_key = 'category_id';
	protected $_order_by = 'category_id';
	protected $_order_by_type = 'DESC';
	public $rules;

	function __construct()
	{
		parent::__construct();
	}

	function get_category($where = NULL, $limit = NULL, $offset = NULL, $single = FALSE, $select = NULL)
	{
		// $this->db->join('{PRE}'.'image', '{PRE}'.'image.parent_id = {PRE}'.$this->_table_name.'.category_id');
		return parent::get_by($where,$limit,$offset,$single,$select);
	}
}
