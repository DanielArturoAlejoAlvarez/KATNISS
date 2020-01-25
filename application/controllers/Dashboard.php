<?php 

class Dashboard extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata("login")) {
            redirect(base_url());
        }

        $this->load->model("Sale_model");
    }

    public function index() {
        $this->load->view('layouts/head');
		$this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        
        $data = array(
            'clients'       =>      $this->Backend_model->rowCount('CLIE_Flag','clients') * 50,
            'products'      =>      $this->Backend_model->rowCount('PROD_Flag','products') * 10,
            'users'         =>      $this->Backend_model->rowCount('USER_Flag','users') * 5,
            'sales'         =>      $this->Backend_model->rowCount('SALE_Flag','sales') * 500,
            'years'         =>      $this->Sale_model->getYears()
        );


		$this->load->view('admin/dashboard',$data);
		$this->load->view('layouts/footer');
    }

    public function getData() {
        $year = $this->input->post("year");
        $res = $this->Sale_model->getAmountByDate($year);
        echo json_encode($res);
    }
}