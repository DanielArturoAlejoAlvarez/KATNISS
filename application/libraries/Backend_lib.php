<?php 

class Backend_lib {
    private $CI;

    function __construct() {
        $this->CI = & get_instance();
    }

    public function control() {
        if (!$this->CI->session->userdata('login')) {
            redirect(base_url());
        }

        $url = $this->CI->uri->segment(1);
        if ($this->CI->uri->segment(2)) {
            $url = $this->CI->uri->segment(1) . "/" . $this->CI->uri->segment(2);
        }

        $infomenu = $this->CI->Backend_model->getID($url);
        $permissions_level = $this->CI->Backend_model->getPermissionsLevel($infomenu->MENU_Code,$this->CI->session->userdata("role_id"));

        if($permissions_level->PERMI_Read == 0) {
            redirect(base_url() . "dashboard");
        }else {
            return $permissions_level;
        }
    }
}