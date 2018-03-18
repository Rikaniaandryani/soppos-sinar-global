<?php

/**
*
*/
class Contact extends Backend_Controller
{

	public function index()
	{
		$id = 1;

		$this->data['content'] = 'admin/pages/contact/view';
		$this->data['contact'] = $this->contact_model->get($id);

		$this->load->view('admin/media', $this->data);
	}

	public function action($param)
	{
		$id = 1;
		$array_id = array('contact_id' => $id);
		$post 		= $this->input->post(NULL, TRUE);

		switch ($param) {

			/* ----------- EDIT DATA ----------- */
			case 'update':
				$array_data = array(
					'contact_phone' => $post['phone'],
					'contact_fax' => $post['fax'],
					'contact_email' => $post['email'],
					'contact_address' => $post['address'],
					'contact_maps' => $this->input->post('maps'),
					'contact_fb' => $post['fb'],
					'contact_tw' => $post['tw'],
					'contact_ig' => $post['ig'],
					'contact_path' => $post['path']
					);
				$update = $this->contact_model->update($array_data, $array_id);
				$this->session->set_flashdata('success',$this->edit_text);
				redirect(site_url('admin/contact'));
				break;

			default:
				redirect(site_url('admin/contact'));
				break;
		}
	}
}
