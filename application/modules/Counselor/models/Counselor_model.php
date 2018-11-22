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

	function insertCounselor($InsertCounselor)
	{
		$str=$this->db->insert('tbl_counselor',$InsertCounselor);

		return $this->db->insert_id();
	}

	function getAllCounselors()
	{
		$this->db->select('c_id,c_fname,c_mname,c_lname,c_email,c_ctc_year, c_ctc_month,c_code');
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
		$this->db->select('c_id,c_fname,c_mname,c_lname,c_gender,c_email,c_ctc_year,c_ctc_month,c_password,c_code,c_dob,c_p_address,c_t_address,c_phone,c_qualification,c_role,c_photo');
		$this->db->from('tbl_counselor');
		$this->db->where('c_id', $counselorId);

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

	function updateCounselorById($counselorId,$updateCounselor)
	{
		$ret=$this->db->update('tbl_counselor', $updateCounselor, array('c_id' => $counselorId));
		return $ret;
	}

	function removeCounselorById($counselorId)
	{
		$ret = $this->db->delete('tbl_counselor', array('c_id' => $counselorId));
		return $ret;
	}
}
?>