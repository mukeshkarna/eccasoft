<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Staff_model');

		if(!$this->session->userdata('is_logged')){
			redirect('Login');
		}
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
			
			$this->form_validation->set_rules('fname','First Name','required');
			$this->form_validation->set_rules('lname','Last Name','required');
			$this->form_validation->set_rules('pass','Password','required');
			$this->form_validation->set_rules('email','Email','required');
			$this->form_validation->set_rules('phoneno', 'Phone No.' ,'required');
			$this->form_validation->set_rules('joineddate', 'Joined Date' ,'required');
			$this->form_validation->set_rules('paddress', 'Permanent Address' ,'required');
			$this->form_validation->set_rules('taddress', 'Temporary Address' ,'required');
			$this->form_validation->set_rules('role', 'Role' ,'required');
			$this->form_validation->set_rules('designation', 'Designation', 'required');
			
			if($this->form_validation->run()==FALSE)
			{
				$this->session->set_flashdata('error', "Form Validation Error!!! Insert the data again.");
			}else{
				if(!$_FILES['staff_photo']) {
					$extension = explode('.', $_FILES['staff_photo']['name']);
					$new_name = $this->input->post('staff_id');
					$config['file_name'] = $new_name;
					$config['upload_path'] = './upload/staffphoto/';
					$config['allowed_types'] = 'jpeg|jpg|png';
					$config['max_size'] = 1024000;

					$this->load->library('upload', $config);

					if(!$this->upload->do_upload('staff_photo')){
						$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
						$error = $this->upload->display_errors();
					} else {
						$img = $this->upload->data(); 
					}
					$name = $new_name.'.'.$extension[1];
				} else {
					$name = "";
				}
				$InsertStaff=array(
					'staff_fname' => $this->input->post('fname'),
					'staff_mname' => $this->input->post('mname'),
					'staff_lname' => $this->input->post('lname'),
					'staff_gender' => $this->input->post('gender'),
					'staff_photo' => $name, 
					'staff_password' => $this->input->post('pass'),
					'staff_email' => $this->input->post('email'),
					'staff_phone' => $this->input->post('phoneno'),
					'staff_designation' => $this->input->post('designation'),
					'staff_joined_date' => $this->input->post('joineddate'),
					'staff_p_address' => $this->input->post('paddress'),
					'staff_t_address' => $this->input->post('taddress'),
					'role_id' => $this->input->post('role'),
					'staff_created_at' => date('Y-m-s h:i:s'),
					'staff_created_by' => $this->session->userdata('user_id')
				);

				$result = $this->Staff_model->addNewStaff($InsertStaff);
				if(!empty($result)){
					$this->session->set_flashdata('success', "Data Inserted Successfully.");
				}else{
					$this->session->set_flashdata('error', "Data couldn't be inserted.");
				}
				redirect('Staff/index');
			}
		}
		echo modules::run('Template/index',$data);
	}


	public function getStaffDetailById($staff_id)
	{
		$data['staffDtl'] = $this->Staff_model->getStaffDtlById($staff_id);
		echo json_encode($data['staffDtl']);
	}

	public function editStaff($staff_id)
	{
		$data['title'] = 'Edit Staff Detail';
		$data['page_header'] = 'Edit Staff Detail';
		$data['heading'] = 'Edit Staff Detail';
		$data['module'] = 'Staff';
		$data['content_view'] = 'editStaffDetail';
		$data['status'] = 'active';	
		$data['staffDtl'] = $this->Staff_model->getStaffDtlById($staff_id);
		$data['roleList'] = $this->Staff_model->getRoleAll();

		if(isset($_POST['edit_staff'])) {
			$this->form_validation->set_rules('fname','First Name','required');
			$this->form_validation->set_rules('lname','Last Name','required');
			$this->form_validation->set_rules('pass','Password','required');
			$this->form_validation->set_rules('email','Email','required');
			$this->form_validation->set_rules('phoneno', 'Phone No.' ,'required');
			$this->form_validation->set_rules('joineddate', 'Joined Date' ,'required');
			$this->form_validation->set_rules('paddress', 'Permanent Address' ,'required');
			$this->form_validation->set_rules('taddress', 'Temporary Address' ,'required');
			$this->form_validation->set_rules('role', 'Role' ,'required');
			$this->form_validation->set_rules('designation', 'Designation', 'required');
		}

		echo modules::run('Template/index', $data);	
	}
}
