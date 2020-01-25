<?php 

class Category_model extends CI_Model {

    public function getCategories() {
        $this->db->where('CATE_Flag',1);
        $res = $this->db->get("categories");
        return $res->result();
    }

    public function getCategoryById($id) {
        $this->db->where('CATE_Code',$id);
        $res = $this->db->get("categories");
        return $res->row();
    }

    public function insertCategory($data) {
        return $this->db->insert("categories",$data);
    }

    public function updateCategory($id,$data) {
        $this->db->where('CATE_Code',$id);
        return $this->db->update("categories",$data);
    }

    public function deleteCategory($id) {
        $this->db->where('CATE_Code',$id);
        return $this->db->delete("categories");
    }

}