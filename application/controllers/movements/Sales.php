<?php 

class Sales extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();

        $this->load->model("Client_model");
        $this->load->model("Sale_model");
        $this->load->model("Vtype_model");
        $this->load->model("Product_model");
        if(!$this->session->userdata("login")) {
            redirect(base_url());
        }
    }


    public function index() {
        $this->load->view('layouts/head');
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');

        $data = array(
            'sales'     =>      $this->Sale_model->getSales()
        );

        $this->load->view('admin/sales/index', $data);
        $this->load->view('layouts/footer');
    } 

    public function show() {  
        $idsale = $this->input->post("id");
        $data = array(
            'sale'              =>      $this->Sale_model->getSaleById($idsale),
            'details'           =>      $this->Sale_model->getDetailSaleById($idsale)            
        );
        $this->load->view('admin/sales/show',$data);        
    }


    public function create() {
        $this->load->view('layouts/head');
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');

        $data = array(
            'voucher_types'     =>      $this->Vtype_model->getVoucherTypes(),
            'clients'           =>      $this->Client_model->getClients()
        );

        $this->load->view('admin/sales/new', $data);
        $this->load->view('layouts/footer');
    } 

    public function getProducts() {
        $value = $this->input->post("value");

        $clients = $this->Sale_model->getProducts($value);

        echo json_encode($clients);
    }

    public function store() {
        $idclient = $this->input->post("idclient");
        $idvoucher = $this->input->post("idvoucher");
        $number = $this->input->post("txtNumber");
        $iduser = $this->session->userdata("id");
        $date = $this->input->post("txtDate");
        $total = $this->input->post("total");
        $igv = $this->input->post("nigv");
        $serial = $this->input->post("txtSerial");


        $idproducts = $this->input->post("idproducts");
        $prices = $this->input->post("prices");
        $qtys = $this->input->post("qtys");
        $amounts = $this->input->post("amounts");


        $data = array(
            'CLIE_Code'     =>      $idclient,
            'VHR_Code'      =>      $idvoucher,
            'SALE_Number'   =>      $number,
            'USER_Code'     =>      $iduser,
            'SALE_Date'     =>      $date,
            'SALE_Total'    =>      $total,
            'SALE_IGV'      =>      $igv,
            'SALE_Serial'   =>      $serial
        );        

        if($this->Sale_model->insertSale($data)) {
            $idsale = $this->Sale_model->lastID();            
            $this->updateVoucher($idvoucher);
            $this->saveDetailSale($idproducts,$idsale,$prices,$qtys,$amounts);
            redirect(base_url() . "movements/sales/index");
        }else {
            $this->create();
        }
    }




    protected function updateVoucher($idvoucher) {
        $currentVoucher = $this->Vtype_model->getVoucherTypeById($idvoucher);
        $data = array(
            'VHR_Qty'       =>      $currentVoucher->VHR_Qty + 1
        );

        $this->Vtype_model->updateVoucherType($idvoucher,$data);
    }

    protected function saveDetailSale($idproducts,$idsale,$prices,$qtys,$amounts) {

        for ($i=0; $i < count($idproducts) ; $i++) { 
            $data = array(
                'PROD_Code'     =>      $idproducts[$i],
                'SALE_Code'     =>      $idsale,
                'PROD_Price'    =>      $prices[$i],
                'DETA_Qty'      =>      $qtys[$i],
                'DETA_Subtotal' =>      $amounts[$i]
            );

            $this->Sale_model->insertDetailSale($data);
            $this->updateStock($idproducts[$i],$qtys[$i]);
        }
    }

    protected function updateStock($idproduct,$qty) {
        $currentProduct = $this->Product_model->getProductById($idproduct);
        $data = array(
            'PROD_Stock'        =>      $currentProduct->PROD_Stock - $qty
        );
        $this->Product_model->updateProduct($idproduct,$data);
    }


}