<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class entity_member extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	function insert_user($data){
        $query = $this->db->insert('member',$data);
        return $query;
    }
    public function get_profil_member($username='')
    {
    	$query =  $this->db->query("select a.*, b.* from user a, member b where a.id = b.id_user and a.username='$username'");
    	return $query->result_array();
    }

    public function get_id_provinsi($username=''){
        
    }
    function update_member($id,$data){
        $this->db->where('id_user',$id);
        $query = $this->db->update('member',$data);
        return $query;
    }


}

/* End of file  */
/* Location: ./application/models/ */