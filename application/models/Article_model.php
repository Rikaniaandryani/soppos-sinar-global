<?php

/**
*
*/
class Article_model extends MY_Model
{

	protected $_table_name = 'article';
	protected $_primary_key = 'article_id';
	protected $_order_by = 'article_id';
	protected $_order_by_type = 'DESC';
	public $rules = array(
		// 'category' => array(
		// 	'field' => 'category',
		// 	'label' => 'Category',
		// 	'rules' => 'trim|required'
		// 	),
		'desc' => array(
			'field' => 'desc',
			'label' => 'article Description',
			'rules' => 'trim|required'
			)
		);

	function __construct()
	{
		parent::__construct();
	}

	public function get_article($where = NULL, $limit = NULL, $offset = NULL, $single = FALSE, $select = NULL, $order=NULL)
	{
		// $this->db->join('{PRE}'.'article_cat', '{PRE}'.'article_cat.article_cat_id = {PRE}'.$this->_table_name.'.article_cat_id');
		$this->db->join('{PRE}'.'image', '{PRE}'.'image.parent_id = {PRE}'.$this->_table_name.'.article_id');
		return parent::get_by($where, $limit, $offset, $single, $select, $order);
	}
}
