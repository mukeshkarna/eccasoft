<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Location extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Location_model');
		$this->load->helper(array('form', 'url'));

		if(!$this->session->userdata('is_logged')){
			redirect('Login');
		}
	}

	public function index()
	{
		$data['title']='Location';
		$data['page_header']='Location';
		$data['heading']='Location';
		$data['module']="Location";
		$data['content_view']="index";
		$data['status'] = 'active';
		// $data['locationList'] = $this->Location_model->getAllLocations();

		echo modules::run('Template/index',$data);
	}

	function addNewProvince()
	{
		$data['title'] = 'Add New Province';
		$data['page_header'] = 'Add New Province';
		$data['heading'] = 'Add New Province';
		$data['module'] = 'Location';
		$data['content_view'] = 'add_new_province';
		$data['status'] = 'active';
		$data['zoneList'] = $this->Location_model->getAllZones();
		$data['zoneList'] = $this->Location_model->getAllZones();

		$this->load->library('form_validation');

		if (isset($_POST['add_new_province'])) {

			$this->form_validation->set_rules('fname','Full Name', 'required|min_length[3]|max_length[30]');

			if ($this->form_validation->run()==FALSE) {
				$this->session->set_flashdata('error', "Form Validation Error!!! Insert the data again.");
			}
			else
			{

				$InsertLocation=array(
					'c_fname' => $this->input->post('fname'),
					'c_created_at' => date('Y-m-s h:i:s'),
					'c_created_by' => $this->session->userdata('user_id')
				);

				$result = $this->Location_model->insertLocation($InsertLocation);

				if(!empty($result)){
					$this->session->set_flashdata('success', "Data Inserted Successfully.");
				}else{
					$this->session->set_flashdata('error', "Sorry!! Data couldn't be inserted.");
				}

				redirect('Location/index');
			}
		}
		echo modules::run('Template/index',$data);
	}

	function addNewDistrict()
	{
		$data['title'] = 'Add New District';
		$data['page_header'] = 'Add New District';
		$data['heading'] = 'Add New District';
		$data['module'] = 'Location';
		$data['content_view'] = 'add_new_district';
		$data['status'] = 'active';
		$data['zoneList'] = $this->Location_model->getAllZones();
		$data['provinceList'] = $this->Location_model->getAllProvinces();

		$this->load->library('form_validation');

		if (isset($_POST['add_new_district'])) {

			$this->form_validation->set_rules('fname','Full Name', 'required|min_length[3]|max_length[30]');
			$this->form_validation->set_rules('ctc_code','CTC Code', 'required|is_unique[tbl_location.c_code]');

			if ($this->form_validation->run()==FALSE) {
				$this->session->set_flashdata('error', "Form Validation Error!!! Insert the data again.");
			}
			else
			{

				$InsertLocation=array(
					'c_fname' => $this->input->post('fname'),
					'c_code' => $this->input->post('ctc_code'),
					'c_created_at' => date('Y-m-s h:i:s'),
					'c_created_by' => $this->session->userdata('user_id')
				);

				$result = $this->Location_model->insertLocation($InsertLocation);

				if(!empty($result)){
					$this->session->set_flashdata('success', "Data Inserted Successfully.");
				}else{
					$this->session->set_flashdata('error', "Sorry!! Data couldn't be inserted.");
				}

				redirect('Location/index');
			}
		}
		echo modules::run('Template/index',$data);
	}

	function editLocation($locationId)
	{
		$data['title'] = 'Edit Location Detail';
		$data['page_header'] = 'Edit Location Detail';
		$data['heading'] = 'Edit Location Detail';
		$data['module'] = 'Location';
		$data['content_view'] = 'edit_location_detail';
		$data['status'] = 'active';

		$data['locationDtl']=$this->Location_model->getLocationDtlById($locationId);

		if (isset($_POST['edit_location'])) {
			
			$this->form_validation->set_rules('fname','Full Name', 'required|min_length[3]|max_length[30]');
			// $this->form_validation->set_rules('fname','Full Name', 'required|min_length[3]|max_length[30]');
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
			} else {
				// $uploaded_image = $_POST['uploaded_image'];

				// $img ='';
				// if ($_FILES['image']['name'] !='') {
				// 	$img = $this->upload_img($_FILES['image']);
				// 	unlink('./assets/upload/'.$uploaded_image);
				// }else{
				// 	$img = $uploaded_image;
				// }

				$updateLocation=array(
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
					'c_role' => '2',
					'c_modified_at' => date('Y-m-s h:i:s'),
					'c_modified_by' => $this->session->userdata('user_id')
				);

				$result = $this->Location_model->updateLocationById($locationId,$updateLocation);

				if(!empty($result)){
					$this->session->set_flashdata('success', "Data Updated Successfully.");
				}else{
					$this->session->set_flashdata('error', "Sorry!! Data couldn't be updated.");
				}
				redirect('Location/index');
			}
		}
		echo modules::run('Template/index',$data);
	}

	function getLocationDetailById($locationId)
	{
		$data['locationDtl']=$this->Location_model->getLocationDtlById($locationId);		
		echo json_encode($data['locationDtl']);
	}

	function deleteLocationById($locationId)
	{
		$deleteLocation = $this->Location_model->removeLocationById($locationId);
		
		if(!empty($deleteLocation))
		{
			$this->session->set_flashdata('success',"Data deleted successfully");
		}else{
			$this->session->set_flashdata('error', "Sorrry!! Data couldn't be deleted");
		}
		redirect('Location/index');
	}
}
