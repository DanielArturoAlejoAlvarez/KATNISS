<?php 

class Menu_model extends CI_Model {
    
    public function getMenus() {
        $res = $this->db->get("menus");
        return $res->result();
    }
}