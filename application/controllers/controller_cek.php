<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once APPPATH . 'controllers/controller_pengguna.php';

class Controller_cek extends controller_pengguna {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));

        if ($this->check_session_level() != 'admin') {
            redirect(base_url('controller_pengguna/login'));
        }
    }

    public function index() {
        $salah = 0;
        $benar = 0;
        $this->load->model('entity_admin');
        $query = $this->entity_admin->selectFromTempJoinDataUji();
        foreach ($query as $key) {
            if($key->cluster == $key->kelas){
                $benar++;
            }else{
                $salah++;
            }
        }
        echo "salah = ".$salah;
        echo "benar = ".$benar;
        // $queryLabel = $this->entity_admin->getKL(); //selek data yang berlabel
        $lempar['nilai']= $query;
        $this->load->view('admin/coba', $lempar);

    }

//ini akhir methodnya
}
