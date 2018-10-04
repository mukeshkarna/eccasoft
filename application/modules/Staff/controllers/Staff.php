<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Staff_model');
	}
	
	public function index()
	{
		$data['title']='Staff';
		$data['page_header']='Staff';
		$data['heading']='Staff List';
		$data['module']="Staff";
		$data['content_view']="staffSetup";
		$data['status'] = 'active';
		$data['staffList'] = $this->Staff_model->getAllStaffs();

		echo modules::run('Template/index',$data);
	}

	public function addNewStaff()
	{
		$data['title'] = 'Add New Staff';
		$data['page_header'] = 'Add New Staff';
		$data['heading'] = 'Add New Staff';
		$data['module'] = 'Staff';
		$data['content_view'] = 'addNewStaff';
		$data['status'] = 'active';
		$data['roleList'] = $this->Staff_model->getRoleAll();

		$this->load->library('form_validation');
		
		if (isset($_POST['add_new_staff'])) {
			$this->form_validation->set_rules('fname','First Name','required|min_length[3]|max_length[15]');
			$this->form_validation->set_rules('lname','Last Name','required|min_length[3]|max_length[15]');
			$this->form_validation->set_rules('pass','Password','required|min_length[3]|max_length[15]');
			$this->form_validation->set_rules('email','Email','required');
			$this->form_validation->set_rules('phoneno', 'Phone No.' ,'required');
			$this->form_validation->set_rules('joineddate', 'Joined Date' ,'required');
			$this->form_validation->set_rules('paddress', 'Permanent Address' ,'required');
			$this->form_validation->set_rules('taddress', 'Temporary Address' ,'required');
			$this->form_validation->set_rules('role', 'Role' ,'required');
			$this->form_validation->set_rules('designation', 'Designation', 'required');

			if($this->form_validation->run()==FALSE)
			{
				echo "something wrong happened";
			}else{
				$InsertCounselor=array(
					'c_fname' => $_POST['fname'],
					'c_mname' => $_POST['mname'],
					'c_lname' => $_POST['lname'], 
					'c_dob' => $_POST['dob'],
					'c_p_address' => $_POST['paddress'],
					'c_t_address' => $_POST['taddress'],
					'c_email' => $_POST['email'],
					'c_phone' => $_POST['phoneno'],
					'c_qualification' => $_POST['designation'],
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
