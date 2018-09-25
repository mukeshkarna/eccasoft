<?php
/**
* 
*/
class Template_model extends CI_Model
{
	
	function __construct(argument)
	{
		parent::__construct();
	}

	function getUserDetailById($id)
	{
		$this->db->select()->from('tbl_staff');
		$this->db->where('id'=> $id);
		
	}
}
?>