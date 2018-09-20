<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evaluation extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		// $this->load->model('Counselor_model');

		// if(!$this->session->userdata('is_logged')){
		// 	redirect('Login');
		// }
	}

	public function index()
	{
		$data['title']='Evaluation';
		$data['page_header']='Evaluation';
		$data['heading']='Evaluation Setup';
		$data['module']="Evaluation";
		$data['content_view']="index";
		$data['status'] = 'active';
		// $data['data']=$this->Role_model->read();
		echo modules::run('Template/index',$data);
	}

	function newEvaluation()
	{
		$data['title'] = 'New Evaluation';
		$data['page_header'] = 'New Evaluation';
		$data['heading'] = 'New Evaluation';
		$data['module'] = 'Evaluation';
		$data['content_view'] = 'newEvaluation';
		$data['status'] = 'active';
		echo modules::run('Template/index',$data);
	}
}
