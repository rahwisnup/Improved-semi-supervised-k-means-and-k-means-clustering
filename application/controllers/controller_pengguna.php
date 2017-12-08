<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class controller_pengguna extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');   
        $this->load->helper(array('form'));
        $this->load->model('entity_pengguna');
        $this->load->model('entity_member');
        $this->load->model('entity_admin');
        $this->load->helper('date');
        $this->load->helper(array('form','url'));
    }

    public function index(){
        $this->login();
    }

    public function tampil_status_info($type, $pesan){
         $this->session->set_flashdata($type, $pesan);
    }


    public function register() {
            $data['tombol'] = $this->session->userdata('login');
            $this->load->view('form_register',$data);

            if($_POST){
            $date = date("Y-m-d H:i:s");
            $nama_foto =  date("Ymd-His");
            echo $date;
            $pass = $this->input->post('password');
            $repass = $this->input->post('repassword');
            $usern = $this->input->post('username');
            $dir_to_save = "foto_user/";
            if (!is_dir($dir_to_save)) {
              mkdir($dir_to_save);
            }

            $config['upload_path'] = $dir_to_save;
            $config['allowed_types'] = 'gif|jpg|png';
            $this->load->library('upload', $config);
            $path=$config['upload_path'].$nama_foto."-".$_FILES['foto']['name'];
            copy($_FILES['foto']['tmp_name'],$path);
            $pathfile = $nama_foto."-".$_FILES['foto']['name'];

            $dataUser = array(  
                            'username' => $this->input->post('username'),
                            'password' => do_hash($this->input->post('password')),
                            'level'     => 'admin',
                            'status'   => 'aktive'
                            );
            $datamember = $arrayName = array(
                            'nama'     => $this->input->post('nama'),
                            'email'    => $this->input->post('email'),
                            'alamat' => $this->input->post('alamat'),
                            'no_telp' => strval($this->input->post('nohp')),
                            'tanggal_daftar' => $date,
                            'foto_member' => $pathfile
                            );

            if($pass == $repass){
                    $this->entity_pengguna->insert_user($dataUser);
                    $id_user= $this->entity_pengguna->getID($usern);
                    //print_r($id_user[0]->id);
                    $datamember['id_user'] = $id_user[0]->id;
                    $query = $this->entity_member->insert_user($datamember);
                    $this->tampil_status_info('success', 'registration success!');
                    redirect(base_url()."controller_pengguna/register");
                }
                if($pass != $repass){
                    $this->tampil_status_info('success', 'verifikasi password anda tidak sesuai!');
                    redirect(base_url()."controller_pengguna/register");
                }
            }
        }

    public function login(){
        $data = array(
            'tombol' => $this->session->userdata('login')
         );
        print_r($this->session->userdata('login'));
        
        $this->load->view('form_login',$data);

    	if($_POST){
            $date = date("Y-m-d H:i:s");
            $datamember = array('login_terakhir' => $date);
            $username = addslashes($_POST['username']);
            $password = addslashes(do_hash($_POST['password'])); 
            $id_user= $this->entity_pengguna->getID($username);
            $id = $id_user[0]->id;
            $Validasi_user = $this->entity_pengguna->Validasi_user($username, $password);

            if($Validasi_user){
                $user = $this->session->userdata['login']['level'];
                if($user=='admin'){

                    redirect(base_url()."controller_admin/");
                 }
                elseif ($user == 'member'){
                   $this->entity_member->update_member($id, $datamember);
                   redirect(base_url()."controller_member");
                    //redirect('controller_member');
                    //echo "masuk";
                 }
                else{
                echo "gagal";
                }
             } 
             else{
                $this->tampil_status_info('success', 'maaf login gagal mohon masukan data dengan benar!');
                redirect(base_url()."controller_pengguna/login");
             }            
        }    
    }

    function check_session(){
        if($this->session->userdata('login')){
            return true;
        } 
        else{
            redirect(base_url()."controller_pengguna/login");
        }
    }

    public function logout(){
    	$this->session->sess_destroy();
        // session_start();
        // session_destroy();
        redirect(base_url()."/");
    }
    public function get_list_utama(){
    	$tanaman = new controller_tanaman();
        $result = $tanaman->get_list();
        $data = array(  
                            'tombol'    => $this->session->userdata('login'),
                            'data_tanaman' => $result,
                            'perulangan' => count($result)
                            );
        //untuk petanya
        $data['view'] = $this->entity_pengguna->get(); 
          
        

        $this->load->view('index', $data);
    }

    function check_session_level(){
        return $this->session->userdata['login']['level'];
       
    }
}
        