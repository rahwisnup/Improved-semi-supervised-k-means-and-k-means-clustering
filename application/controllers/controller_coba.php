<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once APPPATH . 'controllers/controller_pengguna.php';

class Controller_coba extends controller_pengguna {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));

        if ($this->check_session_level() != 'admin') {
            redirect(base_url('controller_pengguna/login'));
        }
    }

    public function index() {
        
        for ($i=1; $i<=4; $i++) {
            echo "i,";
            $x=0 ; 
            while ($x <= 10) {
                echo "X,";
                $x++;
            }
        }
        
    }

    public function hapusData() {
        $this->load->model('entity_admin');
        $this->entity_admin->delete_datak1();
        $this->entity_admin->delete_datak2();
        $this->entity_admin->delete_datak3();
        $this->entity_admin->delete_datak4();
        $this->entity_admin->delete_initialcluster();
        $this->entity_admin->delete_jarak();
        $this->entity_admin->delete_temp();
        $this->entity_admin->delete_tempnextinitial();
        $this->entity_admin->delete_nextcluster();
        $this->entity_admin->delete_kluster();

        redirect(base_url() . "controller_admin/semi_kmeans");
    }

//ini akhir methodnya
}
