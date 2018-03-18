<?php 

/**
* 
*/
class Articlecat_model extends MY_Model
{
	
	protected $_table_name = 'article_cat';
	protected $_primary_key = 'article_cat_id';
	protected $_order_by = 'article_cat_id';
	protected $_order_by_type = 'DESC';
	public $rules;

	function __construct()
	{
		parent::__construct();
	}

}