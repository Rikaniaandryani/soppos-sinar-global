<?php 

/**
* 
*/
class City_model extends MY_Model
{
	protected $_table_name 		= 'city';
	protected $_primary_key 	= 'city_id';
	protected $_order_by 			= 'city_name';
	protected $_order_by_type = 'ASC';

	function __construct()
	{
		parent::__construct();
	}
}