<?php 

class Sales extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model("Sale_model");
    }

    public function index() {
        $this->load->view('layouts/head');
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');

        $fechaini = $this->input->post("fechaini");
        $fechafin = $this->input->post("fechafin");

        if ($this->input->post("search")) {
            $sales = $this->Sale_model->searchSaleByDate($fechaini,$fechafin);
        }else {
            $sales = $this->Sale_model->getSales();
        }

        $data = array(
            'sales'         =>      $sales,
            'fechaini'      =>      $fechaini,
            'fechafin'      =>      $fechafin
        );

        $this->load->view('admin/reports/sales', $data);
        $this->load->view('layouts/footer');
    }
}