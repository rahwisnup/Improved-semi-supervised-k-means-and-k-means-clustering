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
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Semi-Supervised K-Means Clustering</span></a>
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
                <h3>Improved Semi Supervised K-Means Clustering</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Training<small> - Dalam Penelitian Terdapat 500 Data Trraining</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      Terdapat 4 feature yaitu <code>AHH</code>,<code>EYS</code>,<code>MYS</code>, dan <code>Pengeluaran</code>
                    </p>
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
                        <?php foreach ($training as $key) {
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



                    <!-- form input nya -->
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Input Data</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form method="post" action="<?php echo base_url().'controller_semiKmeans'; ?>" data-parsley-validate class="form-horizontal form-label-left">


                    <!-- disini bisa ditambah form group -->

                    <!-- <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Treeshold<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nilai F<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" name="">
                        </div>
                      </div> -->
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>



                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <?php include ('javascript.php'); ?>
  </body>
</html>