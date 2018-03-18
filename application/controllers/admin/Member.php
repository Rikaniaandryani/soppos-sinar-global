<?php 

/**
* 
*/
class Member extends Backend_Controller
{
	
	public function index()
	{
		redirect(site_url('admin/member/all'));
	}

	public function all()
	{
		$this->data['content']	= 'admin/pages/member/view';
		$this->data['member']		= $this->member_model->get_member();
		$this->data['reason']		= $this->reason_model->get();

		$this->load->view('admin/media', $this->data);
	}

	public function recent()
	{
		$this->data['content']	= 'admin/pages/member/view';
		$this->data['member']		= $this->member_model->get_member(
			array(
				'{PRE}'.'member.member_status' => 'unverified'
				)
			);
		$this->data['reason']		= $this->reason_model->get();

		$this->load->view('admin/media', $this->data);
	}

	public function blacklist()
	{
		$this->data['content']	= 'admin/pages/member/view';
		$this->data['member']		= $this->member_model->get_member(
			array(
				'{PRE}'.'member.member_block' => 'block'
				)
			);
		$this->data['reason']		= $this->reason_model->get();

		$this->load->view('admin/media', $this->data);
	}

	public function detail($id)
	{
		$this->data['content']	= 'admin/pages/member/detail';
		$this->data['member']		= $this->member_model->get_member(array('member_id' => $id), 1, NULL, TRUE);

		$subdistrict = $this->lawave_shipment->subdistrict($this->data['member']->city_id);

		foreach ($subdistrict['rajaongkir']['results'] as $district) {
			if ($district['subdistrict_id'] == $this->data['member']->district_id) {
				$this->data['district'] = $district['subdistrict_name'];
			}
		}
		$this->data['city']		= $this->city_model->get_by(array('city_id' => $this->data['member']->city_id), 1, NULL, TRUE);
		$this->data['province']		= $this->province_model->get_by(array('province_id' => $this->data['member']->province_id), 1, NULL, TRUE);

		$this->data['transaction'] = $this->transaction_model->get_transaction_member(
			array('{PRE}transaction.member_id' => $id)
			);

		
		$this->load->view('admin/media', $this->data);
	}

	public function update($redirec)
	{
		$post 			= $this->input->post(NULL, TRUE);
		$id 				= $post['id'];
		$get_data 	= $this->member_model->get($id);
		$array_id 	= array('member_id' => $id);

		$this->form_validation->set_rules('reason', 'Reason', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
			redirect(site_url('admin/member/'.$redirec));
		}

		else {

			$array_data['reason_id'] 		= $post['reason'];
			$array_data['member_block'] = 'block';

			$this->member_model->update($array_data, $array_id);
			$this->session->set_flashdata('success', $this->block_text);

			redirect(site_url('admin/member/'.$redirec));
		}
	}

	public function enable($id, $redirec)
	{
		$array_id 	= array('member_id' => $id);

		$array_data['member_block'] = 'active';

		$this->member_model->update($array_data, $array_id);
		$this->session->set_flashdata('success', $this->unblock_text);

		redirect(site_url('admin/member/'.$redirec));
	}

	public function update_load()
	{	
		$id 			= $this->input->post('dataID');
		$get_data = $this->member_model->get($id);

		$this->data['id'] 			= $get_data->member_id;
		$this->data['name']	 		= $get_data->member_name;

		echo json_encode($this->data);
	}	
}