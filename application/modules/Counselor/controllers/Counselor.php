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
			$this->form_validation->set_rules('gender','Gender', 'required');
			$this->form_validation->set_rules('ctc_code','CTC Code', 'required');
			$this->form_validation->set_rules('dob','Date of birth', 'required');
			$this->form_validation->set_rules('paddress','Permanent Address', 'required|min_length[10]|max_length[200]');
			$this->form_validation->set_rules('taddress','Temporary Address', 'required|min_length[10]|max_length[200]');
			$this->form_validation->set_rules('email','Email', 'required');
			$this->form_validation->set_rules('phone','Phone', 'required');
			$this->form_validation->set_rules('ctc_year','CTC Year', 'required');
			$this->form_validation->set_rules('ctc_month','CTC Month', 'required');
			$this->form_validation->set_rules('qualification','Qualification', 'required');
			$this->form_validation->set_rules('pass','Password', 'required');

			if ($this->form_validation->run()==FALSE) {
				$this->session->set_flashdata('error', "Form Validation Error!!!");
			}
			else
			{
				$InsertCounselor=array(
					'c_fname' => $this->input->post('fname'),
					'c_mname' => $this->input->post('mname'),
					'c_lname' => $this->input->post('lname'),
					'c_gender' => $this->input->post('gender'), 
					'c_code' => $this->input->post('ctc_code'),
					'c_dob' => $this->input->post('dob'),
					'c_p_address' => $this->input->post('paddress'),
					'c_t_address' => $this->input->post('taddress'),
					'c_email' => $this->input->post('email'),
					'c_phone' => $this->input->post('phone'),
					'c_ctc_year' => $this->input->post('ctc_year'),
					'c_ctc_month' => $this->input->post('ctc_month'),
					'c_qualification' => $this->input->post('qualification'),
					'c_password' => $this->input->post('pass'),
					'c_role' => '3',
					'c_created_at' => date('Y-m-s h:i:s'),
					'c_created_by' => $this->session->userdata('user_id')
				);

				$result = $this->Counselor_model->insertCounselor($InsertCounselor);

				if(!empty($result)){
					$this->session->set_flashdata('success', "Data Inserted Successfully.");
				}else{
					$this->session->set_flashdata('error', "Sorry!! Data couldn't be inserted.");
				}

				redirect('Counselor/index');
			}
		}
		echo modules::run('Template/index',$data);
	}

	function editCounselor($counselorId)
	{
		$data['title'] = 'Edit Counselor Detail';
		$data['page_header'] = 'Edit Counselor Detail';
		$data['heading'] = 'Edit Counselor Detail';
		$data['module'] = 'Counselor';
		$data['content_view'] = 'edit_counselor_detail';
		$data['status'] = 'active';

		$data['counselorDtl']=$this->Counselor_model->getCounselorDtlById($counselorId);

		if (isset($_POST['edit_counselor'])) {
			
			$this->form_validation->set_rules('fname','Full Name', 'required|min_length[3]|max_length[30]');
			$this->form_validation->set_rules('fname','Full Name', 'required|min_length[3]|max_length[30]');
			$this->form_validation->set_rules('lname','Last Name', 'required|min_length[3]|max_length[30]');
			$this->form_validation->set_rules('gender','Gender', 'required');
			$this->form_validation->set_rules('ctc_code','CTC Code', 'required');
			$this->form_validation->set_rules('dob','Date of birth', 'required');
			$this->form_validation->set_rules('paddress','Permanent Address', 'required|min_length[10]|max_length[200]');
			$this->form_validation->set_rules('taddress','Temporary Address', 'required|min_length[10]|max_length[200]');
			$this->form_validation->set_rules('email','Email', 'required');
			$this->form_validation->set_rules('phone','Phone', 'required');
			$this->form_validation->set_rules('ctc_year','CTC Year', 'required');
			$this->form_validation->set_rules('ctc_month','CTC Month', 'required');
			$this->form_validation->set_rules('qualification','Qualification', 'required');
			$this->form_validation->set_rules('pass','Password', 'required');

			if ($this->form_validation->run()==FALSE) {
				$this->session->set_flashdata('error', "Form Validation Error!!!");
			}
			else
			{
				$updateCounselor=array(
					'c_fname' => $this->input->post('fname'),
					'c_mname' => $this->input->post('mname'),
					'c_lname' => $this->input->post('lname'),
					'c_gender' => $this->input->post('gender'),
					'c_code' => $this->input->post('ctc_code'),
					'c_dob' => $this->input->post('dob'),
					'c_p_address' => $this->input->post('paddress'),
					'c_t_address' => $this->input->post('taddress'),
					'c_email' => $this->input->post('email'),
					'c_phone' => $this->input->post('phone'),
					'c_ctc_year' => $this->input->post('ctc_year'),
					'c_ctc_month' => $this->input->post('ctc_month'),
					'c_qualification' => $this->input->post('qualification'),
					'c_password' => $this->input->post('pass'),
					'c_role' => '3',
					'c_modified_at' => date('Y-m-s h:i:s'),
					'c_modified_by' => $this->session->userdata('user_id')
				);

				$result = $this->Counselor_model->updateCounselorById($counselorId,$updateCounselor);

				if(!empty($result)){
					$this->session->set_flashdata('success', "Data Updated Successfully.");
				}else{
					$this->session->set_flashdata('error', "Sorry!! Data couldn't be updated.");
				}
				redirect('Counselor/index');
			}
		}
		echo modules::run('Template/index',$data);
	}

	function getCounselorDetailById($counselorId)
	{
		$data['counselorDtl']=$this->Counselor_model->getCounselorDtlById($counselorId);		
		echo json_encode($data['counselorDtl']);
	}
}
