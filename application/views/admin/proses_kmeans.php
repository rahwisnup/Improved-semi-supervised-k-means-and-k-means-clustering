<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include('css.php'); ?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentellela Alela!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <?php include('profile.php') ?>
            <br />

            <!-- sidebar menu -->
            <?php include('sidebar.php') ?>

            
          </div>
        </div>

        <!-- top navigation -->
        <?php include('top_navigation.php') ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Users <small>Some examples to get you started</small></h3>
              </div>
            </div>

            <div class="clearfix"></div>






            <!-- CLUSTER AWAL -->
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Cluster Awal<small>Proses 1</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <!-- Data Cluster Awal -->
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>AHH</th>
                          <th>EYS</th>
                          <th>MYS</th>
                          <th>Pengeluaran</th>
                          <th>Kelas</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($dataCluster as $key) {
                          ?>
                          <tr>
                              <td>
                                <?php echo $key ->No; ?>
                              </td>
                              <td>
                                <?php echo $key ->AHH; ?>
                              </td>
                              <td>
                                <?php echo $key ->EYS; ?>
                              </td>
                              <td>
                                <?php echo $key ->MYS; ?>
                              </td>
                              <td>
                                <?php echo $key ->Pengeluaran; ?>
                              </td>
                              <td>
                                <?php echo $key ->Kelas; ?>
                              </td>
                          </tr>
                        <?php } ?> 
                      </tbody>
                    </table>
                  </div>               
                </div>
              </div>
            </div>





            <!-- PROSES 2 JARAK -->
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Jarak Cluster Awal Dengan Datatraining <small>Proses 2</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <!-- Data Cluster Awal -->

                  <!-- Data Jarak -->
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Data</th>
                          <th>Cluster</th>
                          <th>Jarak</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php foreach ($dataJarak as $key) {
                          ?>
                          <tr>
                              <td>
                                <?php echo $key ->Data; ?>
                              </td>
                              <td>
                                <?php echo $key ->Cluster; ?>
                              </td>
                              <td>
                                <?php echo $key ->Jarak; ?>
                              </td>
                          </tr>
                        <?php } ?> 
                      </tbody>
                    </table>
                  </div>
                
                </div>
              </div>
            </div>




            <!-- PROSES 3 KLUSTERING DATA -->
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Klustering Data<small>Proses 3</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <!-- Data  -->

                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Data</th>
                          <th>Cluster</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php foreach ($dataClustering as $key) {
                          ?>
                          <tr>
                              <td>
                                <?php echo $key ->data; ?>
                              </td>
                              <td>
                                <?php echo $key ->cluster; ?>
                              </td>
                          </tr>
                        <?php } ?> 
                      </tbody>
                    </table>
                  </div>                  
                </div>
              </div>
            </div>



            <!-- PROSES 4 hitung total jarak terkecil di setiapkluster  -->
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Cluster Baru<small>Proses 4</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <!-- Data  -->

                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Cluster</th>
                          <th>AHH</th>
                          <th>EYS</th>
                          <th>MYS</th>
                          <th>Pengeluaran</th>
                          <th>Kelas</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php foreach ($KlusterBaru as $key) {
                          ?>
                          <tr>
                              <td>
                                <?php echo $key ->namacluster; ?>
                              </td>
                              <td>
                                <?php echo $key ->pusatAHH; ?>
                              </td>
                              <td>
                                <?php echo $key ->pusatEYS; ?>
                              </td>
                              <td>
                                <?php echo $key ->pusatMYS; ?>
                              </td>
                              <td>
                                <?php echo $key ->pusatPengeluaran; ?>
                              </td>
                              <td>
                                <?php echo $key ->kelas; ?>
                              </td>
                          </tr>
                        <?php } ?> 
                      </tbody>
                    </table>
                  </div>                  
                </div>
              </div>
            </div>





          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
  <!--       <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer> -->
        <!-- /footer content -->
      </div>
    </div>

    <?php include ('javascript.php'); ?>
  </body>
</html>