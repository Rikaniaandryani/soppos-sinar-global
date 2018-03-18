<?php

/**
* Class bank
*/
class Bank extends Backend_Controller
{
	protected $max_size					= 1024 * 200;
	protected $wt 							= 100;
	protected $ht 							= 0;
	protected $image_input_name = 'image';
	protected $modul_file 			= 'bank';

	function index()
	{
		$this->data['content'] 		= 'admin/pages/bank/view';
		$this->data['bank'] 			= $this->bank_model->get_bank(
			array(
				'{PRE}image.image_parent_name' => 'bank',
				'{PRE}image.image_seq' => '0'
				)
			);
		$this->data['thumb_pre'] 	= $this->thumb_pre;
		$this->data['path_file']	= $this->img_path.$this->modul_file;

		$this->load->view('admin/media', $this->data);
	}

	public function action($param)
	{
		$post 	= $this->input->post(NULL, TRUE);
		$rules 	= $this->bank_model->rules;
		$id 		= (!empty($_GET['id'])) ? hash_link_decode($_GET['id']) : NULL;

		$this->form_validation->set_rules($rules);

		if (!empty($post)) {
			$array_data['bank_name'] 		= $post['name'];
			$array_data['bank_no'] 			= $post['no'];
			$array_data['bank_account'] = $post['account'];
		}

		switch ($param) {

			/* --------- TAMBAH DATA --------- */
			case 'insert':

				if ($this->form_validation->run() == FALSE) {
					$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
					redirect(site_url('admin/bank'));
				}

				else {
					$size 		= $_FILES['image']['size'];

					if ($size > $this->max_size) {
						$this->session->set_flashdata('error', $this->too_large_text);
						redirect(site_url('admin/bank'));
					}

					else {
						$upload_image = $this->lawave_image->upload_image($this->modul_file, $this->image_input_name, title_url($post['name']));
						$this->image_moo
							->load($upload_image['image_path'].self::DS.$upload_image['image']['file_name'])
							->resize($this->wt,$this->ht)
							->save_pa($this->thumb_pre,'');

						$bank_id = $this->bank_model->insert($array_data);

						$array_img = array(
							'parent_id' 				=> $bank_id,
							'image_parent_name'	=> 'bank',
							'image_name' 				=> $upload_image['image']['file_name'],
							'image_seq'					=> 0
							);

						$this->image_model->insert($array_img);
						$this->session->set_flashdata('success',$this->add_text);
						redirect(site_url('admin/bank'));
					}
				}

				break;

			/* --------- EDIT DATA --------- */
			case 'update':
				$id 			= hash_link_decode($post['id']);
				$array_id = array('bank_id' => $id);
				$get_image= $this->image_model->get_by(array('parent_id' => $id, 'image_parent_name' => 'bank'), 1, NULL, TRUE);

				if ($this->form_validation->run() == FALSE) {
					$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
					redirect(site_url('admin/bank'));
				}

				else {

					if (!empty($_FILES['image']['name'])) {
						$size = $_FILES['image']['size'];

						if ($size > $this->max_size) {
							$this->session->set_flashdata('error', $this->too_large_text);
							redirect(site_url('admin/bank'));
						}

						else {
							/* hapus gambar lama */
							$this->lawave_image->delete_image($this->modul_file, $get_image->image_name, $this->thumb_pre);
							$upload_image = $this->lawave_image->upload_image($this->modul_file, $this->image_input_name, title_url($post['name']));
							$this->image_moo
								->load($upload_image['image_path'].self::DS.$upload_image['image']['file_name'])
								->resize($this->wt,$this->ht)
								->save_pa($this->thumb_pre,'');

							$array_img['image_name'] = $upload_image['image']['file_name'];

							/* update data dan image */
							$this->bank_model->update($array_data, $array_id);
							$this->image_model->update($array_img, array('image_id' => $get_image->image_id));
							$this->session->set_flashdata('success', $this->edit_text);

							redirect(site_url('admin/bank'));
						}
					}

					else {
						$this->bank_model->update($array_data, $array_id);
						$this->session->set_flashdata('success', $this->edit_text);

						redirect(site_url('admin/bank'));
					}
				}
				break;

			/* --------- HAPUS DATA --------- */
			case 'delete':
				$count = $this->bank_model->count(array('bank_id' => $id));

				if ($count > 0) {
					$where_image	= array('parent_id' => $id, 'image_parent_name' => 'bank');
					$get_image 		= $this->image_model->get_by($where_image, 1, NULL, TRUE);
					$this->lawave_image->delete_image($this->modul_file, $get_image->image_name, $this->thumb_pre);

					$this->bank_model->delete($id);
					$this->image_model->delete_by($where_image);
					$this->session->set_flashdata('success',$this->delete_text);
					redirect(site_url('admin/bank'));
				}

				else {
					$this->session->set_flashdata('failed',$this->not_found);
					redirect(site_url('admin/bank'));
				}
				break;

			/* --------- PUBLISH DATA --------- */
			case 'publish':
				$array_id = array('bank_id' => $id);
				$get_data = $this->bank_model->get($id);

				if ($get_data->bank_pub == '88') {
					$array_data['bank_pub'] = '99';
					$text_msg = $this->publish_text;
				}

				else {
					$array_data['bank_pub'] = '88';
					$text_msg = $this->unpublish_text;
				}

				$this->bank_model->update($array_data, $array_id);
				$this->session->set_flashdata('success', $text_msg);

				redirect(site_url('admin/bank'));
				break;

			default:
				redirect(site_url('admin/bank'));
				break;
		}
	}

	public function update_load()
	{
		$id 			= hash_link_decode($this->input->post('dataID'));
		$get_data = $this->bank_model->get($id);

		$this->data['id'] 			= $this->input->post('dataID');
		$this->data['name']	 		= $get_data->bank_name;
		$this->data['no'] 			= $get_data->bank_no;
		$this->data['account'] 	= $get_data->bank_account;

		echo json_encode($this->data);
	}
}
