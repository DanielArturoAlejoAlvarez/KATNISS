<?php 

class Permissions extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model("Menu_model");
        $this->load->model("Role_model");
        $this->load->model("Permission_model");
        if (!$this->session->userdata("login")) {
            redirect(base_url());
        }
    }

    public function index() {
        $this->load->view('layouts/head');
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');

        $data = array(
            'permissions'    =>      $this->Permission_model->getPermissions()
        );

        $this->load->view('admin/permissions/index', $data);
        $this->load->view('layouts/footer');
    }

    public function create() {
        $this->load->view('layouts/head');
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');

        $data = array(
            'roles'    =>      $this->Role_model->getRoles(),
            'menus'    =>      $this->Menu_model->getMenus()
        );

        $this->load->view('admin/permissions/new', $data);
        $this->load->view('layouts/footer');
    }

    public function store() {
        $menu = $this->input->post("seleMenu");
        $role = $this->input->post("seleRole");
        $create = $this->input->post("radioCreate");
        $read = $this->input->post("radioRead");
        $update = $this->input->post("radioUpdate");
        $delete = $this->input->post("radioDelete");
        $state = $this->input->post("seleState");


        $data = array(
            'MENU_Code'         =>          $menu,
            'ROLE_Code'         =>          $role,
            'PERMI_Create'      =>          $create,
            'PERMI_Read'        =>          $read,
            'PERMI_Update'      =>          $update,
            'PERMI_Delete'      =>          $delete,
            'PERMI_Flag'        =>          $state
        );

        if($this->Permission_model->insertPermission($data)) {
            redirect(base_url() . "administration/permissions/index");
        }else {
            $this->create();
        }
    }

    public function edit($id) {
        $this->load->view('layouts/head');
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');

        $data = array(
            'roles'         =>      $this->Role_model->getRoles(),
            'menus'         =>      $this->Menu_model->getMenus(),
            'permission'    =>      $this->Permission_model->getPermissionById($id)
        );

        $this->load->view('admin/permissions/edit', $data);
        $this->load->view('layouts/footer');
    }

    public function update() {
        $idpermission = $this->input->post("txtId");
        $menu = $this->input->post("seleMenu");
        $role = $this->input->post("seleRole");
        $create = $this->input->post("radioCreate");
        $read = $this->input->post("radioRead");
        $update = $this->input->post("radioUpdate");
        $delete = $this->input->post("radioDelete");
        $state = $this->input->post("seleState");

        $data = array(
            'MENU_Code'         =>          $menu,
            'ROLE_Code'         =>          $role,
            'PERMI_Create'      =>          $create,
            'PERMI_Read'        =>          $read,
            'PERMI_Update'      =>          $update,
            'PERMI_Delete'      =>          $delete,
            'PERMI_Flag'        =>          $state
        );

        if($this->Permission_model->updatePermission($idpermission,$data)) {
            redirect(base_url() . "administration/permissions/index");
        }else {
            $this->edit($idpermission);
        }
    }

    public function delete($id) {
        $data = array(
            'PERMI_Flag'    =>      '0'
        );

        $this->Permission_model->updatePermission($id,$data);
        echo "administration/permissions/index";
    }
}