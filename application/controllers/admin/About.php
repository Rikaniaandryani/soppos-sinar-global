<?php

/**
*
*/
class About extends Backend_Controller
{
	protected $id 							= '1';
	protected $catinfo_id 			= '1';
	protected $max_size					= 1024 * 2048;
	protected $wt 							= 100;
	protected $ht 							= 0;
	protected $image_input_name = 'image';
	protected $modul_file 			= 'about';

	public function index()
	{
		$array_id 				= array('info_id' => $this->id, 'catinfo_id' => '1');

		$data['content'] 	= 'admin/pages/about/view';
		$data['about'] 		= $this->about_model->get_about($array_id, 1, NULL, TRUE);
		$data['thumb_pre']= $this->thumb_pre;
		$data['path_file']= $this->img_path.$this->modul_file;

		/* menggabungkan semua array yang akan ditampilkan */
		$merge_data = array_merge($data, $this->data);

		$this->load->view('admin/media', $merge_data);
	}

	public function action($param)
	{
		$array_id 				= array('info_id' => $this->id, 'catinfo_id' => '1');
		$post 						= $this->input->post(NULL, TRUE);
		$get_data 				= $this->about_model->get_about($array_id, 1, NULL, TRUE);
		$rules 						= $this->about_model->rules;

		$this->form_validation->set_rules($rules);

		$array_data['info_name'] = $post['name'];
		$array_data['info_desc'] = $post['desc'];


		switch ($param) {

			/* --------- EDIT DATA --------- */
			case 'update':
				if ($this->form_validation->run() == FALSE) {
					$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
					redirect(site_url('admin/about'));
				}

					else {
						$this->about_model->update($array_data, $array_id);
						$this->session->set_flashdata('success',$this->edit_text);

						redirect(site_url('admin/about'));
					}
				break;

			default:
				redirect(site_url('admin/about'));
				break;
		}
	}
}
