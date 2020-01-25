<?php 

class Doctype_model extends CI_Model {

    public function getDocTypes() {
        $res = $this->db->get("doc_types");
        return $res->result();
    }
}