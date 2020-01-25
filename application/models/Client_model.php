<?php 

class Client_model extends CI_Model {

    public function getClients() {
        $this->db->select('c.*,ct.CLT_Name as client_type,dt.DOC_Name as doc_type');
        $this->db->from('clients c');
        $this->db->join('client_types ct', 'ct.CLT_Code = c.CLT_Code');
        $this->db->join('doc_types dt', 'dt.DOC_Code = c.DOC_Code');
        $this->db->where('CLIE_Flag',1);
        $res = $this->db->get();        
        return $res->result();
    }

    public function getClientById($id) {
        $this->db->where('CLIE_Code',$id);
        $res = $this->db->get('clients');
        return $res->row();
    }

    public function insertClient($data) {
        return $this->db->insert("clients",$data);
    }

    public function updateClient($id,$data) {
        $this->db->where('CLIE_Code',$id);
        return $this->db->update("clients",$data);
    }
}