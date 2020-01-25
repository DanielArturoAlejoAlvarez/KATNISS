<?php 

class Clients extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Client_model');
        $this->load->model('Ctype_model');
        $this->load->model('Doctype_model');

        if (!$this->session->userdata('login')) {
            redirect(base_url());
        }
    }

    public function index() {
        $this->load->view('layouts/head');
		$this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        
        $data = array(
            'clients'       =>      $this->Client_model->getClients()
        );

		$this->load->view('admin/clients/index', $data);
		$this->load->view('layouts/footer');
    }

    public function show($id) {        
        
        $data = array(
            'client'       =>      $this->Client_model->getClientById($id)
        );

		$this->load->view('admin/clients/show', $data);		
    }

    public function create() {
        $this->load->view('layouts/head');
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');

        $data = array(
            'client_types'       =>      $this->Ctype_model->getClientTypes(),
            'doc_types'          =>      $this->Doctype_model->getDocTypes()
        );

        $this->load->view('admin/clients/new',$data);
        $this->load->view('layouts/footer');
    }

    public function store() {
        $client_type = $this->input->post('seleClientType');
        $doc_type = $this->input->post('seleDocType');
        $number = $this->input->post('txtNumber');
        $fullname = $this->input->post('txtFullname');
        $phone = $this->input->post('txtPhone');
        $address = $this->input->post('txtAddress');        
        $state = $this->input->post('seleState');

        $this->form_validation->set_rules('txtFullname','Fullname','required');
        $this->form_validation->set_rules('txtNumber','Number','required|is_unique[clients.CLIE_Number]');
        

        if ($this->form_validation->run()) {
            $data = array(
                'CLT_Code'          =>      $client_type,
                'DOC_Code'          =>      $doc_type,
                'CLIE_Number'       =>      $number,
                'CLIE_Fullname'     =>      $fullname,
                'CLIE_Phone'        =>      $phone,
                'CLIE_Address'      =>      $address,                
                'CLIE_Flag'         =>      $state
            );
    
            if($this->Client_model->insertClient($data)) {
                $this->session->set_flashdata('success','Client saved successfully!');
                redirect(base_url() . "maintenance/clients/index");
            }else {
                $this->session->set_flashdata('error','Error saving client!');
                redirect(base_url() . "clients/new");
            }
        }else {
            $this->create();
        }        
    }

    public function edit($id) {
        $this->load->view('layouts/head');
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');

        $data = array(
            'client'             =>      $this->Client_model->getClientById($id),
            'client_types'       =>      $this->Ctype_model->getClientTypes(),
            'doc_types'          =>      $this->Doctype_model->getDocTypes()
        );

        $this->load->view('admin/clients/edit',$data);
        $this->load->view('layouts/footer');
    }

    public function update() {
        $idclient = $this->input->post('txtId');
        $client_type = $this->input->post('seleClientType');
        $doc_type = $this->input->post('seleDocType');
        $number = $this->input->post('txtNumber');
        $fullname = $this->input->post('txtFullname');
        $phone = $this->input->post('txtPhone');
        $address = $this->input->post('txtAddress');        
        $state = $this->input->post('seleState');

        $currentNumber = $this->Client_model->getClientById($idclient);

        //echo currentNumber->CLIE_Ruc;

        if ($number == $currentNumber->CLIE_Number) {
            $unique = '';
        }else {
            $unique = '|is_unique[clients.CLIE_Number]';
        }

        $this->form_validation->set_rules('txtFullname','Fullname','required');
        $this->form_validation->set_rules('txtNumber','Number','required' . $unique);


        if ($this->form_validation->run()) {
            $data = array(
                'CLT_Code'          =>      $client_type,
                'DOC_Code'          =>      $doc_type,
                'CLIE_Number'       =>      $number,
                'CLIE_Fullname'     =>      $fullname,
                'CLIE_Phone'        =>      $phone,
                'CLIE_Address'      =>      $address,                
                'CLIE_Flag'         =>      $state
            );
    
            if($this->Client_model->updateClient($idclient,$data)) {
                $this->session->set_flashdata('success','Client updated successfully!');
                redirect(base_url() . "maintenance/clients/index");
            }else {
                $this->session->set_flashdata('error','Error updating client!');
                redirect(base_url() . "clients/edit/$idclient");
            }
        }else {
            $this->edit($idclient);
        }        
    }

    public function delete($id) {
        $data = array(            
            'CLIE_Flag'         =>      '0'
        );

        $this->Client_model->updateClient($id,$data);
        echo "maintenance/clients/index";
    }
}