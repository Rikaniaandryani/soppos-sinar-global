<?php

/**
* 
*/
class Seo_model extends MY_Model
{
	
	protected $_table_name 		= 'seo';
	protected $_primary_key 	= 'seo_id';
	protected $_order_by 			= 'seo_id';
	protected $_order_by_type = 'ASC';
	public $rules = array(
		'title' => array(
			'field' => 'title',
			'label' => 'Title',
			'rules' => 'required'
			),
		'keyword' => array(
			'field' => 'keyword',
			'label' => 'Keyword',
			'rules' => 'required'
			),
		'desc' => array(
			'field' => 'desc',
			'label' => 'Description',
			'rules' => 'required'
			)
		);

	function __construct()
	{
		parent::__construct();
	}
}