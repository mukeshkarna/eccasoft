<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Template_model');

		if(!$this->session->userdata('is_logged')){
			redirect('Login');
		}
	}
	
	public function index($data=null)
	{
		$id = $this->session->userdata('user_id');
		$data['userDtl'] = $this->Template_model->getUserDetailById($id);	
		$this->load->view('main_page',$data);
	}
}
?>