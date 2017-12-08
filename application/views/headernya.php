    <header class="main-header">
        
    
        <nav class="navbar navbar-static-top">

            <div class="navbar-top">

              <div class="container">
                  <div class="row">

                    <div class="col-sm-6 col-xs-12">

                        <ul class="list-unstyled list-inline header-contact">
                            <li> <i class="fa fa-phone"></i> <a href="tel:">+0361575824</a> </li>
                             <li> <i class="fa fa-envelope"></i> <a href="test.org">pureaa@ub.ac.id/pureaaub@gmail.com</a> </li>
                       </ul> <!-- /.header-contact  -->
                      
                    </div>

                    <div class="col-sm-6 col-xs-12 text-right">

                        <ul class="list-unstyled list-inline header-social">

                            <li> <a href="#"> <i class="fa fa-facebook"></i> </a> </li>
                            <li> <a href="#"> <i class="fa fa-twitter"></i>  </a> </li>
                            <li> <a href="#"> <i class="fa fa-google"></i>  </a> </li>
                            <li> <a href="#"> <i class="fa fa-youtube"></i>  </a> </li>
                            <li> <a href="#"> <i class="fa fa fa-pinterest-p"></i>  </a> </li>
                       </ul> <!-- /.header-social  -->
                      
                    </div>


                  </div>
              </div>

            </div>

            <div class="navbar-main">
              
              <div class="container">

                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">

                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>

                  </button>
                </div>

                <div id="navbar" class="navbar-collapse collapse pull-right">

                  <ul class="nav navbar-nav">

                    <li><a class="is-active" href=base_url("controller_pengguna")>HOME</a></li> 
                    <li>
                        <?php 
                      $monitoring = base_url("controller_pengguna/monitoring");
                      echo "<a href=\" $monitoring \"></span><span>MONITORING</a><li>";
                      $monitoring = base_url("controller_pengguna/reportLokasi");
                      echo "<a href=\" $monitoring \"></span><span>REPORT</a><li>";
                      $logout = base_url("controller_pengguna/logout");
                      $login = base_url("controller_pengguna/login");
                      if($tombol == true){
                           echo "<a href=\" $logout \"></span><span> LOGOUT</a>";
                        } 
                        else 
                        {
                            echo "<a href=\" $login \"></span><span> LOGIN</a>";
                        }
                      ?>
                  </ul>

                </div> <!-- /#navbar -->

                <!-- div untuk logonya tak kosongi dlu-->
                <!-- <div id="navbar" class="navbar-collapse collapse pull-left">

                  <ul class="nav navbar-nav">
                    <li><img src="assetsSadaka/images/sponsors/bus.png" alt=""></li>
                  </ul>
                </div> <!-- /#logonya -->

              </div> <!-- /.container -->
              
            </div> <!-- /.navbar-main -->


        </nav> 

    </header> <!-- /. main-header -->