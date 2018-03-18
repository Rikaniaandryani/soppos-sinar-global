<?php

/**
* 
*/
class Tag extends Backend_Controller
{

	function index()
	{
		$this->data['content'] = 'admin/pages/tag/view';
		$this->data['tag']		 = $this->tag_model->get();

		$this->load->view('admin/media', $this->data);
	}

	public function action($param)
	{
		$post 	= $this->input->post(NULL, TRUE);
		$rules 	= $this->tag_model->rules;
		$id 		= (!empty($_GET['id'])) ? hash_link_decode($_GET['id']) : NULL;
		
		if ($post) {
			$array_data['tag_name']	= $post['name'];
			$array_data['tag_link']	= title_url($post['name']);
		}

		switch ($param) {

			/* ---------- TAMBAH DATA ---------- */
			case 'insert':
				$this->form_validation->set_rules('name', 'Tag Name', 'trim|required|is_unique[{PRE}tag.tag_name]');

				if ($this->form_validation->run() == FALSE) {
					$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
					redirect(site_url('admin/tag'));
				}

				else {
					$this->tag_model->insert($array_data);
					$this->session->set_flashdata('success', $this->add_text);
					redirect(site_url('admin/tag'));
				}
				break;

			/* ---------- EDIT DATA ---------- */
			case 'update':
				$id 			= hash_link_decode($post['id']);
				$array_id = array('tag_id' => $id);
		 
				$unique_update = $this->tag_model->unique_update($post['name'], $id, 'tag_name');
				$this->form_validation->set_rules('name', 'Tag Name', 'rtrim|required'.$unique_update);

				if ($this->form_validation->run() == FALSE) {
					$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
					redirect(site_url('admin/tag'));
				}

				else {
					$this->tag_model->update($array_data, $array_id);
					$this->session->set_flashdata('success', $this->edit_text);
					redirect(site_url('admin/tag'));
				}
				break;

			/* ---------- HAPUS DATA ---------- */
			case 'delete':
				$count  = $this->tag_model->count(array('tag_id' => $id));

				if ($count > 0) {
					$this->tag_model->delete($id);
					$this->session->set_flashdata('success',$this->delete_text);
					redirect(site_url('admin/tag'));
				}

				else {
					$this->session->set_flashdata('failed',$this->not_found);
					redirect(site_url('admin/tag'));
				}
				break;

			/* ---------- PUBLISH DATA ---------- */
			case 'publish':
				$count  = $this->tag_model->count(array('tag_id' => $id));

				if ($count > 0) {
					$array_id = array('tag_id' => $id);
					$get_data = $this->tag_model->get($id);

					if ($get_data->tag_pub == '88') {
						$array_data['tag_pub'] = '99';
						$text_msg = $this->publish_text;
					} 

					else {
						$array_data['tag_pub'] = '88';
						$text_msg = $this->unpublish_text;
					}

					$this->tag_model->update($array_data, $array_id);
					$this->session->set_flashdata('success', $text_msg);
					redirect(site_url('admin/tag'));
				}
				
				else {
					$this->session->set_flashdata('failed',$this->not_found);
					redirect(site_url('admin/tag'));
				}
				break;

			default:
				redirect(site_url('admin/tag'));
				break;
		}
	}

	public function update_load()
	{	
		$id 			= hash_link_decode($this->input->post('dataID'));
		$get_data = $this->tag_model->get($id);

		$this->data['id'] 			= $this->input->post('dataID');
		$this->data['name']	 		= $get_data->tag_name;

		echo json_encode($this->data);
	}	
}