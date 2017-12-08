<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
set_time_limit(6000);

require_once APPPATH . 'controllers/controller_pengguna.php';

class Controller_semiKmeans extends controller_pengguna {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));

        if ($this->check_session_level() != 'admin') {
            redirect(base_url('controller_pengguna/login'));
        }
    }

    public function nextInitialCenter(){
            $tempAwal = $result = $this->entity_admin->getTemp();
            $lempar['tempAwal'] = $tempAwal;
            $this->load->view('admin/outputKlusteringAwal', $lempar);

            $c1Next = $this->entity_admin->selectFromTempC1();
            $c2Next = $this->entity_admin->selectFromTempC2();
            $c3Next = $this->entity_admin->selectFromTempC3();
            $c4Next = $this->entity_admin->selectFromTempC4();
            foreach ($c1Next as $key2) {
                $nextInitial = array(
                    'No' => $key2->No,
                    'NamaCluster' => 1,
                    'pusatAHH' => $key2->AHH,
                    'pusatEYS' => $key2->EYS,
                    'pusatMYS' => $key2->MYS,
                    'pusatPengeluaran' => $key2->Pengeluaran,
                    'kelas' => 1
                );
                $this->entity_admin->insertToKluster($nextInitial);
                $this->entity_admin->insertToKlusterAwal($nextInitial);
                break;
            }
            foreach ($c2Next as $key2) {
                $nextInitial = array(
                    'No' => $key2->No,
                    'NamaCluster' => 2,
                    'pusatAHH' => $key2->AHH,
                    'pusatEYS' => $key2->EYS,
                    'pusatMYS' => $key2->MYS,
                    'pusatPengeluaran' => $key2->Pengeluaran,
                    'kelas' => 2
                );
                $this->entity_admin->insertToKluster($nextInitial);
                $this->entity_admin->insertToKlusterAwal($nextInitial);
                break;
            }
            foreach ($c3Next as $key2) {
                $nextInitial = array(
                    'No' => $key2->No,
                    'NamaCluster' => 3,
                    'pusatAHH' => $key2->AHH,
                    'pusatEYS' => $key2->EYS,
                    'pusatMYS' => $key2->MYS,
                    'pusatPengeluaran' => $key2->Pengeluaran,
                    'kelas' => 3
                );
                $this->entity_admin->insertToKluster($nextInitial);
                $this->entity_admin->insertToKlusterAwal($nextInitial);
                break;
            }
            foreach ($c4Next as $key2) {
                $nextInitial = array(
                    'No' => $key2->No,
                    'NamaCluster' => 4,
                    'pusatAHH' => $key2->AHH,
                    'pusatEYS' => $key2->EYS,
                    'pusatMYS' => $key2->MYS,
                    'pusatPengeluaran' => $key2->Pengeluaran,
                    'kelas' => 4
                );
                $this->entity_admin->insertToKluster($nextInitial);
                $this->entity_admin->insertToKlusterAwal($nextInitial);
                break;
            }
            //print next initial cluster center
            $nextClusterCenter = $result = $this->entity_admin->selectAllFromKluster();
            $lempar['nextClusterCenter'] = $nextClusterCenter;
            $this->load->view('admin/outputNextCluster', $lempar);
    }

    public function index() {
        $F = $Flama = 0;
        $Treeshold = 0.3;
        $this->load->model('entity_admin');

        
        echo "N = " . $jmlN . ", ";
        echo "Berlabel = " . $jmlNBerlabel . ", ";
        echo "Non Label = " . $jmlNonLabel . ", ";
        //mencari nilai KL
        $this->prosesAwal();
        $jmlKL = $this->entity_admin->countInitialCluster();
        echo "KL = " . $jmlKL . ", ";

        if ($jmlKL >= sqrt($jmlN)) {
            echo "benar";
        } else {
            $iterasi = 1;

            //langkah 3, hitung jarak 
            for ($i = 1; $i <= $jmlN; $i++) {
                $query = $this->entity_admin->getData($i);
                foreach ($query as $key) {
                    $AHH = $key->AHH;
                    $EYS = $key->EYS;
                    $MYS = $key->MYS;
                    $Pengeluaran = $key->Pengeluaran;
                }
                $cluster = $this->entity_admin->getInitialCenter();
                foreach ($cluster as $key) {
                    $result = $this->entity_admin->getDataCluster($key->Kelas);
                    foreach ($result as $key1) {
                        $tempAHH = $key1->AHH;
                        $tempEYS = $key1->EYS;
                        $tempMYS = $key1->MYS;
                        $TempPengeluaran = $key1->Pengeluaran;
                    }
                    $insertJarak = array(
                        'data' => $i,
                        'cluster' => $key->Kelas,
                        'jarak' => sqrt(pow($AHH - $tempAHH, 2) + pow($EYS - $tempEYS, 2) + pow($MYS - $tempMYS, 2) + pow($Pengeluaran - $TempPengeluaran, 2))
                    );
                    $this->entity_admin->insertToJarak($insertJarak);
                }
            }
            //print jarak
            $jarakAwal = $result = $this->entity_admin->getJarak();
            $lempar['jarakAwal'] = $jarakAwal;
            $this->load->view('admin/outputJarakAwal', $lempar);


            // langkah 4, klustering data
            for ($i = 1; $i <= $jmlNBerlabel; $i++) {
                $hasil = $this->entity_admin->selectFromJarakJoinDatatraining($iterasi); //untuk input data temp, lanjutan dari select sebelumnya 
                foreach ($hasil as $key2) {
                    $put = array(
                        'data' => $key2->Data,
                        'cluster' => $key2->Kelas,
                        'jarak' => $key2->Jarak
                    );
                    $this->entity_admin->insertToTemp($put);
                    $this->entity_admin->insertToTempAwal($put);
                    break;
                }
                $iterasi++;
            }

            // langkah 4, klustering data
            for ($i = 1; $i <= $jmlNonLabel; $i++) {
                $hasil = $this->entity_admin->selectFromJarak($iterasi); //untuk input data temp, lanjutan dari select sebelumnya 
                foreach ($hasil as $key2) {
                    $put = array(
                        'data' => $key2->Data,
                        'cluster' => $key2->Cluster,
                        'jarak' => $key2->Jarak
                    );
                    $this->entity_admin->insertToTemp($put);
                    $this->entity_admin->insertToTempAwal($put);
                    break;
                }
                $iterasi++;
            }
            //print hasil clustering
            //memilih next initial cluser
            // klustering
            // for ($i = 1; $i <= $jmlN; $i++) {
            //     $hasil = $this->entity_admin->selectFromJarak($i);
            //     foreach ($hasil as $key2) {
            //         $nextInitial = array(
            //             'data' => $key2->Data,
            //             'cluster' => $key2->Cluster,
            //             'jarak' => $key2->Jarak
            //         );
            //         $this->entity_admin->insertToTempNextInitial($nextInitial);
            //         break;
            //     }
            // }
            //langkah 5, mencari next initial cluster center
            


            // $query1 = $this->entity_admin->selectFromTempJoinNextTemp();
            // foreach ($query1 as $key) {
            //     if ($key->clusterTemp == $key->cluster) {
            //         $value = 1;
            //     } else {
            //         $value = 0; //untuk yang salah
            //         break;
            //     }
            // }
            // echo "nilai = ".$nilai;
            // echo "value = " . $value;
            // $lempar['nilainyo'] = $query;
             //perulangan untuk for-nya
            $x = 1;
            for ($k=$jmlKL+1; $k <= sqrt($jmlN); $k++) {
                $this->entity_admin->delete_kluster();
                $this->nextInitialCenter();
                
                echo "jumlah nilai okay";
                $perulangan = 1;
                $value = 0;
                while ($value == 0) {
                    //untuk pengecekan konvergen
                    $thisQuery = $this->entity_admin->selectFromTempJoinNextTemp();
                    foreach ($thisQuery as $key) {
                        if ($key->clusterTemp == $key->cluster) {
                            $value = 1;
                        } else {
                            $value = 0; //untuk yang salah
                            break;
                        }
                    }
                    //delete dari temp nexxt initial
                    $this->entity_admin->delete_tempnextinitial();


                    // klustering cek konvergen
                    $hasil = $this->entity_admin->selectFromTemp();
                    foreach ($hasil as $key2) {
                        $put = array(
                            'data' => $key2->data,
                            'cluster' => $key2->cluster,
                            'jarak' => $key2->jarak
                        );
                        $this->entity_admin->insertToTempNextInitial($put);
                    }





                     
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
                    $loop = 1;
                    for ($i = 1; $i <= $jmlNBerlabel; $i++) {
                        $hasil = $this->entity_admin->selectFromJarakJoinDatatraining($loop); //untuk input data temp, lanjutan dari select sebelumnya 
                        foreach ($hasil as $key2) {
                            $put = array(
                                'data' => $key2->Data,
                                'cluster' => $key2->Kelas,
                                'jarak' => $key2->Jarak
                            );
                            $this->entity_admin->insertToTemp($put);
                            break;
                        }
                        $loop++;
                    }

                    // langkah 4, klustering data
                    for ($i = 1; $i <= $jmlNonLabel; $i++) {
                        $hasil = $this->entity_admin->selectFromJarak($loop); //untuk input data temp, lanjutan dari select sebelumnya 
                        foreach ($hasil as $key2) {
                            $put = array(
                                'data' => $key2->Data,
                                'cluster' => $key2->Cluster,
                                'jarak' => $key2->Jarak
                            );
                            $this->entity_admin->insertToTemp($put);
                            break;
                        }
                        $loop++;
                    }

                    $lempar['dataClustering'] = $this->entity_admin->getTemp();
                    $this->load->view('admin/outputklustering', $lempar);

                    // end klustering

                    $this->entity_admin->delete_kluster();

                    for ($i = 1; $i <= $jmlKL; $i++) {
                        $JmlAnggotaKluster = $this->entity_admin->countRowFromTempDanDataTraining($i);
                        $hasil2 = $this->entity_admin->selectFromTempDanDataTraining($i);
                        foreach ($hasil2 as $key) {
                            $inputClusterBaru = array(
                                'No' => $i,
                                'NamaCluster' => $i,
                                'pusatAHH' => $key->AHH / $JmlAnggotaKluster,
                                'pusatEYS' => $key->EYS / $JmlAnggotaKluster,
                                'pusatMYS' => $key->MYS / $JmlAnggotaKluster,
                                'pusatPengeluaran' => $key->Pengeluaran / $JmlAnggotaKluster
                            );
                        }
                        $this->entity_admin->insertToKluster($inputClusterBaru);
                    }

                    // hitung total jarak terkecil di setiapkluster
                    for ($i = 1; $i <= $jmlKL; $i++) {
                        $bantu = $this->entity_admin->selectJarakTerkecilPerKluster($i);
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
                    echo "perulangan = " . $perulangan;
                    $perulangan++;
                } //akhir while

                // hitung total jarak terkecil di setiapkluster
                //total jarak JK
                $jk = 0;
                for ($i = 1; $i <= $jmlKL; $i++) {
                    $bantu = $this->entity_admin->selectJarakTerkecilPerKluster($i);
                    foreach ($bantu as $key) {
                        $jarakTerkecil = $key->Jarak;
                    }
                    $jk = $jk + $jarakTerkecil;
                }
                echo "jarak total = " . $jk;

                $insertJK = array(
                    'perulangan' => $x,
                    'jk' => $jk
                );
                $this->entity_admin->insertToJK($insertJK);

                //insert total nilai jarak
                //insert initial cluster center 

                $tempKluster = $this->entity_admin->selectAllFromKluster();
                foreach ($tempKluster as $key) {
                    $insertTempKluster = array(
                        'no' => $x,
                        'NamaCluster' => $key->NamaCluster,
                        'pusatAHH' => $key->pusatAHH,
                        'pusatEYS' => $key->pusatEYS,
                        'pusatMYS' => $key->pusatMYS,
                        'pusatPengeluaran' => $key->pusatPengeluaran,
                        'kelas' => $key->kelas
                    );
                    $this->entity_admin->insertToTempKluster($insertTempKluster); //temp kluster adalah untuk menyimpan  nilai akhir cluser center setelah 1 perulangan for berakhir
                }
                $x++; //perulangan x (for) bertambah
                $this->entity_admin->delete_tempnextinitial();
            } //ini akhir for 
        } //ini akhir else
    }

    public function cekKonvergen($nilai) {
        
    }

//ini akhir method index
    // public function hapusData() {
    //     $this->load->model('entity_admin');
    //     $this->entity_admin->delete_datak1();
    //     $this->entity_admin->delete_datak2();
    //     $this->entity_admin->delete_datak3();
    //     $this->entity_admin->delete_datak4();
    //     $this->entity_admin->delete_initialcluster();
    //     $this->entity_admin->delete_jarak();
    //     $this->entity_admin->delete_temp();
    //     $this->entity_admin->delete_tempnextinitial();
    //     $this->entity_admin->delete_nextcluster();
    //     $this->entity_admin->delete_kluster();
    //     $this->entity_admin->delete_jk();
    //     redirect(base_url() . "controller_admin/semi_kmeans");
    // }

    public function prosesAwal() {
        $resultKL = $result = $this->entity_admin->getKL();


        // langkah 1, mencari nilai KL
        //untuk klaster 1
        $c1 = 1;
        $c2 = 1;
        $c3 = 1;
        $c4 = 1;
        $NoIndeks = 1;
        $AHH = $EYS = $MYS = $Pengeluaran = 0;


        $resultK1 = $result = $this->entity_admin->getK1();
        foreach ($resultK1 as $key) {
            $insertK1 = array(
                'No' => $c1,
                'AHH' => $key->AHH,
                'EYS' => $key->EYS,
                'MYS' => $key->MYS,
                'Pengeluaran' => $key->Pengeluaran,
                'Kelas' => $key->Kelas
            );
            $this->entity_admin->insertToK1($insertK1);
            $c1++;
        }
        $JmlK1 = $this->entity_admin->countDataK1();
        $randomK1 = rand(1, $JmlK1); //data randomnya
        //get K2
        $resultK2 = $result = $this->entity_admin->getK2();
        foreach ($resultK2 as $key1) {
            $insertK2 = array(
                'No' => $c2,
                'AHH' => $key1->AHH,
                'EYS' => $key1->EYS,
                'MYS' => $key1->MYS,
                'Pengeluaran' => $key1->Pengeluaran,
                'Kelas' => $key1->Kelas
            );
            $this->entity_admin->insertToK2($insertK2);
            $c2++;
        }
        $JmlK2 = $this->entity_admin->countDataK2();
        $randomK2 = rand(1, $JmlK2); //data randomnya
        //get K3
        $resultK3 = $result = $this->entity_admin->getK3();
        foreach ($resultK3 as $key1) {
            $insertK3 = array(
                'No' => $c3,
                'AHH' => $key1->AHH,
                'EYS' => $key1->EYS,
                'MYS' => $key1->MYS,
                'Pengeluaran' => $key1->Pengeluaran,
                'Kelas' => $key1->Kelas
            );
            $this->entity_admin->insertToK3($insertK3);
            $c3++;
        }
        $JmlK3 = $this->entity_admin->countDataK3();
        $randomK3 = rand(1, $JmlK3); //data randomnya
        //get K4
        $resultK4 = $result = $this->entity_admin->getK4();
        foreach ($resultK4 as $key1) {
            $insertK4 = array(
                'No' => $c4,
                'AHH' => $key1->AHH,
                'EYS' => $key1->EYS,
                'MYS' => $key1->MYS,
                'Pengeluaran' => $key1->Pengeluaran,
                'Kelas' => $key1->Kelas
            );
            $this->entity_admin->insertToK4($insertK4);
            $c4++;
        }
        $JmlK4 = $this->entity_admin->countDataK4();
        $randomK4 = rand(1, $JmlK4); //data randomnya

        echo "K1 = " . $randomK1 . ", ";
        echo "K2 = " . $randomK2 . ", ";
        echo "K3 = " . $randomK3 . ", ";
        echo "K4 = " . $randomK4 . ", ";

        //langkah 2, mencari initial cluster
        //initial C1
        $dataInitialC1 = $result = $this->entity_admin->getInitialC1($randomK1);
        foreach ($dataInitialC1 as $key1) {
            $insertC1 = array(
                'No' => $NoIndeks,
                'AHH' => $key1->AHH,
                'EYS' => $key1->EYS,
                'MYS' => $key1->MYS,
                'Pengeluaran' => $key1->Pengeluaran,
                'Kelas' => $key1->Kelas
            );
            $this->entity_admin->insertToC($insertC1);
            $NoIndeks++;
        }


        //initial C2
        $dataInitialC2 = $result = $this->entity_admin->getInitialC2($randomK2);
        foreach ($dataInitialC2 as $key1) {
            $insertC2 = array(
                'No' => $NoIndeks,
                'AHH' => $key1->AHH,
                'EYS' => $key1->EYS,
                'MYS' => $key1->MYS,
                'Pengeluaran' => $key1->Pengeluaran,
                'Kelas' => $key1->Kelas
            );
            $this->entity_admin->insertToC($insertC2);
            $NoIndeks++;
        }

        //initial C3
        $dataInitialC3 = $result = $this->entity_admin->getInitialC3($randomK3);
        foreach ($dataInitialC3 as $key1) {
            $insertC3 = array(
                'No' => $NoIndeks,
                'AHH' => $key1->AHH,
                'EYS' => $key1->EYS,
                'MYS' => $key1->MYS,
                'Pengeluaran' => $key1->Pengeluaran,
                'Kelas' => $key1->Kelas
            );
            $this->entity_admin->insertToC($insertC3);
            $NoIndeks++;
        }

        //initial C4
        $dataInitialC4 = $result = $this->entity_admin->getInitialC4($randomK4);
        foreach ($dataInitialC4 as $key1) {
            $insertC4 = array(
                'No' => $NoIndeks,
                'AHH' => $key1->AHH,
                'EYS' => $key1->EYS,
                'MYS' => $key1->MYS,
                'Pengeluaran' => $key1->Pengeluaran,
                'Kelas' => $key1->Kelas
            );
            $this->entity_admin->insertToC($insertC4);
            $NoIndeks++;
        }

        $resultInitialCenter = $result = $this->entity_admin->getInitialCenter();

        $lempar['dataKL'] = $resultKL;
        $lempar['dataInitialCenter'] = $resultInitialCenter;
        // $lempar['dataInitial']= $dataAllRandom;
        $this->load->view('admin/outputKL', $lempar);
    }

//ini akhir methodnya
}
