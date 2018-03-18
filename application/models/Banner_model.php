<?php 

/**
* 
*/
class Banner_model extends MY_Model
{
	
	protected $_table_name = 'banner';
	protected $_primary_key = 'banner_id';
	protected $_order_by = 'banner_id';
	protected $_order_by_type = 'ASC';
	public $rules = array(
		'link' => array(
			'field' => 'link',
			'label' => 'Slider Link',
			'rules' => 'required'
			),
		'alt' => array(
			'field' => 'alt',
			'label' => 'Slider Alt',
			'rules' => 'required'
			)
		);

	function __construct()
	{
		parent::__construct();
	}

	function get_banner($where = NULL, $limit = NULL, $offset = NULL, $single = FALSE, $select = NULL)
	{
		$this->db->join('{PRE}'.'image', '{PRE}'.'image.parent_id = {PRE}'.$this->_table_name.'.banner_id');
		return parent::get_by($where,$limit,$offset,$single,$select);		
	}
}