<?php 

/**
* 
*/
class Contact_model extends MY_Model
{
	protected $_table_name = 'contact';
	protected $_primary_key = 'contact_id';
	protected $_order_by = 'contact_id';
	protected $_order_by_type = 'DESC';
	public $rules;

	function __construct()
	{
		parent::__construct();
	}
}