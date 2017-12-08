<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Monitoring Atsiri</title>
    <link type="text/css" href="<?php  echo base_url();?>assetsedmin/vendor/edmin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="<?php  echo base_url();?>assetsedmin/vendor/edmin/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <!-- <link type="text/css" href="<?php  echo base_url();?>assetsedmin/vendor/edmin/css/theme.css" rel="stylesheet"> -->
    <link type="text/css" href="<?php  echo base_url();?>assetsedmin/vendor/edmin/images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>
<body>
    <?php include("headerReport.php") ?>


    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="box-content">
                        <table class="table table-striped table-bordered bootstrap-datatable datatable">
                          <thead>
                              <tr>
                              <th>Id Lahan</th>
                                  <th>Luas</th>
                                  <th>Alamat Lahan</th>
                                  <th>Nama Pemilik</th>
                                  <th>Kabupaten</th>
                                  <th>Provinsi</th>
                              </tr>
                          </thead>
                          <tbody>
                          <?php $tot_luas=0; ?>
                          <br>Bali</br>
                          <?php for ($i=0; $i < $perulanganBali ; $i++) { ?>
                            <tr >
                            <td class="center span1"><?php echo $data_lahan_bali[$i]['id_lahan']; ?></td>
                            <td class="center span1"><?php echo $data_lahan_bali[$i]['luas']; ?></td>

                            <?php 
                                
                                $tot_luas=$data_lahan_bali[$i]['luas']+$tot_luas;
                            ?>
                            
                                <td class="span3"><?php echo $data_lahan_bali[$i]['alamat_lahan']; ?></td>
                                <td class="span3"><?php echo $data_lahan_bali[$i]['nama_pemilik']; ?></td>
                                <td class="center span2"><?php echo $data_lahan_bali[$i]['nama_kabupaten']; ?></td>
                                <td class="center span2"><?php echo $data_lahan_bali[$i]['nama_provinsi']; ?></td>
                            </tr>
                            <?php } ?>
                            
                            <!-- <th>Jawa TImur</th> -->
                          </tbody>
                          <tfoot>
                                        <tr>
                                            <th>Total</th>
                                            <th><?php echo "".$tot_luas; ?></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                      </table>   
                               
                    </div>
            </div>
        </div>
    </div><!--/.wrapper-->

    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="box-content">
                        <table class="table table-striped table-bordered bootstrap-datatable datatable">
                          <thead>
                              <tr>
                              <th>Id Lahan</th>
                                  <th>Luas</th>
                                  <th>Alamat Lahan</th>
                                  <th>Nama Pemilik</th>
                                  <th>Kabupaten</th>
                                  <th>Provinsi</th>
                              </tr>
                          </thead>
                          <tbody>
                          <?php $tot_luas=0; ?>
                          <br>Jawa TImur </br>
                          <?php for ($i=0; $i < $perulanganJatim ; $i++) { ?>
                            <tr >
                            <td class="center span1"><?php echo $data_lahan_jatim[$i]['id_lahan']; ?></td>
                            <td class="center span1"><?php echo $data_lahan_jatim[$i]['luas']; ?></td>

                            <?php 
                                
                                $tot_luas=$data_lahan_jatim[$i]['luas']+$tot_luas;
                            ?>
                            
                                <td class="span3"><?php echo $data_lahan_jatim[$i]['alamat_lahan']; ?></td>
                                <td class="span3"><?php echo $data_lahan_jatim[$i]['nama_pemilik']; ?></td>
                                <td class="center span2"><?php echo $data_lahan_jatim[$i]['nama_kabupaten']; ?></td>
                                <td class="center span2"><?php echo $data_lahan_jatim[$i]['nama_provinsi']; ?></td>
                            </tr>
                            <?php } ?>
                            
                            <!-- <th>Jawa TImur</th> -->
                          </tbody>
                          <tfoot>
                                        <tr>
                                            <th>Total</th>
                                            <th><?php echo "".$tot_luas; ?></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                      </table>   
                               
                    </div>
            </div>
        </div>
    </div><!--/.wrapper-->

    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="box-content">
                        <table class="table table-striped table-bordered bootstrap-datatable datatable">
                          <thead>
                              <tr>
                              <th>Id Lahan</th>
                                  <th>Luas</th>
                                  <th>Alamat Lahan</th>
                                  <th>Nama Pemilik</th>
                                  <th>Kabupaten</th>
                                  <th>Provinsi</th>
                              </tr>
                          </thead>
                          <tbody>
                          <?php $tot_luas=0; ?>
                          <br>Jawa Tengah </br>
                          <?php for ($i=0; $i < $perulanganJateng ; $i++) { ?>
                            <tr >
                            <td class="center span1"><?php echo $data_lahan_jateng[$i]['id_lahan']; ?></td>
                            <td class="center span1"><?php echo $data_lahan_jateng[$i]['luas']; ?></td>

                            <?php 
                                
                                $tot_luas=$data_lahan_jateng[$i]['luas']+$tot_luas;
                            ?>
                            
                                <td class="span3"><?php echo $data_lahan_jateng[$i]['alamat_lahan']; ?></td>
                                <td class="span3"><?php echo $data_lahan_jateng[$i]['nama_pemilik']; ?></td>
                                <td class="center span2"><?php echo $data_lahan_jateng[$i]['nama_kabupaten']; ?></td>
                                <td class="center span2"><?php echo $data_lahan_jateng[$i]['nama_provinsi']; ?></td>
                            </tr>
                            <?php } ?>
                            
                            <!-- <th>Jawa TImur</th> -->
                          </tbody>
                          <tfoot>
                                        <tr>
                                            <th>Total</th>
                                            <th><?php echo "".$tot_luas; ?></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                      </table>   
                               
                    </div>
            </div>
        </div>
    </div><!--/.wrapper-->

    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="box-content">
                        <table class="table table-striped table-bordered bootstrap-datatable datatable">
                          <thead>
                              <tr>
                              <th>Id Lahan</th>
                                  <th>Luas</th>
                                  <th>Alamat Lahan</th>
                                  <th>Nama Pemilik</th>
                                  <th>Kabupaten</th>
                                  <th>Provinsi</th>
                              </tr>
                          </thead>
                          <tbody>
                          <?php $tot_luas=0; ?>
                          <br>Jawa Barat</br>
                          <?php for ($i=0; $i < $perulanganJabar ; $i++) { ?>
                            <tr >
                            <td class="center span1"><?php echo $data_lahan_jabar[$i]['id_lahan']; ?></td>
                            <td class="center span1"><?php echo $data_lahan_jabar[$i]['luas']; ?></td>

                            <?php 
                                
                                $tot_luas=$data_lahan_jabar[$i]['luas']+$tot_luas;
                            ?>
                            
                                <td class="span3"><?php echo $data_lahan_jabar[$i]['alamat_lahan']; ?></td>
                                <td class="span3"><?php echo $data_lahan_jabar[$i]['nama_pemilik']; ?></td>
                                <td class="center span2"><?php echo $data_lahan_jabar[$i]['nama_kabupaten']; ?></td>
                                <td class="center span2"><?php echo $data_lahan_jabar[$i]['nama_provinsi']; ?></td>
                            </tr>
                            <?php } ?>
                            
                            <!-- <th>Jawa TImur</th> -->
                          </tbody>
                          <tfoot>
                                        <tr>
                                            <th>Total</th>
                                            <th><?php echo "".$tot_luas; ?></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                      </table>   
                               
                    </div>
            </div>
        </div>
    </div><!--/.wrapper-->


    <div class="footer">
        <div class="container">
             

            <b class="copyright">&copy; 2016 Wisnu Paramartha </b> All rights reserved.
        </div>
    </div>
    <script src="<?php  echo base_url();?>assetsedmin/vendor/edmin/scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="<?php  echo base_url();?>assetsedmin/vendor/edmin/scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="<?php  echo base_url();?>assetsedmin/vendor/edmin/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>























