<?php 

class User_model extends CI_Model {

    public function getUsers() {
        $this->db->select('u.*,r.ROLE_Name as role');
        $this->db->from('users u');
        $this->db->join('roles r','r.ROLE_Code=u.ROLE_Code');
        $this->db->where('u.USER_Flag',1);
        $res = $this->db->get();
        return $res->result();
    }    

    public function getUserById($id) {
        $this->db->select('u.*,r.ROLE_Name as role');
        $this->db->from('users u');
        $this->db->join('roles r','r.ROLE_Code=u.ROLE_Code');
        $this->db->where('u.USER_Code',$id);
        $res = $this->db->get();
        return $res->row();
    }

    public function insertUser($data) {
        return $this->db->insert("users",$data);
    }

    public function updateUser($id,$data) {
        $this->db->where('USER_Code',$id);
        return $this->db->insert("users",$data);
    }

    public function login($username,$password) {
        $this->db->where("USER_Username",$username);
        $this->db->where("USER_Password",$password);

        $result = $this->db->get("users");
        if ($result->num_rows()>0) {
            return $result->row();
        }else {
            return false;
        }
    }
}