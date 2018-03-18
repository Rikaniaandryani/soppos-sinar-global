<?php 

/**
* 
*/
class Product_model extends MY_Model
{
	
	protected $_table_name = 'product';
	protected $_primary_key = 'product_id';
	public $rules = array(
		'category' => array(
			'field' => 'category',
			'label' => 'Category',
			'rules' => 'required'
			),
		/*'subcat' => array(
			'field' => 'subcat',
			'label' => 'Sub Category',
			'rules' => 'required'
			),*/
		'name' => array(
			'field' => 'name',
			'label' => 'Product Name',
			'rules' => 'required'
			),
		'desc' => array(
			'field' => 'desc',
			'label' => 'Product Description',
			'rules' => 'required'
			),
		'price' => array(
			'field' => 'price',
			'label' => 'Product Proce',
			'rules' => 'required'
			),
		'stock' => array(
			'field' => 'stock',
			'label' => 'Product Stock',
			'rules' => 'required'
			),
		'weight' => array(
			'field' => 'weight',
			'label' => 'Product Weight',
			'rules' => 'required'
			),
		'length' => array(
			'field' => 'length',
			'label' => 'Dimension (Length)',
			'rules' => 'required'
			),
		'width' => array(
			'field' => 'width',
			'label' => 'Dimension (Width)',
			'rules' => 'required'
			),
		'height' => array(
			'field' => 'height',
			'label' => 'Dimension (Height)',
			'rules' => 'required'
			)
		);

	function __construct()
	{
		parent::__construct();
	}

	public function get_product($where = NULL, $limit = NULL, $offset= NULL, $single=FALSE, $select=NULL, $like = NULL, $order = NULL)
	{
		$this->db->join('{PRE}'.'category', '{PRE}'.'category.category_id = {PRE}'.$this->_table_name.'.category_id');
		$this->db->join('{PRE}'.'brand', '{PRE}'.'brand.brand_id = {PRE}'.$this->_table_name.'.brand_id');
		$this->db->join('{PRE}'.'image', '{PRE}'.'image.parent_id = {PRE}'.$this->_table_name.'.product_id');
		if ($like) {
			$this->db->like($like);
		}
		if ($order) {
			foreach ($order as $key => $value) {
				$this->db->order_by($key, $value);
			}
		}
		return parent::get_by($where,$limit,$offset,$single,$select);		
	}

	public function count_product($where = NULL, $like = NULL)
	{
		if ($like) {
			$this->db->like($like);
		}
		return parent::count($where);
	}
}