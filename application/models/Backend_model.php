<?php 

class Backend_model extends CI_Model {

    public function getID($link) {
        $this->db->like("MENU_Link");
        $res = $this->db->get("menus");
        return $res->row();
    }

    public function getPermissionsLevel($menu,$role) {
        $this->db->where("MENU_Code",$menu);
        $this->db->where("ROLE_Code",$role);
        $res = $this->db->get("permissions");
        return $res->row();
    }

    public function rowCount($state,$table) {
        if ($table != "sales") {
            $this->db->where($state,1);
        }
        
        $res = $this->db->get($table);
        return $res->num_rows();
    }
}