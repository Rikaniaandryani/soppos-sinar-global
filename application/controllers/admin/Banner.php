<?php

/**
* 
*/
class Banner extends Backend_Controller
{
	protected $max_size					= 1024 * 1000;
	protected $width_thumbnail 	= 70;
	protected $height_thumbnail = 0; 
	protected $image_input_name = 'image';
	protected $modul_file 			= 'banner'; 							// Nama direktori penyimpanan file yang berlokasi di (upload/img/..) atau (upload/files/..)

	function index()
	{
		$array_where = array(
			'{PRE}banner.banner_type' => 'banner', 
			'{PRE}image.image_seq' => '0', 
			'{PRE}image.image_parent_name' => 'banner'
			);

		$this->data['content'] 	= 'admin/pages/banner/view';
		$this->data['banner'] 	= $this->banner_model->get_banner($array_where);
		$this->data['thumb_pre']= $this->thumb_pre;
		$this->data['path_file']= $this->img_path.$this->modul_file;

		$this->load->view('admin/media', $this->data);
	}

	public function action($param)
	{
		$post 	= $this->input->post(NULL, TRUE);
		$rules 	= $this->banner_model->rules;
		$id 		= (!empty($_GET['id'])) ? hash_link_decode($_GET['id']) : NULL;

		if ($post) {
			$array_data['banner_link']		= $post['link'];
			$array_data['banner_alt']			= $post['alt'];
			$array_data['banner_type'] 		= 'banner';
		}

		switch ($param) {

			/* ---------- TAMBAH DATA ---------- */
			case 'insert':
				$this->form_validation->set_rules($rules);

				if ($this->form_validation->run() == FALSE) {
					$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
					redirect(site_url('admin/banner'));
				}

				else {
					$size 		= $_FILES['image']['size'];
						
					if ($size > $this->max_size) {
						$this->session->set_flashdata('error', $this->too_large_text);
						redirect(site_url('admin/banner'));
					}

					else {
						$upload_image = $this->lawave_image->upload_image($this->modul_file, $this->image_input_name, title_url($post['alt']));
						// image moo
						$this->image_moo
							->load($upload_image['image_path'].self::DS.$upload_image['image']['file_name']) // ambil gambar
							->resize($this->width_thumbnail,$this->height_thumbnail) // resize
							->save_pa($this->thumb_pre,''); // simpan
						
						$banner_id = $this->banner_model->insert($array_data);

						$array_image = array(
							'parent_id' => $banner_id,
							'image_parent_name' => 'banner',
							'image_name' => $upload_image['image']['file_name'],
							'image_seq' => '0'
							);
						$this->image_model->insert($array_image);
						$this->session->set_flashdata('success',$this->add_text);

						redirect(site_url('admin/banner'));
					}
				}
				break;

			/* ---------- EDIT DATA ---------- */
			case 'update':
				$id 			= hash_link_decode($post['id']);
				$get_image= $this->image_model->get_by(array('image_parent_name' => 'banner', 'parent_id' => $id), 1, NULL, TRUE);
				$rules 		= $this->banner_model->rules;
				// id untuk update berbentuk array
				$array_id 		= array('banner_id' => $id);

				$this->form_validation->set_rules($rules);

				if ($this->form_validation->run() == FALSE) {
					$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
					redirect(site_url('admin/banner'));
				}

				else {

					if (!empty($_FILES['image']['name'])) {
						$size = $_FILES['image']['size'];
						
						if ($size > $this->max_size) {
							$this->session->set_flashdata('error', $this->too_large_text);
							redirect(site_url('admin/banner'));
						}

						else {
							$this->lawave_image->delete_image($this->modul_file, $get_image->image_name, $this->thumb_pre);
							$upload_image = $this->lawave_image->upload_image($this->modul_file, $this->image_input_name, title_url($post['alt']));
							// image moo
							$this->image_moo
								->load($upload_image['image_path'].self::DS.$upload_image['image']['file_name']) // ambil gambar
								->resize($this->width_thumbnail,$this->height_thumbnail) // resize
								->save_pa($this->thumb_pre,''); // simpan
						
							$array_image['image_name'] = $upload_image['image']['file_name'];

							$this->banner_model->update($array_data, $array_id);
							$this->image_model->update($array_image, array('image_id' => $get_image->image_id));
							$this->session->set_flashdata('success', $this->edit_text);

							redirect(site_url('admin/banner'));
						}
					}

					else {
						$this->banner_model->update($array_data, $array_id);
						$this->session->set_flashdata('success', $this->edit_text);

						redirect(site_url('admin/banner'));
					}
				}
				break;

			/* ---------- HAPUS DATA ---------- */
			case 'delete':
				$get_image = $this->image_model->get_by(array('image_parent_name' => 'banner', 'parent_id' => $id), 1, NULL, TRUE);
				$this->lawave_image->delete_image($this->modul_file, $get_image->image_name, $this->thumb_pre);
				// hapus data
				$this->banner_model->delete($id);
				$this->session->set_flashdata('success',$this->delete_text);

				redirect(site_url('admin/banner'));
				break;

			/* ---------- PUBLISH DATA ---------- */
			case 'publish':
				$array_id = array('banner_id' => $id);

				$get_data = $this->banner_model->get($id);

				if ($get_data->banner_pub == '88') {
					$array_data['banner_pub'] = '99';
					$text_msg = $this->publish_text;
				} 

				else {
					$array_data['banner_pub'] = '88';
					$text_msg = $this->unpublish_text;
				}

				$this->banner_model->update($array_data, $array_id);
				$this->session->set_flashdata('success', $text_msg);

				redirect(site_url('admin/banner'));
				break;

			default:
				redirect(site_url('admin/banner'));
				break;
		}
	}

	public function update_load()
	{	
		$id 			= hash_link_decode($this->input->post('dataID'));
		$get_data = $this->banner_model->get($id);

		$this->data['id'] 			= $this->input->post('dataID');
		$this->data['link']	 		= $get_data->banner_link;
		$this->data['alt']	 		= $get_data->banner_alt;

		echo json_encode($this->data);
	}	
}