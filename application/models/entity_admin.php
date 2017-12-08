<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class entity_admin extends CI_Model {

    
    
    public function getKL(){
        $this->db->select('*');
        $this->db->from('datatraining');
        $this->db->where('datatraining.kelas !=','unlabeled');
        $this->db->order_by('kelas');

        $result = $this->db-> get();
        return $result ->result();
    }
    public function getInitialCenter(){
        $this->db->select('*');
        $this->db->from('initialcluster');
        $this->db->order_by('kelas');
        $result = $this->db-> get();
        return $result ->result();
    }
    public function getK1(){
        $this->db->select('*');
        $this->db->from('datatraining');
        $this->db->where('datatraining.Kelas','1');
        $result = $this->db-> get();
        return $result ->result();
    }
    public function getK2(){
        $this->db->select('*');
        $this->db->from('datatraining');
        $this->db->where('datatraining.Kelas','2');
        $result = $this->db-> get();
        return $result ->result();
    }
    public function getK3(){
        $this->db->select('*');
        $this->db->from('datatraining');
        $this->db->where('datatraining.Kelas','3');
        $result = $this->db-> get();
        return $result ->result();
    }
    public function getK4(){
        $this->db->select('*');
        $this->db->from('datatraining');
        $this->db->where('datatraining.Kelas','4');
        $result = $this->db-> get();
        return $result ->result();
    }

    public function getInitialC1($klaster1){
        $this->db->select('*');
        $this->db->from('dataK1');
        $this->db->where('dataK1.No',$klaster1);
        $result = $this->db-> get();
        return $result ->result();
    }
    public function getInitialC2($klaster2){
        $this->db->select('*');
        $this->db->from('dataK2');
        $this->db->where('dataK2.No',$klaster2);
        $result = $this->db-> get();
        return $result ->result();
    }
    public function getInitialC3($klaster3){
        $this->db->select('*');
        $this->db->from('dataK3');
        $this->db->where('dataK3.No',$klaster3);
        $result = $this->db-> get();
        return $result ->result();
    }
    public function getInitialC4($klaster4){
        $this->db->select('*');
        $this->db->from('dataK4');
        $this->db->where('dataK4.No',$klaster4);
        $result = $this->db-> get();
        return $result ->result();
    }
    public function getAllDataTraining(){
        $this->db->select('*');
        $this->db->from('datatraining');
        $result = $this->db-> get();
        return $result ->result();
    }
    public function getJarak(){
        $this->db->select('*');
        $this->db->from('jarak');
        $result = $this->db-> get();
        return $result ->result();
    }
    public function getNextInitialClusterCenter(){
        $this->db->select('*');
        $this->db->from('nextcluster');
        $result = $this->db-> get();
        return $result ->result();
    }
    public function countDataK1(){
        return $this->db->query("select No from dataK1")->num_rows();
    }
    public function countDataK2(){
        return $this->db->query("select No from dataK2")->num_rows();
    }
    public function countDataK3(){
        return $this->db->query("select No from dataK3")->num_rows();
    }
    public function countDataK4(){
        return $this->db->query("select No from dataK4")->num_rows();
    }
    public function countNextC1(){
        return $this->db->query("select data from tempnextinitial where tempnextinitial.cluster='1'")->num_rows();
    }
    public function countDataC1(){
        return $this->db->query("select * from temp where temp.cluster='1'")->num_rows();
    }
    public function countInitialCluster(){
        return $this->db->query("select No from initialcluster")->num_rows();
    }
    public function countDataTraining(){
        return $this->db->query("select No from datatraining")->num_rows();
    }
    public function countDataTrainingLabel(){
        return $this->db->query("select No from datatraining where datatraining.kelas != 'unlabeled'")->num_rows();
    }
    public function countDataTrainingNonLabel(){
        return $this->db->query("select No from datatraining where datatraining.kelas = 'unlabeled'")->num_rows();
    }

    public function getAllDataCluster(){
        $this->db->select('*');
        $this->db->from('cluster');
        $this->db->join('datatraining','datatraining.no = cluster.pusat' );
        $result = $this->db-> get();
        return $result ->result();
    }

    public function masukcluster($data){
        $this->db->insert('cluster',$data);
    }

    public function getData($i){
        $this->db->select('*');
        $this->db->from('datatraining');
        $this->db->where('datatraining.No',$i);
        $result = $this->db-> get();
        return $result ->result();
    }

    public function get_cluster(){
        $this->db->select('*');
        $this->db->from('cluster');
        $result = $this->db->get();
        return $result->result();
    }
    public function getCluster(){
        $this->db->select('*');
        $this->db->from('cluster');
        $result = $this->db->get();
        return $result->result();
    }

    public function get_data_cluster($indeks){
        $this->db->select('*');
        $this->db->from('cluster');
        $this->db->join('datatraining','datatraining.no = cluster.pusat');
        $this->db->where('datatraining.no',$indeks);
        $query = $this->db->get();
        return $query -> result();
    }
    public function getDataCluster($indeks){
        $this->db->select('*');
        $this->db->from('initialcluster');
        $this->db->where('initialcluster.Kelas',$indeks);    

        $query = $this->db->get();
        return $query -> result();
    }
    public function getDataClusternya($indeks){
        $this->db->select('*');
        $this->db->from('cluster');
        $this->db->join('datatraining','datatraining.no = cluster.pusat');
        $this->db->where('datatraining.no',$indeks);    

        $query = $this->db->get();
        return $query -> result();
    }

    public function insertTojarak($indeks){
        $this->db->insert('jarak',$indeks);
    }
    public function insertToJK($indeks){
        $this->db->insert('jk',$indeks);
    }
    public function insertToK1($indeks){
        $this->db->insert('dataK1',$indeks);
    }
    public function insertToK2($indeks){
        $this->db->insert('dataK2',$indeks);
    }
    public function insertToK3($indeks){
        $this->db->insert('dataK3',$indeks);
    }
    public function insertToK4($indeks){
        $this->db->insert('dataK4',$indeks);
    }
    public function insertToC($indeks){
        $this->db->insert('initialcluster',$indeks);
    }

    public function selectAllFromJarak(){
        $this->db->select('*');
        $this->db->from('jarak');
        $query = $this->db->get();
        return $query -> result();
    }
    public function selectAllFromKluster(){
        $this->db->select('*');
        $this->db->from('kluster');
        $query = $this->db->get();
        return $query -> result();
    }
    public function selectAllFromKlusterAwal(){
        $this->db->select('*');
        $this->db->from('klusterawal');
        $query = $this->db->get();
        return $query -> result();
    }
    public function delete_datak1(){
        return $this->db->query("delete from datak1");
    }
    public function delete_jk(){
        return $this->db->query("delete from jk");
    }
    public function delete_datak2(){
        return $this->db->query("delete from datak2");
    }
    public function delete_datak3(){
        return $this->db->query("delete from datak3");
    }
    public function delete_datak4(){
        return $this->db->query("delete from datak4");
    }
    public function delete_initialcluster(){
        return $this->db->query("delete from initialcluster");
    }
    public function delete_jarak(){
        return $this->db->query("delete from jarak");
    }
    public function delete_cluster(){
        return $this->db->query("delete from cluster");
    }
    public function delete_temp(){
        return $this->db->query("delete from temp");
    }
    public function delete_tempkluster(){
        return $this->db->query("delete from tempkluster");
    }
    public function delete_tempnextinitial(){
        return $this->db->query("delete from tempnextinitial");
    }
    public function delete_nextcluster(){
        return $this->db->query("delete from nextcluster");
    }

    public function delete_kluster(){
        return $this->db->query('delete from kluster');
    }
    public function delete_datatraining(){
        return $this->db->query('delete from datatraining');
    }
    public function delete_klusterawal(){
        return $this->db->query('delete from klusterawal');
    }
    public function delete_tempawal(){
        return $this->db->query('delete from tempawal');
    }
    public function selectNextCluster1(){
        $this->db->select('*');
        $this->db->from('temp');
        $this->db->join('datatraining', 'temp.data = datatraining.No');
        $this->db->where('datatraining.kelas =','1');
        $query = $this->db->get();
        return $query -> result();
    }
    public function JoinTempDanDataTraining($cluster){
        $this->db->select('*');
        $this->db->from('temp');
        $this->db->join('datatraining','temp.data = datatraining.No');
        $this->db->where('temp.cluster',$cluster);

        $query = $this->db->get();
        return $query -> result();
    }
    public function updateKluster($class,$kluster){
        $data = array(
               'kelas' => $class
            );
        $this->db->where('NamaCluster', $kluster);
        $this->db->update('kluster', $data); 
    }

    public function selectFromJarak($data){
        $this->db->select('*');
        $this->db->from('jarak');
        $this->db->where('jarak.data',$data);
        $this->db->order_by('jarak');

        $query = $this->db->get();
        return $query -> result();
    }
    public function selectFromJarakJoinDatatraining($data){
        $this->db->select('*');
        $this->db->from('jarak');
        $this->db->join('datatraining', 'datatraining.No = jarak.Data');
        $this->db->where('jarak.data',$data);
        $this->db->order_by('jarak');

        $query = $this->db->get();
        return $query -> result();
    }

    public function selectFromTempC1(){
        $this->db->select('*');
        $this->db->from('temp');
        $this->db->join('datatraining', 'temp.data = datatraining.No');
        $this->db->where('temp.cluster','1');
        $this->db->order_by('jarak desc');

        $query = $this->db->get();
        return $query -> result();
    }
    public function selectFromTemp(){
        $this->db->select('*');
        $this->db->from('temp');
        $query = $this->db->get();
        return $query -> result();
    }
    public function selectFromTempAwal(){
        $this->db->select('*');
        $this->db->from('tempawal');
        $query = $this->db->get();
        return $query -> result();
    }
    public function selectFromTempC2(){
        $this->db->select('*');
        $this->db->from('temp');
        $this->db->join('datatraining', 'temp.data = datatraining.No');
        $this->db->where('temp.cluster','2');
        $this->db->order_by('jarak desc');

        $query = $this->db->get();
        return $query -> result();
    }
    public function selectFromTempC3(){
        $this->db->select('*');
        $this->db->from('temp');
        $this->db->join('datatraining', 'temp.data = datatraining.No');
        $this->db->where('temp.cluster','3');
        $this->db->order_by('jarak desc');

        $query = $this->db->get();
        return $query -> result();
    }
    public function selectFromTempC4(){
        $this->db->select('*');
        $this->db->from('temp');
        $this->db->join('datatraining', 'temp.data = datatraining.No');
        $this->db->where('temp.cluster','4');
        $this->db->order_by('jarak desc');

        $query = $this->db->get();
        return $query -> result();
    }
    public function selectFromJarakC1($data){
        $this->db->select('*');
        $this->db->from('jarak');
        $this->db->where('jarak.data',$data);
        $this->db->order_by('jarak');

        $query = $this->db->get();
        return $query -> result();
    }

    public function insertToTemp($data){
        $this->db->insert('temp',$data);
    }
    public function insertToTempAwal($data){
        $this->db->insert('tempawal',$data);
    }
    public function insertToTempKluster($data){
        $this->db->insert('tempkluster',$data);
    }
    public function insertToTempNextInitial($data){
        $this->db->insert('tempnextinitial',$data);
    }
    public function insertToNextCluster($data){
        $this->db->insert('nextcluster',$data);
    }

    public function getTemp(){
        $this->db->select('*');
        $this->db->from('temp');

        $query = $this->db->get();
        return $query -> result();
    }
    public function getTempNext(){
        $this->db->select('*');
        $this->db->from('tempnextinitial');

        $query = $this->db->get();
        return $query -> result();
    }

    public function getKluster(){
        $this->db->select('*');
        $this->db->from('kluster');

        $query = $this->db->get();
        return $query -> result();
    }
    public function countRowFromTempDanDataTraining($cluster){
        $this->db->select('temp.cluster');
        $this->db->from('temp');
        $this->db->join('datatraining','temp.data = datatraining.No');
        $this->db->where('temp.cluster',$cluster);

        $query = $this->db->get();
        return $query -> num_rows();


    }

    public function selectFromTempDanDataTraining($cluster){
        $this->db->select('temp.cluster,sum(AHH) as AHH ,SUM(EYS) as EYS,SUM(MYS) as MYS,SUM(Pengeluaran) as Pengeluaran');
        $this->db->from('temp');
        $this->db->join('datatraining','temp.data = datatraining.No');
        $this->db->where('temp.cluster',$cluster);

        $query = $this->db->get();
        return $query -> result();
    }
    public function selectFromTempJoinNextTemp(){
        $this->db->select('temp.cluster as clusterTemp, tempnextinitial.cluster');
        $this->db->from('temp');
        $this->db->join('tempnextinitial','temp.data = tempnextinitial.data');

        $query = $this->db->get();
        return $query -> result();
    }
    public function selectFromTempJoinDataUji(){
        $this->db->select('temp.cluster , datauji.kelas, datauji.no');
        $this->db->from('temp');
        $this->db->join('datauji','temp.data = datauji.no');

        $query = $this->db->get();
        return $query -> result();
    }

    public function insertToKluster($clusterBaru){
        $this->db->insert('kluster',$clusterBaru);
    }
    public function insertToKlusterAwal($clusterBaru){
        $this->db->insert('klusterawal',$clusterBaru);
    }

    public function selectJarakTerkecilPerKluster($cluster){
        $this->db->select('jarak.Data, jarak.Cluster, SUM(jarak.Jarak) as Jarak');
        $this->db->from('temp');
        $this->db->join('jarak','temp.data = jarak.Data AND temp.cluster = jarak.Cluster');
        $this->db->where('jarak.Cluster', $cluster);
        $query = $this->db->get();
        return $query -> result();

    }

    public function selectCluster1FromTemp(){
        $this->db->select('*');
        $this->db->from('temp');
        $this->db->join('datatraining', 'temp.data = datatraining.No');
        $this->db->where('datatraining.kelas =','1');
        $query = $this->db->get();
        return $query -> result();
    }

    public function totalBaris(){
        return $this->db->query("select count(*) from datatraining");
    }

	public function get_member()
	{
		$query =  $this->db->query("select * from user a, member b where a.id=b.id_user and level='admin' Order by tanggal_daftar desc");
    	return $query->result_array();
	}
}

/* End of file entity_admin.php */
/* Location: ./application/models/entity_admin.php */