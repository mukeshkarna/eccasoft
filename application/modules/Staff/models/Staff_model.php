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

	function addNewStaff($InsertStaff)
	{
		$str = $this->db->insert('tbl_staff', $InsertStaff);
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

	function getStaffDtlById()
	{
		$this->db->select('s.staff_id,s.staff_fname,s.staff_mname,s.staff_lname,s.staff_email,s.staff_designation, s.staff_phone,s.staff_p_address, s.staff_t_address, s.staff_joined_date, r.role_name');
		$this->db->from('tnl_staff');
  		$this->db->join('tbl_role', 'r.role_id = s.role_id');

  		$query = $this->db->get()->row_array();
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