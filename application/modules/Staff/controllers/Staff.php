<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends MY_Controller {

	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$data['title']='Staff';
		$data['page_header']='Staff';
		$data['heading']='Staff List';
		$data['module']="Staff";
		$data['content_view']="staffSetup";
		$data['status'] = 'active';
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
		echo modules::run('Template/index',$data);
	}
}
