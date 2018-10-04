<?php
/**
 * 
 */
class Staff_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function getAllStaffs()
	{
		$this->db->select('staff_id,staff_fname,staff_mname, staff_lname, staff_email, staff_designation');
		$this->db->from('tbl_staff');

		$query = $this->db->get();
		if ($query->num_rows()) {
			return $query->result_array();
		}else{
			return false;
		}
	}

	function getRoleAll()
	{
		$this->db->select('role_id, role_name');
		$this->db->from('tbl_role');

		$query = $this->db->get();
		if($query->num_rows())
		{
			return $query->result_array();
		}
		else
		{
			return false;
		}
	}
}
?>