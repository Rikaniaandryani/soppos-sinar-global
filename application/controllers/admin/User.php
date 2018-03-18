<?php

/**
* 
*/
class User extends Backend_Controller
{
	protected $max_size					= 1024 * 200;
	protected $width_thumbnail 	= 320;
	protected $height_thumbnail = 0; 
	protected $image_input_name = 'image';


	public function index()
	{
		$data['content'] 	= 'admin/pages/user/view';
		$data['users'] 		= $this->user_model->get();

		/* menggabungkan semua array yang akan ditampilkan */
		$merge_data = array_merge($data, $this->data);

		$this->load->view('admin/media', $merge_data);
	}

	public function action($param)
	{
		global $SConfig;
		$post 						= $this->input->post(NULL, TRUE);
		$rules						= $this->user_model->rules;

		$this->form_validation->set_rules($rules);

		/* jika ada inputan (post) yang tersedia */
		if (!empty($post)) {
			$array_data['user_name'] 				= $post['name'];
			$array_data['user_username'] 		= $post['username'];
			$array_data['user_email'] 			= $post['email'];
			$array_data['user_level'] 			= $post['level'];
			$array_data['user_status'] 			= $post['status'];
		}

		switch ($param) {
			/* ----------- TAMBAH DATA ----------- */
			case 'insert':
				/* setting rules validasi */
				$this->form_validation->set_rules('username','Username','trim|required|is_unique[{PRE}user.user_username]');
				$this->form_validation->set_rules('email','Email','trim|required|is_unique[{PRE}user.user_email]');
				$this->form_validation->set_rules('pass1','Password','trim|required|alpha_numeric');
				$this->form_validation->set_rules('pass2','Password Confirmation','trim|required|matches[pass1]');

				$array_data['user_password'] 		= hash_string($post['pass2']);
				$array_data['user_session'] 		= hash_string($post['pass2']);


				/* jika validasi tidak sesuai, maka dikembalikan ke halaman data */
				if ($this->form_validation->run() == FALSE) {
					$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
					redirect(site_url('admin/user'));
				} 

				else {
					/* data dibentuk array */

					/* insert data */
					$this->user_model->insert($array_data);
					/* flash data */
					$this->session->set_flashdata('success',$this->add_text);
					redirect(site_url('admin/user'));
				}
				break;

			/* ----------- EDIT DATA ----------- */
			case 'update':
				$id 							= hash_link_decode($post['id']);
				$array_id 				= array('user_session' => $id);

				/* dapatkan data sesuai id_session */
				$get_data 				= $this->user_model->get_by($array_id, NULL, NULL, TRUE);
				/* validasi is_unique */
				$unique_username 	= $this->user_model->unique_update($post['username'], $get_data->user_id, 'user_username');
				$unique_email 		= $this->user_model->unique_update($post['email'], $get_data->user_id, 'user_email');
				
				if (empty($post['pass1']) AND empty($post['pass2'])) {
					/* set validasi jika password tidak diganti */
					$this->form_validation->set_rules('username','Username','trim|required'.$unique_username);
					$this->form_validation->set_rules('email','Email','trim|required'.$unique_email);
					$this->form_validation->set_rules($rules);
				} 

				else {
					/* set validasi jika password diganti */
					$this->form_validation->set_rules('username','Username','trim|required'.$is_unique);
					$this->form_validation->set_rules('email','Email','trim|required'.$unique_email);
					$this->form_validation->set_rules('pass1','Password','trim|required|alpha_numeric');
					$this->form_validation->set_rules('pass2','Password Confirmation','trim|required|matches[pass1]');
					$this->form_validation->set_rules($rules);
				}

				$array_data['user_session'] 		= $post['id'];

				if ($this->form_validation->run() == FALSE) {			
					$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
					redirect(site_url('admin/user'));
				} 

				else if(empty($post['pass1']) AND empty($post['pass2'])) {
					/* update data jika password tidak diganti */

					$this->user_model->update($array_data, $array_id);
					$this->session->set_flashdata('success',$this->edit_text);
					redirect(site_url('admin/user'));
				} 

				else if (hash_string($post['oldpass']) == $get_data->user_password) {
					/* update data jika password diganti */
					$array_data['user_password'] = hash_string($post['pass2']);

					$this->user_model->update($array_data, $array_id);
					$this->session->set_flashdata('success',$this->edit_text);
					redirect(site_url('admin/user'));	
				} 

				else {
					/* jika password lama salah */
					$this->session->set_flashdata('failed',$this->pass_inc_text);
					redirect(site_url('admin/user'));
				}
				break;

			/* ----------- HAPUS DATA ----------- */
			case 'delete':
				$id = (!empty($_GET['id'])) ? hash_link_decode($_GET['id']) : NULL;
				
				/* jika tidak ada id, maka dikembalikan ke halaman user */
				if ($id == NULL) {
					redirect(site_url('admin/user'));
				} 

				else {
					/* hapus data */
					$this->user_model->delete_by(array('user_session' => $id));
					/* flash data untuk alert */
					$this->session->set_flashdata('success', $this->delete_text);
					redirect('admin/user');
				}
				break;

			default:
				redirect(site_url('admin/user'));
				break;
		}
	}

	public function update_load()
	{
		$id 			= hash_link_decode($this->input->post('dataID'));
		$array_id = array('user_session' => $id);
		$get_data = $this->user_model->get_by($array_id, NULL, NULL, TRUE);

		$data['id'] 			= $this->input->post('dataID');
		$data['name'] 		= $get_data->user_name;
		$data['username'] = $get_data->user_username;
		$data['email'] 		= $get_data->user_email;
		$data['level'] 		= $get_data->user_level;
		$data['status'] 	= $get_data->user_status;

		echo json_encode($data);
	}
}