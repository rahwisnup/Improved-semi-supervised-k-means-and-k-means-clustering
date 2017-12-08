<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Infokost.com</title>
    <?php include('linkcss.php'); ?>
</head>

<body class="metro" style="background-color: #efeae3">
    <header class="bg-blue"><?php include("header.php") ?></header>

    <div class="container" style="padding-left: 15px;padding-right: 15px;">

<!--ini buat header -->
    <div class="grid">
        <div class="row" style="margin-top: 0px;">
            <div class="span6">
                <h1 class="fg-blue" style="margin-left: 30px;">Infokost_Malang<small>.com</small></h1>
            </div>
        </div>
    </div>

    <div class="grid">
        <!-- taroh di sini isinya -->
        <div class="row bg-white shadow" style="margin-top: 0px; padding-top:0px;" >
        	<div class="span4">
        		<div class="row" style="margin-top: 0px; padding-top:0px;">
		        	<div class="span4 image-container" style="padding-top: 10px; padding-left: 10px; padding-right: 10px; padding-bottom: 10px;">
						<img src="<?php echo base_url("")?>foto_user/<?php echo $foto ?>">
					</div>
				</div>
        <!-- <div class="row bg-white shadow">
        	<div class="span4">
        		<div class="row bg-dark" style="margin-top: 0px;">
		        	<div class="span4 image-container">
						<img src="<?php echo base_url("")?>foto_user/<?php echo $foto ?>">
					</div>
				</div>
 -->
				<div class="row" style="margin-top: 0px; padding-top:0px;">
					<nav class="sidebar light" style="margin-left: 0px;">
						<ul>
							<li class="title"><center><strong><?php echo $username ;?></strong></center></li>
					        <li class="active"><a href="<?php echo base_url('controller_member/');?>"><i class="icon-newspaper"></i>Iklan</a></li>
					        <li ><a href="<?php echo base_url('controller_member/lihat_profil/');?>"><i class="icon-user-2"></i>Akun Profil</a></li>
						</ul>
					</nav>
				</div>
			</div>

			<div class="span9" style="margin-top: 10px; margin-right: 20px; margin-bottom: 5px; margin-left: 20px;">
				<div class="row" style="margin-top: 10px; padding-top:0px">
					<div class="tile bg-amber">
					<a href="<?php echo base_url('controller_member/pasang_kost');?>">
						<div class="tile-content icon">
							<i class="icon-plus-2"></i>
				        </div>
				        <div class="tile-status">
				        	<span class="name">Tambah Iklan</span>
				        </div></a>
				    </div>
				</div>

				<div class="row" style="margin-top: 0px;"><h2><?php echo $this->session->flashdata('success'); ?></h2><div><?php include("iklan.php") ?></div></div>
			</div>
		</div>
    </div>

</body>
</html>



