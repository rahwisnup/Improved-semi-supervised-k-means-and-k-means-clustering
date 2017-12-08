<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class controller_kmeans extends CI_Controller {

    public function index() {
        $F = $Flama = 0;
        $Treeshold = 0.3;
        $this->load->model('entity_admin');
        $jmlKluster = $this->input->post('cluster');
        $this->caricluster($jmlKluster);
        $jmlN = $this->entity_admin->countDataTraining();

        $AHH = $EYS = $MYS = $Pengeluaran = 0;

        $resultCluster = $result = $this->entity_admin->getAllDataCluster();
        $lempar['dataCluster'] = $resultCluster;
        $this->load->view('admin/outputcluster', $lempar);
        //----------------------------------------------
        // hitung jarak
        for ($i = 1; $i <= $jmlN; $i++) {
            $query = $this->entity_admin->getData($i);
            foreach ($query as $key) {
                $AHH = $key->AHH;
                $EYS = $key->EYS;
                $MYS = $key->MYS;
                $Pengeluaran = $key->Pengeluaran;
            }

            $cluster = $this->entity_admin->getCluster();

            foreach ($cluster as $key) {
                $result = $this->entity_admin->getDataClusternya($key->pusat);

                foreach ($result as $key1) {
                    $tempAHH = $key1->AHH;
                    $tempEYS = $key1->EYS;
                    $tempMYS = $key1->MYS;
                    $tempPengeluaran = $key1->Pengeluaran;
                }

                $insertJarak = array(
                    'Data' => $i,
                    'Cluster' => $key->namacluster,
                    'Jarak' => sqrt(pow($AHH - $tempAHH, 2) + pow($EYS - $tempEYS, 2) + pow($MYS - $tempMYS, 2) + pow($Pengeluaran - $tempPengeluaran, 2))
                );
                $this->entity_admin->insertToJarak($insertJarak);
            }
        }

        $lempar['dataJarak'] = $this->entity_admin->selectAllFromJarak();
        $this->load->view('admin/outputjarak', $lempar);
        // klustering
        for ($i = 1; $i <= $jmlN; $i++) {
            $hasil = $this->entity_admin->selectFromJarak($i);
            foreach ($hasil as $key2) {
                $put = array(
                    'data' => $key2->Data,
                    'cluster' => $key2->Cluster
                );
                $this->entity_admin->insertToTemp($put);
                break;
            }
        }

        $lempar['dataClustering'] = $this->entity_admin->getTemp();
        $this->load->view('admin/outputklustering', $lempar);
        // cari cluster baru
        for ($i = 1; $i <= $jmlKluster; $i++) {
            $JmlAnggotaKluster = $this->entity_admin->countRowFromTempDanDataTraining('C' . $i);
            // echo " jumlah anggota kluster " . $JmlAnggotaKluster;
            $hasil2 = $this->entity_admin->selectFromTempDanDataTraining('C' . $i);
            foreach ($hasil2 as $key) {
                $inputClusterBaru = array(
                    'No' => $i,
                    'NamaCluster' => 'C' . $i,
                    'pusatAHH' => $key->AHH / $JmlAnggotaKluster,
                    'pusatEYS' => $key->EYS / $JmlAnggotaKluster,
                    'pusatMYS' => $key->MYS / $JmlAnggotaKluster,
                    'pusatPengeluaran' => $key->Pengeluaran / $JmlAnggotaKluster
                );
            }
            
            $this->entity_admin->insertToKluster($inputClusterBaru);
        }




        // hitung total jarak terkecil di setiapkluster
        for ($i = 1; $i <= $jmlKluster; $i++) {
            $bantu = $this->entity_admin->selectJarakTerkecilPerKluster('C' . $i);
            foreach ($bantu as $key) {
                $bantuJarak = $key->Jarak;
            }
            $F = $F + $bantuJarak;
        }

        $lempar['klusterBaru'] = $this->entity_admin->selectAllFromKluster();
        $lempar['F'] = $F;
        $lempar['Flama'] = $Flama;
        $lempar['Treeshold'] = $Treeshold;

        $this->load->view('admin/newCentroid', $lempar);

        while (($F - $Flama) > $Treeshold) {
            $this->entity_admin->delete_jarak();
            $this->entity_admin->delete_temp();


            $Flama = $F;
            $F = 0;
            for ($i = 1; $i <= $jmlN; $i++) {
                $query = $this->entity_admin->getData($i);
                foreach ($query as $key) {
                    $AHH = $key->AHH;
                    $EYS = $key->EYS;
                    $MYS = $key->MYS;
                    $Pengeluaran = $key->Pengeluaran;
                }

                $cluster = $this->entity_admin->selectAllFromKluster();

                foreach ($cluster as $key) {
                    $tempAHH = $key->pusatAHH;
                    $tempEYS = $key->pusatEYS;
                    $tempMYS = $key->pusatMYS;
                    $tempPengeluaran = $key->pusatPengeluaran;

                    $insertJarak = array(
                        'Data' => $i,
                        'Cluster' => $key->NamaCluster,
                        'Jarak' => sqrt(pow($AHH - $tempAHH, 2) + pow($EYS - $tempEYS, 2) + pow($MYS - $tempMYS, 2) + pow($Pengeluaran - $tempPengeluaran, 2))
                    );
                    $this->entity_admin->insertToJarak($insertJarak);
                }
            }

            $lempar['dataJarak'] = $this->entity_admin->selectAllFromJarak();
            $this->load->view('admin/outputjarak', $lempar);
            // end jarak
            // klustering
            for ($i = 1; $i <= $jmlN; $i++) {
                $hasil = $this->entity_admin->selectFromJarak($i);
                foreach ($hasil as $key2) {
                    $put = array(
                        'data' => $key2->Data,
                        'cluster' => $key2->Cluster
                    );
                    $this->entity_admin->insertToTemp($put);
                    break;
                }
            }

            $lempar['dataClustering'] = $this->entity_admin->getTemp();
            $this->load->view('admin/outputklustering', $lempar);
            // end klustering

            $this->entity_admin->delete_kluster();

            for ($i = 1; $i <= $jmlKluster; $i++) {
                $JmlAnggotaKluster = $this->entity_admin->countRowFromTempDanDataTraining('C' . $i);
                $hasil2 = $this->entity_admin->selectFromTempDanDataTraining('C' . $i);
                foreach ($hasil2 as $key) {
                    $inputClusterBaru = array(
                        'No' => $i,
                        'NamaCluster' => 'C' . $i,
                        'pusatAHH' => $key->AHH / $JmlAnggotaKluster,
                        'pusatEYS' => $key->EYS / $JmlAnggotaKluster,
                        'pusatMYS' => $key->MYS / $JmlAnggotaKluster,
                        'pusatPengeluaran' => $key->Pengeluaran / $JmlAnggotaKluster
                    );
                }
                $this->entity_admin->insertToKluster($inputClusterBaru);
            }

            // hitung total jarak terkecil di setiapkluster
            for ($i = 1; $i <= $jmlKluster; $i++) {
                $bantu = $this->entity_admin->selectJarakTerkecilPerKluster('C' . $i);
                foreach ($bantu as $key) {
                    $bantuJarak = $key->Jarak;
                }
                $F = $F + $bantuJarak;
            }

            $lempar['klusterBaru'] = $this->entity_admin->selectAllFromKluster();
            $lempar['F'] = $F;
            $lempar['Flama'] = $Flama;
            $lempar['Treeshold'] = $Treeshold;

            $this->load->view('admin/newCentroid', $lempar);
        }

        // klasifikasi

        for ($i = 1; $i <= $jmlKluster; $i++) {
            $fK1 = $fK2 = $fK3 = 0;
            $result = $this->entity_admin->JoinTempDanDataTraining('C' . $i);
            foreach ($result as $key) {
                if ($key->Kelas == 1) {
                    $fK1++;
                } elseif ($key->Kelas == 2) {
                    $fK2++;
                } else
                    $fK3++;
            }
            if ($fK1 >= $fK2) {
                if ($fK1 >= $fK3) {
                    $this->entity_admin->updateKluster(1, 'C' . $i);
                } else
                    $this->entity_admin->updateKluster(2, 'C' . $i);
            }
            else
            if ($fK2 >= $fK3) {
                $this->entity_admin->updateKluster(2, 'C' . $i);
            } else
                $this->entity_admin->updateKluster(3, 'C' . $i);
        }

        $lempar['klusterBaru'] = $this->entity_admin->selectAllFromKluster();
        $this->load->view('admin/newCentroid', $lempar);


        // $this->load->view('button');
    }

    public function caricluster($jmlKluster) {
        $this->load->model('entity_admin');
        $totalN = $this->entity_admin->countDataTraining();
        $k = 1;
        while ($k <= $jmlKluster) {
            $random = 0;
            while ($random == 0) {
                $random = (rand() % $totalN);
            }
            $inputcluster = array(
                // 'no' => $k,
                'namacluster' => 'C' . $k,
                'pusat' => $random
            );
            $this->entity_admin->masukcluster($inputcluster);
            $k++;
        }
    }

    public function hitungjarak() {
        
    }

}
