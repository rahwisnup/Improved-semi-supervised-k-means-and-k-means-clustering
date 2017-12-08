<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class entity_tanaman extends CI_Model {

	public function __construct(){
		parent::__construct();
		
	}

	public function add_tanaman($data)
	{
		$query = $this->db->insert('tanaman',$data);

        return $query;
	}
    public function add_info_lahan($data){
        $query = $this->db->insert('info_lahan',$data);

        return $query;
    }
    public function add_tanam($data){
        $query = $this->db->insert('tanam',$data);

        return $query;
    }

    public function update_karakteristik($id, $data){
        $this->db->where('id_karakteristik',$id);
        $query = $this->db->update('karakteristik_lahan',$data);
        return $query;
    }
    public function get_deskripsi_karakteristik($id){
        $query =  $this->db->query("select a.*, b.alamat_lahan from karakteristik_lahan a, lahan b where '$id'=a.id_karakteristik and a.id_lahan=b.id_lahan ");
        return $query->result_array();
     }
    public function add_panen($data){
        $query = $this->db->insert('panen',$data);

        return $query;
    }
    public function add_lahan($data)
    {
        $query = $this->db->insert('lahan',$data);
        return $query;
    }
    public function add_karakteristik_lahan($data)
    {
        $query = $this->db->insert('karakteristik_lahan',$data);
        return $query;
    }
    public function add_provinsi($data)
    {
        $query = $this->db->insert('provinsi',$data);
        return $query;
    }
    public function add_kategori($data)
    {
        $query = $this->db->insert('kategori',$data);
        return $query;
    }
    public function add_karakteristik($data)
    {
        $query = $this->db->insert('karakteristik_lahan',$data);
        return $query;
    }
    public function add_pemilik($data)
    {
        $query = $this->db->insert('pemilik',$data);
        return $query;
    }
    public function add_kabupaten($data)
    {
        $query = $this->db->insert('kabupaten',$data);
        return $query;
    }
    public function add_informasi($data)
    {
        $query = $this->db->insert('info_lahan',$data);
        return $query;
    }



	public function upload_gambar($gambar)
	{
		$query = $this->db->insert('gambar_tanaman',$gambar);
        return $query;
	}

	public function getID($id, $alamat)
    {
    	$query =  $this->db->query("select id from tanaman where id_member='$id' and alamat='$alamat'");
    	return $query->result_array();
    }
     public function get_deskripsi_tanaman($id){
     	$query =  $this->db->query("select * from tanaman where '$id'=id_tanaman");
     	return $query->result_array();
     }
     public function get_deskripsi_panen($id){
        $query =  $this->db->query("select a.*, b.alamat_lahan from panen a, lahan b where a.id_lahan=b.id_lahan");
        return $query->result_array();
     }
     public function get_deskripsi_tanam($id){
        $query =  $this->db->query("select a.*, b.alamat_lahan from tanam a, lahan b where a.id_lahan=b.id_lahan");
        return $query->result_array();
     }
     public function get_deskripsi_lahan($id){
        $query =  $this->db->query("select a.nama_pemilik, b.*, c.nama_kabupaten, d.nama_provinsi from pemilik a, lahan b, kabupaten c, provinsi d where '$id'=b.id_lahan and a.id_pemilik=b.id_pemilik and c.id_kabupaten=b.id_kabupaten and d.id_provinsi=b.id_provinsi");
        return $query->result_array();
     }
     public function get_deskripsi_info_lahan($id){
        $query =  $this->db->query("select a.*, b.alamat_lahan from info_lahan a, lahan b where a.id_lahan=b.id_lahan");
        return $query->result_array();
     }
     public function get_deskripsi_pemilik($id){
        $query =  $this->db->query("select * from pemilik where '$id'=id_pemilik");
        return $query->result_array();
     }
     public function get_deskripsi_kabupaten($id){
        $query =  $this->db->query("select a.*, b.* from kabupaten a, provinsi b where a.id_provinsi=b.id_provinsi");
        return $query->result_array();
     }
     public function get_deskripsi_kategori($id){
        $query =  $this->db->query("select * from kategori where '$id'=id_kategori");
        return $query->result_array();
     }
     public function get_gambar($id)
     {
     	$query =  $this->db->query("select * from gambar_tanaman where id_tanaman = '$id'");
     	return $query->result_array();
     }
     public function hapus_gambar($id)
     {
     	$gambar = $this->get_gambar($id);
     	$del_gambar = $this->db->delete('gambar_tanaman',array('id_tanaman' => $id));
     	if($del_gambar){
     		foreach ($gambar as $result) {
     			unlink("gambar_tanaman/".$result['gambar']);
     		}
     		return true;
     	} else {
     		return false;
     	}
     }
     public function hapus_tanaman($id){
     	$del_tanaman = $this->db->delete('tanaman', array('id_tanaman' => $id));
     }
     public function hapus_karakteristik_lahan($id){
        $del_provinsi = $this->db->delete('karakteristik_lahan', array('id_karakteristik' => $id));
     }
     public function hapus_lahan($id){
        $del_lahan = $this->db->delete('lahan', array('id_lahan' => $id));
     }
     public function hapus_info_lahan($id){
        $del_info_lahan = $this->db->delete('info_lahan', array('id_info_lahan' => $id));
     }
     public function hapus_pemilik($id){
        $del_pemilik = $this->db->delete('pemilik', array('id_pemilik' => $id));
     }
     public function hapus_provinsi($id){
        $del_provinsi = $this->db->delete('provinsi', array('id_provinsi' => $id));
     }
     public function hapus_kabupaten($id){
        $del_kabupaten = $this->db->delete('kabupaten', array('id_kabupaten' => $id));
     }
     public function hapus_kategori($id){
        $del_provinsi = $this->db->delete('kategori', array('id_kategori' => $id));
     }
     public function hapus_panen($id){
        $del_panen = $this->db->delete('panen', array('id_panen' => $id));
     }
     public function hapus_tanam($id){
        $del_panen = $this->db->delete('tanam', array('id_tanam' => $id));
     }

    public function update($id, $data){
     	$this->db->where('id_tanaman',$id);
        $query = $this->db->update('tanaman',$data);
        return $query;
    }

    public function update_lahan($id, $data){
        $this->db->where('id_lahan',$id);
        $query = $this->db->update('lahan',$data);
        return $query;
    }
    public function update_info_lahan($id, $data){
        $this->db->where('id_info_lahan',$id);
        $query = $this->db->update('info_lahan',$data);
        return $query;
    }
    public function update_pemilik($id, $data){
        $this->db->where('id_pemilik',$id);
        $query = $this->db->update('pemilik',$data);
        return $query;
    }
    public function update_kabupaten($id, $data){
        $this->db->where('id_kabupaten',$id);
        $query = $this->db->update('kabupaten',$data);
        return $query;
    }
    public function update_kategori($id, $data){
        $this->db->where('id_kategori',$id);
        $query = $this->db->update('kategori',$data);
        return $query;
    }
    public function update_panen($id, $data){
        $this->db->where('id_panen',$id);
        $query = $this->db->update('panen',$data);
        return $query;
    }
    public function update_tanam($id, $data){
        $this->db->where('id_tanam',$id);
        $query = $this->db->update('tanam',$data);
        return $query;
    }
     public function list_admin(){
        $query =  $this->db->query("select a.*, b.*, c.username, d.id_tanaman from member a, tanaman b, user c, gambalahanan d where a.id_user = b.id_member and a.id_user=c.id and b.id=d.id_tanaman group by d.id_tanaman order by d.id_tanaman desc");
        return $query->result_array();
     }

     public function list_tanaman_semua(){
        $query =  $this->db->query("select * from tanaman a, gambar_tanaman b where a.id = b.id_tanaman group by a.id order by a.id desc");
        return $query->result_array();
     }

    public function list_tanaman(){
        $query =  $this->db->query("select a.*,b.* from tanaman a, kategori b where a.id_kategori=b.id_kategori");
        return $query->result_array();
     }
     public function list_kategori(){
        $query =  $this->db->query("select * from kategori");
        return $query->result_array();
     }
     public function list_lahan(){
        $query =  $this->db->query("select a.nama_pemilik, b.*, c.nama_kabupaten, d.nama_provinsi, e.nama_tanaman from pemilik a, lahan b, kabupaten c, provinsi d, tanaman e where a.id_pemilik=b.id_pemilik and c.id_kabupaten=b.id_kabupaten and d.id_provinsi=b.id_provinsi and b.id_tanaman=e.id_tanaman");
        return $query->result_array();
     }
     public function list_karakteristik_lahan(){
        $query =  $this->db->query("select a.*, b.* from karakteristik_lahan a, lahan b where a.id_lahan=b.id_lahan");
        return $query->result_array();
     }
     public function list_reportLokasiBali(){
        $query =  $this->db->query("select a.nama_kabupaten, b.luas, c.nama_tanaman, d.*, e.* from kabupaten a, lahan b, tanaman c, provinsi d, tanam e where a.id_kabupaten=b.id_kabupaten and b.id_tanaman=c.id_tanaman and d.id_provinsi=a.id_provinsi and e.id_lahan=b.id_lahan and d.nama_provinsi='Bali'");
        return $query->result_array();
     }
     public function list_reportLokasiJatim(){
        $query =  $this->db->query("select a.nama_kabupaten, b.luas, c.nama_tanaman, d.*, e.* from kabupaten a, lahan b, tanaman c, provinsi d, tanam e where a.id_kabupaten=b.id_kabupaten and b.id_tanaman=c.id_tanaman and d.id_provinsi=a.id_provinsi and e.id_lahan=b.id_lahan and d.nama_provinsi='Jawa Timur'");
        return $query->result_array();
     }
     public function list_reportLokasiJateng(){
        $query =  $this->db->query("select a.nama_kabupaten, b.luas, c.nama_tanaman, d.*, e.* from kabupaten a, lahan b, tanaman c, provinsi d, tanam e where a.id_kabupaten=b.id_kabupaten and b.id_tanaman=c.id_tanaman and d.id_provinsi=a.id_provinsi and e.id_lahan=b.id_lahan and d.nama_provinsi='Jawa Tengah'");
        return $query->result_array();
     }
     public function list_reportLokasiJabar(){
        $query =  $this->db->query("select a.nama_kabupaten, b.luas, c.nama_tanaman, d.*, e.* from kabupaten a, lahan b, tanaman c, provinsi d, tanam e where a.id_kabupaten=b.id_kabupaten and b.id_tanaman=c.id_tanaman and d.id_provinsi=a.id_provinsi and e.id_lahan=b.id_lahan and d.nama_provinsi='Jawa Barat'");
        return $query->result_array();
     }
     public function list_reportLokasiSulteng(){
        $query =  $this->db->query("select a.nama_kabupaten, b.luas, c.nama_tanaman, d.*, e.* from kabupaten a, lahan b, tanaman c, provinsi d, tanam e where a.id_kabupaten=b.id_kabupaten and b.id_tanaman=c.id_tanaman and d.id_provinsi=a.id_provinsi and e.id_lahan=b.id_lahan and d.nama_provinsi='Sulawesi Tenggara'");
        return $query->result_array();
     }

     public function list_reportKategoriNilam(){
        $query =  $this->db->query("select a.*, b.nama_tanaman, c.luas, d.* from tanam a, tanaman b, lahan c, kategori d where a.id_lahan=c.id_lahan and b.id_kategori=d.id_kategori and c.id_tanaman=b.id_tanaman and d.nama_kategori='Nilam'");
        return $query->result_array();
     }
     public function list_reportKategoriSerehWangi(){
        $query =  $this->db->query("select a.*, b.nama_tanaman, c.luas, d.* from tanam a, tanaman b, lahan c, kategori d where a.id_lahan=c.id_lahan and b.id_kategori=d.id_kategori and c.id_tanaman=b.id_tanaman and d.nama_kategori='Sereh Wangi'");
        return $query->result_array();
     }
     public function list_reportKategoriSidikalang(){
        $query =  $this->db->query("select a.*, b.nama_tanaman, c.luas, d.* from tanam a, tanaman b, lahan c, kategori d where a.id_lahan=c.id_lahan and b.id_kategori=d.id_kategori and c.id_tanaman=b.id_tanaman and d.nama_kategori='Sidikalang'");
        return $query->result_array();
     }

     public function list_reportPemilik(){
        $query =  $this->db->query("select a.*, b.*, d.jenis_tanah from lahan a, pemilik b, karakteristik_lahan d where a.id_pemilik=b.id_pemilik and d.id_lahan=a.id_lahan");
        return $query->result_array();
     }

     public function list_lahanBalinya(){
        $query =  $this->db->query("select a.nama_pemilik, b.*, c.nama_kabupaten, d.nama_provinsi, e.nama_tanaman from pemilik a, lahan b, kabupaten c, provinsi d, tanaman e where a.id_pemilik=b.id_pemilik and c.id_kabupaten=b.id_kabupaten and d.id_provinsi=b.id_provinsi and b.id_tanaman=e.id_tanaman and d.nama_provinsi='Bali'");
        return $query->result_array();
     }
     public function list_lahanJatimnya(){
        $query =  $this->db->query("select a.nama_pemilik, b.*, c.nama_kabupaten, d.nama_provinsi, e.nama_tanaman from pemilik a, lahan b, kabupaten c, provinsi d, tanaman e where a.id_pemilik=b.id_pemilik and c.id_kabupaten=b.id_kabupaten and d.id_provinsi=b.id_provinsi and b.id_tanaman=e.id_tanaman and d.nama_provinsi='Jawa Timur'");
        return $query->result_array();
     }

     public function list_lahanJatengnya(){
        $query =  $this->db->query("select a.nama_pemilik, b.*, c.nama_kabupaten, d.nama_provinsi, e.nama_tanaman from pemilik a, lahan b, kabupaten c, provinsi d, tanaman e where a.id_pemilik=b.id_pemilik and c.id_kabupaten=b.id_kabupaten and d.id_provinsi=b.id_provinsi and b.id_tanaman=e.id_tanaman and d.nama_provinsi='Jawa Tengah'");
        return $query->result_array();
     }

     public function list_lahanJabarnya(){
        $query =  $this->db->query("select a.nama_pemilik, b.*, c.nama_kabupaten, d.nama_provinsi, e.nama_tanaman from pemilik a, lahan b, kabupaten c, provinsi d, tanaman e where a.id_pemilik=b.id_pemilik and c.id_kabupaten=b.id_kabupaten and d.id_provinsi=b.id_provinsi and b.id_tanaman=e.id_tanaman and d.nama_provinsi='Jawa Barat'");
        return $query->result_array();
     }

     public function list_info_lahan(){
        $query =  $this->db->query("select a.*, b.alamat_lahan from info_lahan a, lahan b where a.id_lahan=b.id_lahan");
        return $query->result_array();
     }

     public function list_pemilik(){
        $query =  $this->db->query("select * from pemilik");
        return $query->result_array();
     }

     public function list_provinsi(){
        $query =  $this->db->query("select * from provinsi");
        return $query->result_array();
     }
     public function list_kabupaten(){
        $query =  $this->db->query("select a.*, b.nama_provinsi from kabupaten a, provinsi b where a.id_provinsi=b.id_provinsi");
        return $query->result_array();
     }
     public function list_panen(){
        $query =  $this->db->query("select a.*, b.alamat_lahan from panen a, lahan b where a.id_lahan=b.id_lahan");
        return $query->result_array();
     }
     public function list_tanam(){
        $query =  $this->db->query("select a.*, b.alamat_lahan from tanam a, lahan b where a.id_lahan=b.id_lahan");
        return $query->result_array();
     }
     
}
