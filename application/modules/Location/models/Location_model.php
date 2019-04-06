<?php
/**
 * 
 */
class Location_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function insertLocation($InsertLocation)
	{
		$str=$this->db->insert('tbl_location',$InsertLocation);

		return $this->db->insert_id();
	}

	function getAllZones()
	{
		$this->db->select('zone_state_id,zone_state_name');
		$this->db->from('tbl_zone');

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

	function getAllProvinces()
	{
		$this->db->select('province_id,province_name');
		$this->db->from('tbl_province');

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
	function getLocationDtlById($locationId)
	{
		$this->db->select('c_id,c_fname,c_mname,c_lname,c_gender,c_email,c_ctc_year,c_ctc_month,c_password,c_code,c_dob,c_p_address,c_t_address,c_phone,c_qualification,c_role,c_photo');
		$this->db->from('tbl_location');
		$this->db->where('c_id', $locationId);

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

	function updateLocationById($locationId,$updateLocation)
	{
		$ret=$this->db->update('tbl_location', $updateLocation, array('c_id' => $locationId));
		return $ret;
	}

	function removeLocationById($locationId)
	{
		$ret = $this->db->delete('tbl_location', array('c_id' => $locationId));
		return $ret;
	}
}
?>