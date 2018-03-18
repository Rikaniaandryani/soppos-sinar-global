<?php 

/**
* 
*/
class Shipment_model extends MY_Model
{
	
	protected $_table_name = 'shipment';
	protected $_primary_key = 'shipment_id';
	protected $_order_by = 'shipment_id';
	protected $_order_by_type = 'DESC';
	public $rules = array(
		'name' => array(
			'field' => 'name',
			'label' => 'Shipment Name',
			'rules' => 'required'
			),
		'web' => array(
			'field' => 'web',
			'label' => 'Web URL',
			'rules' => 'required'
			)
		);

	function __construct()
	{
		parent::__construct();
	}
}