<?php
/**
* 
*/
class Template_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function getUserDetailById($id)
	{
		$sql = "select a.staff_fname, a.staff_mname, a.staff_lname, a.staff_designation, b.role_name from tbl_staff a left join tbl_role b on b.role_id=a.role_id where staff_id=$id";
		$result = $this->db->query($sql)->row_array();

  		return $result;
	}
}
?>