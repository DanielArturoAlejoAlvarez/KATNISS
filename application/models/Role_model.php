<?php 

class Role_model extends CI_Model {

    public function getRoles() {
        $res = $this->db->get("roles");
        return $res->result();
    }
}