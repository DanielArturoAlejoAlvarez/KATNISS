<?php 

class Vtype_model extends CI_Model {

    public function getVoucherTypes() {
        $res = $this->db->get("voucher_types");
        return $res->result();
    }

    public function getVoucherTypeById($id) {
        $this->db->where('VHR_Code',$id);
        $res = $this->db->get("voucher_types");
        return $res->row();
    }

    public function updateVoucherType($id,$data) {
        $this->db->where('VHR_Code',$id);
        $this->db->update("voucher_types", $data);
    }
}