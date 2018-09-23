<?php
class Login_model extends CI_Model
{
    function __construct(){
        parent::__construct();
    }

    function checkUser($email, $password){
        $this->db->select('staff_id,staff_email,staff_password')->from('tbl_staff');
        $this->db->where('staff_email', $email);
        $this->db->where('staff_password', $password);
        $result =  $this->db->get();


        if($result->num_rows()){
            return $result->row()->staff_id;
        }else{
            return false;
        }
    }


    function checkUserRole($email){
        $this->db->select('staff_id,role_id')->from('tbl_staff');
        $this->db->where('staff_email', $email);
        $result =  $this->db->get();
        
        if($result->num_rows()){
            return $result->row()->role_id;
        }else{
            return false;
        }
    }
}

?>