<?php 

class Ctype_model extends CI_Model {

    public function getClientTypes() {
        $res = $this->db->get("client_types");
        return $res->result();
    }
}