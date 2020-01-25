<?php 

class Sale_model extends CI_Model {
    public function getSales() {
        $this->db->select("s.*,c.CLIE_Fullname as client,v.VHR_Name as voucher_type,v.IGV as igv,u.USER_Fullname as user");
        $this->db->from("sales s");
        $this->db->join("clients c","c.CLIE_Code=s.CLIE_Code");
        $this->db->join("voucher_types v","v.VHR_Code=s.VHR_Code");
        $this->db->join("users u","u.USER_Code=s.USER_Code");
        $res = $this->db->get();
        return $res->result();
    }

    public function searchSaleByDate($fechaini,$fechafin) {
        $this->db->select("s.*,c.CLIE_Fullname as client,v.VHR_Name as voucher_type,v.IGV as igv,u.USER_Fullname as user");
        $this->db->from("sales s");
        $this->db->join("clients c","c.CLIE_Code=s.CLIE_Code");
        $this->db->join("voucher_types v","v.VHR_Code=s.VHR_Code");
        $this->db->join("users u","u.USER_Code=s.USER_Code");
        $this->db->where("s.SALE_Date >=", $fechaini);
        $this->db->where("s.SALE_Date <=", $fechafin);
        $res = $this->db->get();
        return $res->result();
    }

    public function getSaleById($id) {       
        $this->db->select("s.*,c.*,v.*,u.*");
        $this->db->from("sales s");
        $this->db->join("clients c","c.CLIE_Code=s.CLIE_Code");
        $this->db->join("voucher_types v","v.VHR_Code=s.VHR_Code");
        $this->db->join("users u","u.USER_Code=s.USER_Code");
        $this->db->where("s.SALE_Code",$id);
        $res = $this->db->get();
        return $res->row();
    }

    public function getDetailSaleById($idsale) {       
        $this->db->select("ds.*,p.*");
        $this->db->from("detail_sales ds");
        $this->db->join("products p","p.PROD_Code=ds.PROD_Code");
        $this->db->where("ds.SALE_Code",$idsale);
        $res = $this->db->get();
        return $res->result();
    }


    public function getYears() {
        $this->db->select("YEAR(SALE_Date) as year");
        $this->db->from("sales");
        $this->db->group_by("year");
        $this->db->order_by("year","DESC");
        $res = $this->db->get();
        return $res->result();
    }

    public function getAmountByDate($year) {
        $this->db->select("MONTH(SALE_Date) as month,SUM(SALE_Total) as amount");
        $this->db->from("sales");
        $this->db->where("SALE_Date >=",$year."-01-01");
        $this->db->where("SALE_Date <=",$year."-12-31");
        $this->db->group_by("month");
        $this->db->order_by("month");
        $res = $this->db->get();
        return $res->result();
    }

    
    public function getProducts($value) {
        $this->db->select("p.PROD_Code as id,p.PROD_Serial as code,p.PROD_Name as label,p.PROD_Price as price,p.PROD_Stock as stock");
        $this->db->from("products p");
        $this->db->like("p.PROD_Name",$value);
        $res = $this->db->get();
        return $res->result_array();
    }

    public function insertSale($data) {
        return $this->db->insert("sales", $data);
    }

    public function lastID(){
        $last_id = $this->db->insert_id();
        return $last_id; 
    }

    public function insertDetailSale($data) {
        return $this->db->insert("detail_sales", $data);
    }

    
}