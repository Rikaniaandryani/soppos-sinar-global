<?php

/**
*
*/
class Category extends Backend_Controller
{
	protected $max_size					= 1024 * 2048;
	protected $width_thumbnail 	= 70;
	protected $height_thumbnail = 0;
	protected $image_input_name = 'image';
	protected $modul_file 			= 'category';

	function index()
	{
		$this->data['content'] 	= 'admin/pages/category/view';
		$this->data['category'] = $this->category_model->get();
		$this->data['thumb_pre']= $this->thumb_pre;
		// $this->data['path_file']= $this->img_path.$this->modul_file;

		$this->load->view('admin/media', $this->data);
	}

	public function action($param)
	{
		$post = $this->input->post(NULL, TRUE);
		$id 	= (!empty($_GET['id'])) ? hash_link_decode($_GET['id']) : NULL;

		if ($post) {
			$array_data['category_name'] = $post['name'];
			$array_data['category_link'] = title_url($post['name']);
		}

		switch ($param) {

			/* ---------- TAMBAH DATA ---------- */
			case 'insert':
				$this->form_validation->set_rules('name', 'Category Name', 'trim|required|is_unique[{PRE}category.category_name]');

				if ($this->form_validation->run() == FALSE) {
					$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
					redirect(site_url('admin/category'));
				}


					else {
						$this->category_model->insert($array_data);
						$this->session->set_flashdata('success', $this->add_text);

						redirect(site_url('admin/category'));
					}

				break;

			/* ---------- EDIT DATA ---------- */
			case 'update':
				$id								= hash_link_decode($post['id']);
				$get_data 				= $this->category_model->get($id);
				$where_array			= array('category_id' => $id);
				$where_image			= array('parent_id' => $id, 'image_parent_name' => 'category');

				$is_unique = $this->category_model->unique_update($post['name'], $id, 'category_name');

				$this->form_validation->set_rules('name', 'Category Name', 'trim|required'.$is_unique);

				if ($this->form_validation->run() == FALSE) {
					$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
					redirect(site_url('admin/category'));
				}

				else {

					if (!empty($_FILES[$this->image_input_name]['name'])) {
						$size = $_FILES[$this->image_input_name]['size'];

						if ($size > $this->max_size) {
							$this->session->set_flashdata('error', $this->too_large_text);
							redirect(site_url('admin/category'));
						}

						else{
							$get_image 		= $this->image_model->get_by($where_image, 1, NULL, TRUE);
							$this->lawave_image->delete_image($this->modul_file, $get_image->image_name, $this->thumb_pre);
							$upload_image = $this->lawave_image->upload_image($this->modul_file, $this->image_input_name, title_url($post['name']));
							// image moo
							$this->image_moo
								->load($upload_image['image_path'].self::DS.$upload_image['image']['file_name'])
								->resize($this->width_thumbnail,$this->height_thumbnail)
								->save_pa($this->thumb_pre,'');

							$array_image['image_name'] = $upload_image['image']['file_name'];

							$this->category_model->update($array_data, $where_array);
							$this->image_model->update($array_image, array('image_id' => $get_image->image_id));
							$this->session->set_flashdata('success', $this->add_text);

							redirect(site_url('admin/category'));
						}
					}

					else {
						$this->category_model->update($array_data, $where_array);
						$this->session->set_flashdata('success', $this->add_text);

						redirect(site_url('admin/category'));
					}
				}
				break;

			/* ---------- HAPUS DATA ---------- */
			case 'delete':
				$get_data = $this->category_model->get($id);
				$get_image= $this->image_model->get_by(array('parent_id' => $id, 'image_parent_name' => 'category'), 1, NULL, TRUE);

				$this->lawave_image->delete_image($this->modul_file, $get_image->image_name, $this->thumb_pre);

				$this->image_model->delete($get_image->image_id);
				$this->category_model->delete($id);
				$this->session->set_flashdata('success', $this->delete_text);

				redirect(site_url('admin/category'));
				break;

			/* ---------- PUBLISH DATA ---------- */
			case 'publish':
				$array_id = array('category_id' => $id);

				$get_data = $this->category_model->get($id);

				if ($get_data->category_pub == '88') {
					$array_data['category_pub'] = '99';
					$text_msg = $this->publish_text;
				}

				else {
					$array_data['category_pub'] = '88';
					$text_msg = $this->unpublish_text;
				}

				$this->category_model->update($array_data, $array_id);
				$this->session->set_flashdata('success', $text_msg);

				redirect(site_url('admin/category'));
				break;

			default:
				redirect(site_url('admin/category'));
				break;
		}
	}

	public function update_load()
	{
		$id 			= hash_link_decode($this->input->post('dataID'));
		$get_data = $this->category_model->get($id);

		$this->data['id'] 	= $this->input->post('dataID');
		$this->data['name'] = $get_data->category_name;
		/*$this->data['desc'] = $get_data->category_desc;
		$this->data['alt'] 	= $get_data->category_alt;*/

		echo json_encode($this->data);
	}
}
