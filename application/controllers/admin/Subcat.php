<?php

/**
* 
*/
class Subcat extends Backend_Controller
{
	protected $max_size					= 1024 * 2048; // 
	protected $width_thumbnail 	= 70;
	protected $height_thumbnail = 0; 
	protected $image_input_name = 'image';
	protected $modul_file 			= 'subcat'; 							// Nama direktori penyimpanan file yang berlokasi di (upload/img/..) atau (upload/files/..)
	
	function index()
	{
		$this->data['content'] 		= 'admin/pages/subcat/view';
		$this->data['subcat'] 		= $this->subcat_model->get_join();
		$this->data['categories']	= $this->category_model->get_by();
		$this->data['thumb_pre']	= $this->thumb_pre;
		$this->data['path_file']	= $this->img_path.$this->modul_file;

		$this->load->view('admin/media', $this->data);
	}

	public function insert()
	{
		$post 							= $this->input->post();
		$rules 							= $this->subcat_model->rules;

		$array_data['category_id'] = $post['category'];
		$array_data['subcat_name'] = $post['name'];
		$array_data['subcat_desc'] = $post['desc'];
		$array_data['subcat_alt']  = $post['alt'];
		$array_data['subcat_link'] = title_url($post['name']);

		$this->form_validation->set_rules('name', 'Sub Category Name', 'required|is_unique[{PRE}subcat.subcat_name]');
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
			redirect(site_url('admin/sub-category'));
		}

		else {

			if (!empty($_FILES[$this->image_input_name]['name'])) {
				$size = $_FILES[$this->image_input_name]['size'];

				if ($size > $this->max_size) {
					echo alert_js($too_large_text, '-1');
				}

				else{
					$upload_image = $this->lawave_image->upload_image($this->modul_file, $this->image_input_name, title_url($post['alt']));
					// image moo
					$this->image_moo
						->load($upload_image['image_path'].self::DS.$upload_image['image']['file_name']) // ambil gambar
						->resize($this->width_thumbnail,$this->height_thumbnail) // resize
						->save_pa($this->thumb_pre,''); // simpan

					$array_data['subcat_image'] = $upload_image['image']['file_name'];
					
					$this->subcat_model->insert($array_data);
					$this->session->set_flashdata('success', $this->add_text);

					redirect(site_url('admin/sub-category'));
				} 
			} 

			else {
				$this->subcat_model->insert($array_data);
				$this->session->set_flashdata('success', $this->add_text);

				redirect(site_url('admin/sub-category'));
			}
		}
	}

	public function update()
	{
		$post 							= $this->input->post(NULL, TRUE);
		$id									= $post['id'];
		$array_id						= array('subcat_id' => $id);
		$rules 							= $this->subcat_model->rules;
		$get_data 					= $this->subcat_model->get($id);

		$array_data['subcat_name'] = $post['name'];
		$array_data['category_id'] = $post['category'];
		$array_data['subcat_desc'] = $post['desc'];
		$array_data['subcat_alt']  = $post['alt'];

		$is_unique = $this->subcat_model->unique_update($post['name'], $id, 'subcat_name');

		$this->form_validation->set_rules('name', 'Sub Category Name', 'required'.$is_unique);
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
			redirect(site_url('admin/sub-category'));
		}

		else {

			if (!empty($_FILES[$this->image_input_name]['name'])) {
				$size = $_FILES[$this->image_input_name]['size'];

				if ($size > $this->max_size) {
					echo alert_js($this->too_large_text, '-1');
				}

				else{
					$this->lawave_image->delete_image($this->modul_file, $get_data->subcat_image, $this->thumb_pre);
					$upload_image = $this->lawave_image->upload_image($this->modul_file, $this->image_input_name, title_url($post['alt']));
					// image moo
					$this->image_moo
						->load($upload_image['image_path'].self::DS.$upload_image['image']['file_name']) // ambil gambar
						->resize($this->width_thumbnail,$this->height_thumbnail) // resize
						->save_pa($this->thumb_pre,''); // simpan

					$array_data['subcat_image'] = $upload_image['image']['file_name'];
					
					$this->subcat_model->update($array_data, $array_id);
					$this->session->set_flashdata('success', $this->add_text);

					redirect(site_url('admin/subcat'));
				} 
			} 

			else {
				$this->subcat_model->update($array_data, $array_id);
				$this->session->set_flashdata('success', $this->add_text);

				redirect(site_url('admin/subcat'));
			}
		}
	}

	public function delete($id)
	{
		$get_data = $this->subcat_model->get($id);
		// hapus gambar
		$this->lawave_image->delete_image($this->modul_file, $get_data->subcat_image, $this->thumb_pre);

		$this->subcat_model->delete($id);
		$this->session->set_flashdata('success', $this->delete_text);

		redirect(site_url('admin/subcat'));
	}

	public function publish($id)
	{
		$array_id = array('subcat_id' => $id);

		$get_data = $this->subcat_model->get($id);

		if ($get_data->subcat_pub == '88') {
			$array_data['subcat_pub'] = '99';
			$text_msg = $this->publish_text;
		} 

		else {
			$array_data['subcat_pub'] = '88';
			$text_msg = $this->unpublish_text;
		}

		$this->subcat_model->update($array_data, $array_id);
		$this->session->set_flashdata('success', $text_msg);

		redirect(site_url('admin/subcat'));
	}

	public function update_load()
	{	
		$id 				= $this->input->post('dataID');
		$get_data 	= $this->subcat_model->get($id);

		$this->data['id'] 			= $get_data->subcat_id;
		$this->data['category'] = $get_data->category_id;
		$this->data['name'] 		= $get_data->subcat_name;
		$this->data['desc'] 		= $get_data->subcat_desc;
		$this->data['alt'] 			= $get_data->subcat_alt;

		echo json_encode($this->data);
	}	
}