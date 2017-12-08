<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'controllers/controller_pengguna.php';

class Controller_admin extends controller_pengguna {

	function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('form','url'));
        
        if($this->check_session_level()!='admin')
        {
            redirect(base_url('controller_pengguna/login'));
        }

    }
	
	public function index(){
        $this->load->model('entity_admin');
        $data['training']=$this->entity_admin->getAllDataTraining();
        $this->load->view('admin/utama',$data);
	}
    public function hapus_data_training(){
        $this->load->model('entity_admin');
        $this->entity_admin->delete_datatraining();
        redirect(base_url() . "controller_admin");
    }
    public function hapus_data_proses(){
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
        $this->entity_admin->delete_cluster();
        $this->entity_admin->delete_jk();
        $this->entity_admin->delete_tempkluster();
        $this->entity_admin->delete_klusterawal();
        $this->entity_admin->delete_tempawal();

        redirect(base_url() . "controller_admin");
    }
    public function kmeans_tradisional(){
        // $this->get_halaman_utama();
        $this->load->model('entity_admin');
        $data['training']=$this->entity_admin->getAllDataTraining();
        $this->load->view('admin/kmeansTradisional',$data);

        $jumlahCluster = $this->input->post('jmlCluster');
    }

    public function semi_Kmeans(){
        $this->load->model('entity_admin');
        $data['training']=$this->entity_admin->getAllDataTraining();

        $this->load->view('admin/semiKmeans',$data);
        // $this->load->view('admin/semiKmeans1coba',$data);

    }
}