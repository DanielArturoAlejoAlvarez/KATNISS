<?php 

class Permission_model extends CI_Model {
    
    public function getPermissions() {
        $this->db->select("pe.*,r.ROLE_Name as role,m.MENU_Name as menu");
        $this->db->from("permissions pe");
        $this->db->join("roles r","r.ROLE_Code=pe.ROLE_Code");
        $this->db->join("menus m","m.MENU_Code=pe.MENU_Code");
        $this->db->where("PERMI_Flag",1);
        $res = $this->db->get();
        return $res->result();
    }


    public function getPermissionById($id) {
        $this->db->where("PERMI_Code",$id);
        $res = $this->db->get("permissions");
        return $res->row();
    }

    public function insertPermission($data) {
        return $this->db->insert("permissions",$data);
    }

    public function updatePermission($id,$data) {
        $this->db->where("PERMI_Code",$id);
        return $this->db->update("permissions",$data);
    }


}