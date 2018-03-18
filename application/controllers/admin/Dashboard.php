<?php

/**
* 
*/
class Dashboard extends Backend_Controller
{

	function index()
	{
		$this->data['content'] 	= "admin/dashboard";

		$this->load->view('admin/media', $this->data);
	}
}