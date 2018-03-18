<?php

/**
* 
*/
class Articlecat extends Backend_Controller
{

	function index()
	{
		$this->data['content'] 		= 'admin/pages/articlecat/view';
		$this->data['articlecat']	= $this->articlecat_model->get();

		$this->load->view('admin/media', $this->data);
	}

	public function action($param)
	{
		$post 	= $this->input->post(NULL, TRUE);
		$rules 	= $this->articlecat_model->rules;
		$id 		= (!empty($_GET['id'])) ? hash_link_decode($_GET['id']) : NULL;
		
		if ($post) {
			$array_data['article_cat_name']	= $post['name'];
		}

		switch ($param) {
			
			/* --------- TAMBAH DATA --------- */
			case 'insert':
				$this->form_validation->set_rules('name', 'Category Name', 'trim|required|is_unique[{PRE}article_cat.article_cat_name]');

				if ($this->form_validation->run() == FALSE) {
					$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
					redirect(site_url('admin/article-category'));
				}

				else {
					$this->articlecat_model->insert($array_data);
					$this->session->set_flashdata('success', $this->add_text);
					redirect(site_url('admin/article-category'));
				}
				break;

			/* --------- EDIT DATA --------- */
			case 'update':
				$id 				= hash_link_decode($post['id']);
				$array_id 	= array('article_cat_id' => $id);
		 		$is_unique	= $this->articlecat_model->unique_update($post['name'], $id, 'article_cat_name');
				
				$this->form_validation->set_rules('name', 'Category Name', 'trim|required'.$is_unique);

				if ($this->form_validation->run() == FALSE) {
					$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
					redirect(site_url('admin/article-category'));
				}

				else {
					$this->articlecat_model->update($array_data, $array_id);
					$this->session->set_flashdata('success', $this->edit_text);
					redirect(site_url('admin/article-category'));
				}
				break;

			/* --------- HAPUS DATA --------- */
			case 'delete':
				$count	= $this->articlecat_model->count(array('article_cat_id' => $id));

				if ($count > 0) {
					$this->articlecat_model->delete($id);
					$this->session->set_flashdata('success',$this->delete_text);
					redirect(site_url('admin/article-category'));
				}

				else {
					$this->session->set_flashdata('failed',$this->not_found);
					redirect(site_url('admin/article-category'));
				}
				break;

			/* --------- PUBLISH DATA --------- */
			case 'publish':
				$array_id = array('article_cat_id' => $id);
				$get_data = $this->articlecat_model->get($id);

				if ($get_data->article_cat_pub == '88') {
					$array_data['article_cat_pub'] = '99';
					$text_msg = $this->publish_text;
				} 

				else {
					$array_data['article_cat_pub'] = '88';
					$text_msg = $this->unpublish_text;
				}

				$this->articlecat_model->update($array_data, $array_id);
				$this->session->set_flashdata('success', $text_msg);
				redirect(site_url('admin/article-category'));
				break;

			default:
				redirect(site_url('admin/article-category'));
				break;
		}
	}

	public function update_load()
	{	
		$id 			= hash_link_decode($this->input->post('dataID'));
		$get_data = $this->articlecat_model->get($id);

		$this->data['id'] 			= $this->input->post('dataID');
		$this->data['name']	 		= $get_data->article_cat_name;

		echo json_encode($this->data);
	}	
}