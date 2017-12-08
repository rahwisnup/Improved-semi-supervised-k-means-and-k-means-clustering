<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('css.php'); ?>
    </head>

    <body class="nav-md">
        <div>
            <div class="main_container">

                <!-- page content -->
                <div>
                    <div class="">
                        <div class="page-title">
                            <div class="title_left">
                                <h3>Improved Semi Supervised K-Means Clustering</h3>
                            </div>
                        </div>

                        <div class="clearfix"></div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            	<!-- proses 1 -->
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Data KL</h2>
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
                                                <?php foreach ($dataKL as $key) {
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $key->No; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $key->AHH; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $key->EYS; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $key->MYS; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $key->Pengeluaran; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $key->Kelas; ?>
                                                        </td>
                                                    </tr>
                                                <?php } ?> 
                                            </tbody>
                                        </table>

                                    </div>
                                </div>

                                <!-- proses 2 -->
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Data Initial Cluster Center</h2>
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
                                                <?php foreach ($dataInitialCenter as $key) {
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $key->No; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $key->AHH; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $key->EYS; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $key->MYS; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $key->Pengeluaran; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $key->Kelas; ?>
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
            </div>
        </div>

        <?php include ('javascript.php'); ?>
    </body>
</html>