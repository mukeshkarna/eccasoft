<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Counselor extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Counselor_model');
        $this->load->helper(array('form', 'url'));

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
		$data['counselorList'] = $this->Counselor_model->getAllCounselors();

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
			$this->form_validation->set_rules('ctc_code','CTC Code', 'required|is_unique[tbl_counselor.c_code]');
			$this->form_validation->set_rules('dob','Date of birth', 'required');
			$this->form_validation->set_rules('paddress','Permanent Address', 'required|min_length[10]|max_length[200]');
			$this->form_validation->set_rules('taddress','Temporary Address', 'required|min_length[10]|max_length[200]');
			$this->form_validation->set_rules('email','Email', 'required|valid_email');
			$this->form_validation->set_rules('phone','Phone', 'required');
			$this->form_validation->set_rules('ctc_year','CTC Year', 'required');
			$this->form_validation->set_rules('ctc_month','CTC Month', 'required');
			$this->form_validation->set_rules('qualification','Qualification', 'required');
			$this->form_validation->set_rules('pass','Password', 'required');

			if ($this->form_validation->run()==FALSE) {
				$this->session->set_flashdata('error', "Form Validation Error!!! Insert the data again.");
			}
			else
			{
				$extension = explode('.', $_FILES['user_photo']['name']);
				$new_name = $this->input->post('ctc_code');
				$config['file_name'] = $new_name;
				$config['upload_path'] = './upload/userphoto/';
		        $config['allowed_types'] = 'jpeg|jpg|png';
		        $config['max_size'] = 2048000;

		        $this->load->library('upload', $config);

		        if (!$this->upload->do_upload('user_photo'))
		        {
		            $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
		            $error = $this->upload->display_errors();
		        }
		        else
		        {
		            $img = $this->upload->data(); 
		        }

				$InsertCounselor=array(
					'c_fname' => $this->input->post('fname'),
					'c_mname' => $this->input->post('mname'),
					'c_lname' => $this->input->post('lname'),
					'c_photo' => $new_name.'.'.$extension[1],
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
				// $uploaded_image = $_POST['uploaded_image'];

				// $img ='';
				// if ($_FILES['image']['name'] !='') {
				// 	$img = $this->upload_img($_FILES['image']);
				// 	unlink('./assets/upload/'.$uploaded_image);
				// }else{
				// 	$img = $uploaded_image;
				// }

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

	function deleteCounselorById($counselorId)
	{
		$deleteCounselor = $this->Counselor_model->removeCounselorById($counselorId);
		
		if(!empty($deleteCounselor))
		{
			$this->session->set_flashdata('success',"Data deleted successfully");
		}else{
			$this->session->set_flashdata('error', "Sorrry!! Data couldn't be deleted");
		}
		redirect('Counselor/index');
	}
}
