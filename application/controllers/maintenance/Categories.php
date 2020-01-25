<?php

class Categories extends  CI_Controller
{

    private $permissions_level;
    function __construct()
    {
        parent::__construct();
        $this->permissions_level = $this->backend_lib->control();
        $this->load->model('Category_model');
        /*if (!$this->session->userdata('login')) {
            redirect(base_url());
        }*/
    }

    public function index()
    {
        $this->load->view('layouts/head');
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');

        $data = array(
            'permissions'   =>      $this->permissions_level,
            'categories'    =>      $this->Category_model->getCategories()
        );

        $this->load->view('admin/categories/index', $data);
        $this->load->view('layouts/footer');
    }

    public function show($id)
    {       

        $data = array(
            'category'    =>      $this->Category_model->getCategoryById($id)
        );

        $this->load->view('admin/categories/show',$data);
        
    }

    public function create()
    {
        $this->load->view('layouts/head');
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('admin/categories/new');
        $this->load->view('layouts/footer');
    }

    public function store() {
        $name = $this->input->post("txtName");
        $desc = $this->input->post("txtDesc");
        $state = $this->input->post("seleState");

        $this->form_validation->set_rules('txtName','Name','required|is_unique[categories.CATE_Name]');

        if ($this->form_validation->run()) {
            $data = array(
                'CATE_Name'     =>      $name,
                'CATE_Desc'     =>      $desc,
                'CATE_Flag'     =>      $state
            );
    
            if ($this->Category_model->insertCategory($data)) {
                $this->session->set_flashdata('success','Category saved successfully!');
                redirect(base_url()."maintenance/categories/index");
            }else {
                $this->session->set_flashdata('error','Error saving category!');
                redirect(base_url()."categories/create");
            }
        }else {
            $this->create();
        }
        
    }

    public function edit($id)
    {
        $this->load->view('layouts/head');
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');

        $data = array(
            'category'    =>      $this->Category_model->getCategoryById($id)
        );

        $this->load->view('admin/categories/edit',$data);


        $this->load->view('layouts/footer');
    }

    public function update() {
        $idcategory = $this->input->post("txtId");
        $name = $this->input->post("txtName");
        $desc = $this->input->post("txtDesc");
        $state = $this->input->post("seleState");

        //validate unique
        $currentCat = $this->Category_model->getCategoryById($idcategory);
        //echo $currentCat->CATE_Name;
        if ($name == $currentCat->CATE_Name) {
            $unique = '';
        }else {
            $unique = '|is_unique[categories.CATE_Name]';
        }

        $this->form_validation->set_rules('txtName','Name','required' . $unique);

        if ($this->form_validation->run()) {
            $data = array(
                'CATE_Name'     =>      $name,
                'CATE_Desc'     =>      $desc,
                'CATE_Flag'     =>      $state
            );
    
            if ($this->Category_model->updateCategory($idcategory,$data)) {
                $this->session->set_flashdata('success','Category updated successfully!');
                redirect(base_url()."maintenance/categories/index");
            }else {
                $this->session->set_flashdata('error','Error updating category!');                
                redirect(base_url().'categories/edit/'.$idcategory);
            }
        }else {
            $this->edit($idcategory);
        }        
    }

    public function delete($id) {
        //$this->Category_model->deleteCategory($id);
        //redirect(base_url()."categories/index");
        $data = array(
            'CATE_Flag'     =>      '0'
        );

        $this->Category_model->updateCategory($id,$data);
        echo 'maintenance/categories/index';
    }

}
