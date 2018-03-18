<?php 

/**
* 
*/
class Subcat_model extends MY_Model
{
	
	protected $_table_name = 'subcat';
	protected $_primary_key = 'subcat_id';
	protected $_order_by = 'subcat_id';
	protected $_order_by_type = 'DESC';
	public $rules = array(
		'desc' => array(
			'field' => 'desc',
			'label' => 'Description',
			'rules' => 'required'
			),
		'category' => array(
			'field' => 'category',
			'label' => 'Category',
			'rules' => 'required'
			)
		);

	function __construct()
	{
		parent::__construct();
	}
	
	public function get_join($where = NULL, $limit = NULL, $offset = NULL, $single = FALSE, $select = NULL)
	{
		$this->db->join('{PRE}'.'category', '{PRE}'.'category.category_id = {PRE}'.$this->_table_name.'.category_id');
		return parent::get_by($where, $limit, $offset, $single, $select);
	}
}