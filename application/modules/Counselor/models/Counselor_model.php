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

	function add_counselor($InsertCounselor)
	{
		$str=$this->db->insert('tbl_counselor',$InsertCounselor);
	}

	function getAllCounselors()
	{
		$this->db->select('c_id,c_fname,c_mname,c_lname,c_email,c_ctc_year,c_code');
		$this->db->from('tbl_counselor');

		$query=$this->db->get();
		if($query->num_rows())     
		{
			return $query->result_array();
		}   
		else
		{
			return false;
		}
	}

	function getCounselorDtlById($counselorId)
	{
		$this->db->select('c_id,c_fname,c_mname,c_lname,c_email,c_ctc_year,c_code,c_dob,c_p_address,c_t_address,c_phone,c_qualification,c_role');
		$this->db->from('tbl_counselor');

		$query=$this->db->get();
		if($query->num_rows())     
		{
			return $query->row_array();
		}   
		else
		{
			return false;
		}
	}
}
?>