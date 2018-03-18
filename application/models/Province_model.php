<?php 

/**
* 
*/
class Province_model extends MY_Model
{
	protected $_table_name 		= 'province';
	protected $_primary_key 	= 'province_id';
	protected $_order_by 			= 'province_name';
	protected $_order_by_type = 'ASC';

	function __construct()
	{
		parent::__construct();
	}
}