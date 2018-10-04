<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Counselor extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Counselor_model');

		if(!$this->session->userdata('is_logged')){
			redirect('Login');
		}
	}

	public function index()
	{
		$data['title']='Counselor';
		$data['page_header']='Counselor';
		$data['heading']='Counselor List';
		$data['module']="Counselor";
		$data['content_view']="index";
		$data['status'] = 'active';
		$data['counselorList']=$this->Counselor_model->getAllCounselors();
		// echo '<pre>';
		// print_r($data['counselorList']);
		// echo '</pre>';
		// die();
		echo modules::run('Template/index',$data);
	}

	function addNewCounselor()
	{
		$data['title'] = 'Add New Counselor';
		$data['page_header'] = 'Add New Counselor';
		$data['heading'] = 'Add New Counselor';
		$data['module'] = 'Counselor';
		$data['content_view'] = 'add_new_counselor';
		$data['status'] = 'active';

		$this->load->library('form_validation');

		if (isset($_POST['add_new_counselor'])) {
			
			$this->form_validation->set_rules('fname','Full Name', 'required|min_length[3]|max_length[30]');
			$this->form_validation->set_rules('lname','Last Name', 'required|min_length[3]|max_length[30]');
			$this->form_validation->set_rules('ctc_code','CTC Code', 'required');
			$this->form_validation->set_rules('dob','Date of birth', 'required');
			$this->form_validation->set_rules('paddress','Permanent Address', 'required|min_length[10]|max_length[200]');
			$this->form_validation->set_rules('taddress','Temporary Address', 'required|min_length[10]|max_length[200]');
			$this->form_validation->set_rules('email','Email', 'required');
			$this->form_validation->set_rules('phone','Phone', 'required');
			$this->form_validation->set_rules('ctc_year','CTC Year', 'required');
			$this->form_validation->set_rules('qualification','Qualification', 'required');
			$this->form_validation->set_rules('pass','Password', 'required');

			if ($this->form_validation->run()==FALSE) {
				echo "something happened";
			}
			else
			{
				$InsertCounselor=array(
					'c_fname' => $_POST['fname'],
					'c_mname' => $_POST['mname'],
					'c_lname' => $_POST['lname'], 
					'c_code' => $_POST['ctc_code'],
					'c_dob' => $_POST['dob'],
					'c_p_address' => $_POST['paddress'],
					'c_t_address' => $_POST['taddress'],
					'c_email' => $_POST['email'],
					'c_phone' => $_POST['phone'],
					'c_ctc_year' => $_POST['ctc_year'],
					'c_qualification' => $_POST['qualification'],
					'c_password' => $_POST['pass'],
					'c_role' => $this->session->userdata('role_id'),
					'c_created_at' => date('Y-m-s h:i:s'),
					'c_created_by' => $this->session->userdata('user_id')
				);
				// echo '<pre>';
				// print_r($InsertCounselor);
				// echo '</pre>';
				// die();
				$this->Counselor_model->add_counselor($InsertCounselor);
				redirect('Counselor/index');
			}
		}
		echo modules::run('Template/index',$data);
	}
}
