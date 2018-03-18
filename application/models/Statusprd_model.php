<?php 

/**
* 
*/
class Statusprd_model extends MY_Model
{
	
	protected $_table_name = 'statusprd';
	protected $_primary_key = 'statusprd_id';
	protected $_order_by = 'statusprd_id';
	protected $_order_by_type = 'ASC';
	public $rules;

	function __construct()
	{
		parent::__construct();
	}
}