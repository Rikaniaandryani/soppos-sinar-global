<?php

/**
* 
*/
class Shipment extends Backend_Controller
{
	protected $max_size					= 1024 * 200;
	protected $width_thumbnail 	= 70;
	protected $height_thumbnail = 0; 
	protected $image_input_name = 'image';
	protected $modul_file 			= 'shipment'; 

	function index()
	{
		$this->data['content'] 	= 'admin/pages/shipment/view';
		$this->data['shipment'] = $this->shipment_model->get();
		$this->data['thumb_pre']= $this->thumb_pre;
		$this->data['path_file']= $this->img_path.$this->modul_file;
		
		$this->load->view('admin/media', $this->data);
	}

	public function insert()
	{	
		$post 	= $this->input->post(NULL, TRUE);
		$rules 	= $this->shipment_model->rules;

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
			redirect(site_url('admin/shipment'));
		}

		else {
			$size 		= $_FILES['image']['size'];
				
			if ($size > $this->max_size) {
				echo alert_js($this->too_large_text, '-1');
			}

			else {
				$upload_image = $this->lawave_image->upload_image($this->modul_file, $this->image_input_name, title_url($post['name']));
				$this->image_moo
					->load($upload_image['image_path'].self::DS.$upload_image['image']['file_name']) // ambil gambar
					->resize($this->width_thumbnail,$this->height_thumbnail) // resize
					->save_pa($this->thumb_pre,''); // simpan

				$array_data['shipment_name'] 		= $post['name'];
				$array_data['shipment_web'] 		= $post['web'];
				$array_data['shipment_image'] 	= $upload_image['image']['file_name'];

				$this->shipment_model->insert($array_data);
				$this->session->set_flashdata('success',$this->add_text);

				redirect(site_url('admin/shipment'));
			}
		}
	}

	public function delete($id)
	{
		$get_data = $this->shipment_model->get($id);
		// hapus gambar
		$this->lawave_image->delete_image($this->modul_file, $get_data->shipment_image, $this->thumb_pre);
		// hapus data
		$this->shipment_model->delete($id);
		$this->session->set_flashdata('success',$this->delete_text);

		redirect(site_url('admin/shipment'));
	}

	public function update()
	{
		$post 		= $this->input->post(NULL, TRUE);
		$id 			= $post['id'];
		$get_data = $this->shipment_model->get($id);
		$rules 		= $this->shipment_model->rules;
		// id untuk update berbentuk array
		$array_id = array('shipment_id' => $id);
 
		$array_data['shipment_name'] 		= $post['name'];
		$array_data['shipment_web'] 		= $post['web'];

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
			redirect(site_url('admin/shipment'));
		}

		else {

			if (!empty($_FILES['image']['name'])) {
				$size = $_FILES['image']['size'];
				
				if ($size > $this->max_size) {
					echo alert_js($this->too_large_text, '-1');
				}

				else {
					$this->lawave_image->delete_image($this->modul_file, $get_data->shipment_image, $this->thumb_pre);
					
					$upload_image = $this->lawave_image->upload_image($this->modul_file, $this->image_input_name, title_url($post['name']));
					$this->image_moo
						->load($upload_image['image_path'].self::DS.$upload_image['image']['file_name']) // ambil gambar
						->resize($this->width_thumbnail,$this->height_thumbnail) // resize
						->save_pa($this->thumb_pre,''); // simpan
					
					$array_data['shipment_image'] = $upload_image['image']['file_name'];

					$this->shipment_model->update($array_data, $array_id);
					$this->session->set_flashdata('success', $this->edit_text);

					redirect(site_url('admin/shipment'));
				}
			}

			else {
				$this->shipment_model->update($array_data, $array_id);
				$this->session->set_flashdata('success', $this->edit_text);

				redirect(site_url('admin/shipment'));
			}
		}
	}

	public function publish($id)
	{
		$array_id = array('shipment_id' => $id);

		$get_data = $this->shipment_model->get($id);

		if ($get_data->shipment_pub == '88') {
			$array_data['shipment_pub'] = '99';
			$text_msg = $this->publish_text;
		} 

		else {
			$array_data['shipment_pub'] = '88';
			$text_msg = $this->unpublish_text;
		}

		$this->shipment_model->update($array_data, $array_id);
		$this->session->set_flashdata('success',$text_msg);

		redirect(site_url('admin/shipment'));
	}

	public function update_load()
	{	
		$id 			= $this->input->post('dataID');
		$get_data = $this->shipment_model->get($id);

		$this->data['id'] 			= $get_data->shipment_id;
		$this->data['name']	 		= $get_data->shipment_name;
		$this->data['web'] 			= $get_data->shipment_web;

		echo json_encode($this->data);
	}	
}