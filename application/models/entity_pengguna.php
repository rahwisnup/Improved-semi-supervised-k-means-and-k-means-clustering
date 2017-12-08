<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class entity_pengguna extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
    public  function get()  
    {  
        $this->db->select('*');
        $this->db->from('lahan a');
        $this->db->join('pemilik b','a.id_pemilik = b.id_pemilik');
        $this->db->join('tanaman c', 'a.id_tanaman = c.id_tanaman');
        $query = $this->db->get();
        if ($query->num_rows() > 0)
         {
             return $query->result(); // just return $query
        }

    }  
	function insert_user($data)
	{
        $query = $this->db->insert('user',$data);
        return $query;
    }
    public function getID($username)
    {
    	$this->db->select('id');
        $this->db->from('user');
        $this->db->where('username',$username);
        $query = $this->db->get();
        if ($query->num_rows() > 0)
   		 {
    		 return $query->result(); // just return $query
    	}
    }

    public function validasi_user($username, $password){
        // // grab user input
        $query =  $this->db->query("select a.*, b.nama from user a, member b where a.id = b.id_user and a.username='$username' and a.password='$password' and a.status='aktive';");
        // Let's check if there are any results
        if($query->num_rows == 1)
        {
            // If there is a user, then create session data
            $row = $query->row();
            $data = array(
                    'id' => $row->id,
                    'username' => $row->username,
                    'nama' => $row->nama,
                    'level' => $row->level,
                    'validated' => true
                    );
            $this->session->set_userdata('login',$data);
            return true;
        }
        // If the previous process did not validate
        // then return false.
        return false;
    }

    function cek_username($username)
    {
        $hasil = $this->db->query("select * from tbl_user where username = '$username' ")->num_rows();
        return $hasil;
    }

    function cek_email($email)
    {
        $hasil = $this->db->query("select * from member where email = '$email' ")->num_rows();
        return $hasil;
    }
    function update_user($id,$data){
        $this->db->where('id',$id);
        $query = $this->db->update('user',$data);
        return $query;
    }
}

/* End of file entity_pengguna.php */
/* Location: ./application/models/entity_pengguna.php */