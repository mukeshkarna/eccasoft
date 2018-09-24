<?php
/**
 * 
 */
class Counselor_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function add_counselor()
	{
		$data=array(
			'c_fname'=>$_POST['fname'],
			'c_mname'=>$_POST['mname'],
			'c_lname'=>$_POST['lname'], 
			'c_code'=>$_POST['ctc_code'],
			'c_dob'=>$_POST['tags'],
			'c_p_address'=>$_POST['tags'],
			'c_t_address'=>$_POST['tags'],
			'c_email'=>$_POST['tags'],
			'c_phone'=>$_POST['tags'],
			'c_ctc_year'=>$_POST['tags'],
			'c_qualification'=>$_POST['tags'],
			'c_password'=>$_POST['tags'],
			'c_created_at'=>date('Y-m-s h:i:s'),
			'c_created_by'=>$this->session->userdata('user_id')
		);
		$str=$this->db->insert('posts',$data);
	}
}
?>