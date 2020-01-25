<?php 

class Products extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model("Product_model");
        $this->load->model("Category_model");
        if (!$this->session->userdata("login")) {
            redirect(base_url());
        }
    }

    public function index() {
        $this->load->view('layouts/head');
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');

        $data = array(
            'products'      =>      $this->Product_model->getProductsByCategory()
        );

        $this->load->view('admin/products/index',$data);
        $this->load->view('layouts/footer');
    } 

    public function show($id) {
        
        $data = array(
            'product'      =>      $this->Product_model->getProductById($id)
        );

        $this->load->view('admin/products/show',$data);
    } 

    public function create() {
        $this->load->view('layouts/head');
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');

        $data = array(
            'categories'      =>      $this->Category_model->getCategories()
        );

        $this->load->view('admin/products/new',$data);
        $this->load->view('layouts/footer');
    }

    public function store() {
        $category = $this->input->post("seleCategory");
        $serial = $this->input->post("txtSerial");
        $name = $this->input->post("txtName");
        $excerpt = $this->input->post("txtExcerpt");
        $desc = $this->input->post("txtDesc");
        $price = $this->input->post("txtPrice");
        $stock = $this->input->post("txtStock");
        $picture = $this->input->post("txtPicture");
        $state = $this->input->post("seleState");        

        $this->form_validation->set_rules('txtSerial','Serial','required|is_unique[products.PROD_Serial]');
        $this->form_validation->set_rules('txtName','Name','required|is_unique[products.PROD_Name]');
        $this->form_validation->set_rules('txtPrice','Price','required');
        $this->form_validation->set_rules('txtStock','Stock','required');

        if ($this->form_validation->run()) {
            $data = array(
                'CATE_Code'         =>      $category,
                'PROD_Serial'       =>      $serial,
                'PROD_Name'         =>      $name,
                'PROD_Excerpt'      =>      $excerpt,
                'PROD_Desc'         =>      $desc,
                'PROD_Price'        =>      $price,
                'PROD_Stock'        =>      $stock,
                'PROD_Picture'      =>      $picture,
                'PROD_Flag'         =>      $state
            );
    
            if($this->Product_model->insertProduct($data)) {
                $this->session->set_flashdata('success','Product saved successfully!');
                redirect(base_url() . "maintenance/products/index");
            }else {
                $this->session->set_flashdata('error','Error saving product!');
                redirect(base_url() . "products/new");
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
            'categories'        =>      $this->Category_model->getCategories(),
            'product'           =>      $this->Product_model->getProductById($id)
        );

        $this->load->view('admin/products/edit',$data);
        $this->load->view('layouts/footer');
    }

    public function update() {
        $idproduct = $this->input->post("txtId");
        $category = $this->input->post("seleCategory");
        $serial = $this->input->post("txtSerial");
        $name = $this->input->post("txtName");
        $excerpt = $this->input->post("txtExcerpt");
        $desc = $this->input->post("txtDesc");
        $price = $this->input->post("txtPrice");
        $stock = $this->input->post("txtStock");
        $picture = $this->input->post("txtPicture");
        $state = $this->input->post("seleState");
        
        $currentOBJ = $this->Product_model->getProductById($idproduct);
        if ($serial == $currentOBJ->PROD_Serial) {
            $uniques = '';
        }else {
            $uniques = '|is_unique[products.PROD_Serial';
        }

        
        if ($serial == $currentOBJ->PROD_Name) {
            $uniquen = '';
        }else {
            $uniquen = '|is_unique[products.PROD_Name';
        }

        $this->form_validation->set_rules('txtSerial','Serial','required' . $uniques);
        $this->form_validation->set_rules('txtName','Name','required' . $uniquen);
        $this->form_validation->set_rules('txtPrice','Price','required');
        $this->form_validation->set_rules('txtStock','Stock','required');

        if ($this->form_validation->run()) {
            $data = array(
                'CATE_Code'         =>      $category,
                'PROD_Serial'       =>      $serial,
                'PROD_Name'         =>      $name,
                'PROD_Excerpt'      =>      $excerpt,
                'PROD_Desc'         =>      $desc,
                'PROD_Price'        =>      $price,
                'PROD_Stock'        =>      $stock,
                'PROD_Picture'      =>      $picture,
                'PROD_Flag'         =>      $state
            );
    
            if($this->Product_model->updateProduct($idproduct,$data)) {
                $this->session->set_flashdata('success','Product updated successfully!');
                redirect(base_url() . "maintenance/products/index");
            }else {
                $this->session->set_flashdata('error','Error updating product!');
                redirect(base_url() . "products/edit");
            }
        }else {
            $this->edit($idproduct);
        }        
    }

    public function delete($id) {
        $data = array(            
            'PROD_Flag'         =>      '0'
        );

        $this->Product_model->updateProduct($id,$data);
        echo "maintenance/products/index";
    }

}