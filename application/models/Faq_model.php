<?php 

/**
* 
*/
class Faq_model extends MY_Model
{
	protected $_table_name = 'info';
	protected $_primary_key = 'info_id';
	protected $_order_by = 'info_id';
	protected $_order_by_type = 'DESC';
	public $rules = array(
		'name' => array(
			'field' => 'question',
			'label' => 'Question',
			'rules' => 'required'
			),
		'answer' => array(
			'field' => 'answer',
			'label' => 'Answer',
			'rules' => 'required'
			)
		);

	function __construct()
	{
		parent::__construct();
	}
}