<?php 

class Product_model extends CI_Model {

    public function getProducts() {
        $this->db->where('PROD_Flag',1);
        $res = $this->db->get('products');
        return $res->result();
    }

    public function getProductsByCategory() {
        $this->db->select('p.*,c.CATE_Name as category');
        $this->db->from('products p');
        $this->db->join('categories c', 'c.CATE_Code = p.CATE_Code');
        $res = $this->db->get();        
        return $res->result();
    }

    public function getProductById($id) {
        $this->db->where('PROD_Code',$id);
        $res = $this->db->get('products');
        return $res->row();
    }

    public function insertProduct($data) {
        return $this->db->insert("products", $data);
    }

    public function updateProduct($id,$data) {
        $this->db->where('PROD_Code',$id);
        return $this->db->update("products", $data);
    }
}