<?php 

class Auth extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index() {
        if ($this->session->userdata("login")) {
            redirect(base_url()."dashboard");
        }else {
            $this->load->view('admin/login');
        }
    }

    public function login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->User_model->login($username,sha1($password));

        if (!$user) {
            $this->session->set_flashdata("error","Username and / or password are incorrect");
            redirect(base_url());
        }else {
            $data = array(
                'id'        =>      $user->USER_Code,
                'fullname'  =>      $user->USER_Fullname,
                'role_id'   =>      $user->ROLE_Code,
                'avatar'    =>      $user->USER_Avatar,
                'login'     =>      TRUE
            );

            $this->session->set_userdata($data);
            redirect(base_url()."dashboard");
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}