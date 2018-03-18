<?php

/**
* 
*/
class Statusprd extends Backend_Controller
{

	function index()
	{
		$this->data['content'] = 'admin/pages/statusprd/view';
		$this->data['statusprd'] = $this->statusprd_model->get();

		$this->load->view('admin/media', $this->data);
	}

	public function insert()
	{	
		$post 	= $this->input->post(NULL, TRUE);
		$rules 	= $this->statusprd_model->rules;

		$this->form_validation->set_rules('name', 'Status Name', 'required|is_unique[{PRE}statusprd.statusprd_name]');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
			redirect(site_url('admin/product-status'));
		}

		else {
			$array_data['statusprd_name']	= $post['name'];

			$this->statusprd_model->insert($array_data);
			$this->session->set_flashdata('success', $this->add_text);

			redirect(site_url('admin/product-status'));
		}
	}

	public function delete($id)
	{
		$this->statusprd_model->delete($id);
		$this->session->set_flashdata('success',$this->delete_text);

		redirect(site_url('admin/product-status'));
	}

	public function update()
	{
		$post 		= $this->input->post(NULL, TRUE);
		$id 			= $post['id'];
		$rules 		= $this->statusprd_model->rules;
		// id untuk update berbentuk array
		$array_id = array('statusprd_id' => $id);
 
 		$is_unique = $this->statusprd_model->unique_update($post['name'], $id, 'statusprd_name');

		$this->form_validation->set_rules('name', 'Status Name', 'required'.$is_unique);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
			redirect(site_url('admin/product-status'));
		}

		else {

			$array_data['statusprd_name'] = $post['name'];

			$this->statusprd_model->update($array_data, $array_id);
			$this->session->set_flashdata('success', $this->edit_text);

			redirect(site_url('admin/product-status'));
		}
	}

	public function publish($id)
	{
		$array_id = array('statusprd_id' => $id);

		$get_data = $this->statusprd_model->get($id);

		if ($get_data->statusprd_pub == '88') {
			$array_data['statusprd_pub'] = '99';
			$text_msg = $this->publish_text;
		} 

		else {
			$array_data['statusprd_pub'] = '88';
			$text_msg = $this->unpublish_text;
		}

		$this->statusprd_model->update($array_data, $array_id);
		$this->session->set_flashdata('success', $text_msg);

		redirect(site_url('admin/product-status'));
	}

	public function update_load()
	{	
		$id 			= $this->input->post('dataID');
		$get_data = $this->statusprd_model->get($id);

		$this->data['id'] 			= $get_data->statusprd_id;
		$this->data['name']	 		= $get_data->statusprd_name;

		echo json_encode($this->data);
	}	
}