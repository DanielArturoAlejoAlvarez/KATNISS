<?php 

class Users extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata("login")) {
            redirect(base_url());
        }
        $this->load->model("User_model");
        $this->load->model("Role_model");
    }

    public function index() {
        $this->load->view('layouts/head');
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');        

        $data = array(
            'users'             =>      $this->User_model->getUsers()
        );

        $this->load->view('admin/users/index', $data);
        $this->load->view('layouts/footer');
    }

    public function show() {
        
        $iduser = $this->input->post('iduser');

        $data = array(
            'user'    =>      $this->User_model->getUserById($iduser)
        );

        $this->load->view('admin/users/show', $data);
    }

    public function create() {
        $this->load->view('layouts/head');
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');

        $data = array(
            'roles'    =>      $this->Role_model->getRoles()
        );

        $this->load->view('admin/users/new', $data);
        $this->load->view('layouts/footer');
    }

    public function store() {
        $role = $this->input->post("seleRole");
        $fullname = $this->input->post("txtFullname");
        $email = $this->input->post("txtEmail");
        $username = $this->input->post("txtUsername");
        $password = $this->input->post("txtPassword");
        $avatar = $this->input->post("txtAvatar");
        $state = $this->input->post("seleState");
        
        $this->form_validation->set_rules('txtFullname','required');
        $this->form_validation->set_rules('txtEmail','required|is_unique[users.USER_Email');
        $this->form_validation->set_rules('txtUsername','required|is_unique[users.USER_Username');
        $this->form_validation->set_rules('txtPassword','required');

        if($this->form_validation->run()) {
            $data = array(
                'ROLE_Code'         =>      $role,
                'USER_Fullname'     =>      $fullname,
                'USER_Email'        =>      $email,
                'USER_Username'     =>      $username,
                'USER_Password'     =>      sha1($password),
                'USER_Avatar'       =>      $avatar,
                'USER_Flag'         =>      $state
            );

            if($this->User_model->insertUser($data)) {
                $this->session->set_flashdata('success','User saved successfully!');                
                redirect(base_url() . "administration/users/index");
            }else {
                $this->session->set_flashdata('error','Error saving user!');
                $this->create();
            }
        }
    }

    public function edit($id) {
        $this->load->view('layouts/head');
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');

        $data = array(
            'roles'     =>      $this->Role_model->getRoles(),
            'user'      =>      $this->User_model->getUserById($id)
        );

        $this->load->view('admin/users/edit', $data);
        $this->load->view('layouts/footer');
    }

    public function update() {
        $iduser = $this->input->post("txtId");
        $role = $this->input->post("seleRole");
        $fullname = $this->input->post("txtFullname");
        $email = $this->input->post("txtEmail");
        $username = $this->input->post("txtUsername");
        $password = $this->input->post("txtPassword");
        $avatar = $this->input->post("txtAvatar");
        $state = $this->input->post("seleState");

        $currentUser = $this->User_model->getUserById($iduser);
        if($email == $currentUser->USER_Email) {
            $unique1 = "|is_unique[users.USER_Email";
        }else {
            $unique1 = "";
        }

        if($username == $currentUser->USER_Username) {
            $unique2 = "|is_unique[users.USER_Username";
        }else {
            $unique2 = "";
        }
        
        $this->form_validation->set_rules('txtFullname','required');
        $this->form_validation->set_rules('txtEmail','required' . $unique1);
        $this->form_validation->set_rules('txtUsername','required' . $unique2);
        $this->form_validation->set_rules('txtPassword','required');

        if($this->form_validation->run()) {
            $data = array(
                'ROLE_Code'         =>      $role,
                'USER_Fullname'     =>      $fullname,
                'USER_Email'        =>      $email,
                'USER_Username'     =>      $username,
                'USER_Password'     =>      sha1($password),
                'USER_Avatar'       =>      $avatar,
                'USER_Flag'         =>      $state
            );

            if($this->User_model->updateUser($iduser,$data)) {
                $this->session->set_flashdata('success','User updated successfully!');                
                redirect(base_url() . "administration/users/index");
            }else {
                $this->session->set_flashdata('error','Error updating user!');
                $this->edit($iduser);
            }
        }
    }

    public function delete($id) {
        $data = array(
            'USER_Flag'     =>      '0'
        );

        $this->User_model->updateUser($id,$data);
        echo "administration/users/index";
    }

    
}