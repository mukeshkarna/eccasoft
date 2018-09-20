<?php

class Login extends MY_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
		$this->load->library('session');

	}
	
	public function index()
	{
		if($this->session->userdata('is_logged'))
		{
			redirect('Home');
		}

		$this->load->library('form_validation');
		if(isset($_POST['login_form']))
		{
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			if($this->form_validation->run()==TRUE)
			{
				echo "hello there";
			}else{
				
				$email = $this->input->post('staff_email');
				$password = $this->input->post('staff_password');
				echo $email.' '.$password; 
				$user_id = $this->Login_model->checkUser($email, $password);
				$user_role = $this->Login_model->checkUserRole($email);
				if($user_id)
				{
					$data = array(
						'is_logged' => true,
						'user_id' => $user_id,
						'role_id' => $user_role
					);
					$this->session->set_userdata($data);
					redirect('Home');
				} else {
					redirect('Login/index');
				}
			}
		}
		$this->load->view('login');
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect('Login/index');
	}
}
