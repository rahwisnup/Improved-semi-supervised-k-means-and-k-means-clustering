<!DOCTYPE html>
<html lang="en">
    <head>

    </head>

    <body class="nav-md">
        <div>
            <div class="main_container">

                <!-- page content -->
                <div>
                    <div class="">
                        <div class="clearfix"></div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                            	<!-- proses 1 -->
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Checking</h2>
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
                                                    <th>NO</th>
                                                    <th>Cluster Dari Temp </th>
                                                    <th>Nilai Asli</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php foreach ($nilai as $key) {
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $key->no; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $key->cluster; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $key->kelas; ?>
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

    </body>
</html>