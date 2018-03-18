<?php 

/**
* 
*/
class Seo extends Backend_Controller
{
	
	function index()
	{
		$this->data['content']	= 'admin/pages/seo/view';
		$this->data['seo']			= $this->seo_model->get();

		$this->load->view('admin/media', $this->data);
	}

	public function action($param)
	{
		$post 		= $this->input->post(NULL, TRUE);
		$id 			= hash_link_decode($post['id']);
		$get_data = $this->seo_model->get($id);
		$rules 		= $this->seo_model->rules;
		$array_id = array('seo_id' => $id);

		if ($post) {
			$array_data['seo_title'] 		= $post['title'];
			$array_data['seo_keyword'] 	= $post['keyword'];
			$array_data['seo_desc'] 		= $post['desc'];
		}

		switch ($param) {

			/* ---------- EDIT DATA ---------- */
			case 'update':
				$this->form_validation->set_rules($rules);

				if ($this->form_validation->run() == FALSE) {
					$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
					redirect(site_url('admin/seo'));
				}

				else {
					$this->seo_model->update($array_data, $array_id);
					$this->session->set_flashdata('success', $this->edit_text);
					redirect(site_url('admin/seo'));
				}
				break;
			
			default:
				redirect(site_url('admin/seo'));
				break;
		}
	}

	public function update_load()
	{	
		$id 			= hash_link_decode($this->input->post('dataID'));
		$get_data = $this->seo_model->get($id);

		$this->data['id'] 			= $this->input->post('dataID');
		$this->data['title'] 		= $get_data->seo_title;
		$this->data['keyword'] 	= $get_data->seo_keyword;
		$this->data['desc'] 		= $get_data->seo_desc;

		echo json_encode($this->data);
	}	
}