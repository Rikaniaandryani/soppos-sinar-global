<?php 

/**
* 
*/
class Image_model extends MY_Model
{
	
	protected $_table_name = 'image';
	protected $_primary_key = 'image_id';
	protected $_order_by = 'image_id';
	protected $_order_by_type = 'ASC';
	public $rules;

	function __construct()
	{
		parent::__construct();
	}
}