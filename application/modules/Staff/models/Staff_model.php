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

		return $this->db->insert_id();
	}

	function getAllStaffs()
	{
		$this->db->select('staff_id,staff_fname,staff_mname, staff_lname, staff_joined_date, staff_designation');
		$this->db->from('tbl_staff');

		$query = $this->db->get();
		if ($query->num_rows()) {
			return $query->result_array();
		}else{
			return false;
		}
	}

	function getStaffDtlById($staff_id)
	{
		$sql = "select a.staff_id, a.staff_fname, a.staff_mname, a.staff_lname, a.staff_photo, a.staff_gender,a.staff_password, a.staff_phone, a.staff_email, a.staff_designation, a.staff_phone,a.staff_p_address, a.staff_t_address, a.staff_joined_date,a.role_id, b.role_name from tbl_staff a left join tbl_role b on b.role_id=a.role_id where staff_id=$staff_id";
		$result = $this->db->query($sql);
		
		if($result)
		{
			return $result->row_array();
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