<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		// $this->load->model('Counselor_model');

		if(!$this->session->userdata('is_logged')){
			redirect('Login');
		}
	}
	
	public function index($data=null)
	{
		$data['title']='Home';
		$data['page_header']='Home';
		$data['heading']='Home';
		$data['module']="Home";
		$data['content_view']="home";
		$data['status'] = 'active'; 
		echo modules::run('Template/index',$data);
	}
}
?>