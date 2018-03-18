<?php

/**
*
*/
class Login extends Frontend_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// $pass = hash_string('admin321'); die($pass);
		$this->load->view('login');
	}

	public function action($param)
	{
		$post		= $this->input->post(NULL, TRUE);
		$rules 	= $this->login_model->rules;

		switch ($param) {
			/* LOGIN */
			case 'auth':
				$this->form_validation->set_rules($rules);

				if ($this->form_validation->run() == FALSE) {
					$this->session->set_flashdata('error', validation_errors('<li>','</li>'));
					redirect(site_url('login'));
				}

				else {
					$user = $post['username'];
					$pass = hash_string($post['password']);
					// echo $pass; die();

					$array_login['user_username'] = $user;
					$array_login['user_password'] = $pass;

					$count 	= $this->login_model->count($array_login);

					if ($count > 0) {
						$get_data 	= $this->login_model->get_by($array_login, 1, NULL, TRUE);

						if ($get_data->user_status == 'active') {
							$array_sess['user_session'] 	= hash_link_encode($get_data->user_id);
							$array_sess['username' ]			= $get_data->user_username;
							$array_sess['level'] 					= $get_data->user_level;
							$array_sess['name']	 					= $get_data->user_name;
							$array_sess['is_login'] 			= TRUE;

							$this->login_model->update(
								array('user_session' => hash_string($get_data->user_session)),
								array('user_id' => $get_data->user_id)
								);
							$this->session->set_userdata($array_sess);
							redirect(site_url('admin'));
						}

						else {
							$this->session->set_flashdata('failed', 'Oops !!! Your account is not active!');
							redirect(site_url('login'));
						}
					}

					else {
						$this->session->set_flashdata('failed', 'Oops !!! Incorrect username or password !');
						redirect(site_url('login'));
					}
				}
				break;

			/* LOGOUT */
			case 'logout':
				$array_sess = array(
					'user_session',
					'username',
					'level',
					'name',
					'is_login'
					);

				$unset = $this->session->unset_userdata($array_sess);

				if ($unset) {
					$this->session->set_flashdata('success','Logout success.');
					redirect(site_url('login'));
				}

				else {
					$this->session->set_flashdata('failed','Oops !!! Logout failed.');
					redirect(site_url('admin'));
				}
				break;

			default:
				redirect(site_url('login'));
				break;
		}
	}
}
