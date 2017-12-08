<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Infokost.com</title>
    <?php include('linkcss.php'); ?>
    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/jf/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/jf/css/font-awesome.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/jf/css/bootstrap-select.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/jf/css/fileinput.css'); ?>" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/jf/images/favicon.png'); ?>">
</head>

<body class="metro" style="background-color: #efeae3">

    <div class="container" style="padding-left: 15px;padding-right: 15px;">

<!--ini buat header -->
   
    <div class="grid">
        <!-- taroh di sini isinya -->
        <div class="row text-center">

 <div class="row">
      
        	<div class="span12 offset1 bg-white shadow" style="padding-bottom: 10px;">
        	<?php echo $this->session->flashdata('success'); ?>
				<form  method="POST" action="<?php echo base_url("controller_pengguna/register/");?>" enctype="multipart/form-data">
					<h2 class="bg-green fg-white" style="margin-top: 0px; padding-bottom: 5px;">Form Daftar</h2>

					<div class="row" style="padding-left: 20px; padding-right: 20px;">
						<div class="span2 offset2">
							<h4 class="text-left">Nama</h4>
						</div>
						<div class="input-control text span6">
							<input type="text" value="" name="nama" />
							<button class="btn-clear"></button>
						</div>
					</div>

					<div class="row" style="padding-left: 20px; padding-right: 20px;">
						<div class="span2 offset2">
							<h4 class="text-left">Username</h4>
						</div>
						<div class="input-control text span6">
							<input type="text" value="" name="username" />
							<button class="btn-clear"></button>
						</div>
					</div>
					<div class="row" style="padding-left: 20px; padding-right: 20px;">
						<div class="span2 offset2">
							<h4 class="text-left">E-mail</h4>
						</div>
						<div class="input-control text span6">
							<input type="text" value="" name="email" />
							<button class="btn-clear"></button>
						</div>
					</div>

					<div class="row" style="padding-left: 20px; padding-right: 20px;">
						<div class="span2 offset2">
							<h4 class="text-left">Password</h4>
						</div>
						<div class="input-control password span6">
							<input type="password" value="" name="password" />
							<button class="btn-reveal"></button>
						</div>
					</div>

					<div class="row" style="padding-left: 20px; padding-right: 20px;">
						<div class="span2 offset2">
							<h4 class="text-left" style="margin-top: 0px;">Verifikasi Password</h4>
						</div>
						<div class="input-control password span6">
							<input type="password" value="" name="repassword" />
							<button class="btn-reveal"></button>
						</div>
					</div>

					<div class="row" style="padding-left: 20px; padding-right: 20px;">
						<div class="span2 offset2">
							<h4 class="text-left">Alamat</h4>
						</div>
						<div class="input-control text span6">
							<input type="text" value="" name="alamat" />
							<button class="btn-clear"></button>
						</div>
					</div>

					<div class="row" style="padding-left: 20px; padding-right: 20px;">
						<div class="span2 offset2">
							<h4 class="text-left">No. HP</h4>
						</div>
						<div class="input-control text span6">
							<input type="text" value="" name="nohp" />
							<button class="btn-clear"></button>
						</div>
					</div>
					<div class="row" style="padding-left: 20px; padding-right: 20px;">
						<div class="span2 offset2">
						</div>
						<div class="span3">
					<p><strong>[Maksimal ukuran foto: 500kb]</strong></p>
                	<input id="file-3" type="file" name="foto" class="form-control" accept="image/*" multiple=false required>
                	</div>
					</div>
					<div class="row span2 offset8" style="margin-top: 20px;">
						<button class="large bg-green fg-white">Buat Akun</button>
					</div>
				</div>
				</form>
			</div>
		</div>
    </div>
 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url('assets/jf/js/jquery.min.js'); ?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url('assets/jf/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/jf/js/bootstrap-select.js'); ?>"></script>
    <script src="<?php echo base_url('assets/jf/js/fileinput.js'); ?>"></script>
    <script type="text/javascript">
        $(window).on('load', function () {

            $('.selectpicker').selectpicker({
                'selectedText': 'cat'
            });

            // $('.selectpicker').selectpicker('hide');
        });
    </script>
    <script type="text/javascript">
        $("#file-3").fileinput({
        browseLabel: "Cari Foto",
        showUpload: false,
        showCaption: false,
        maxFileSize: 500,
        browseClass: "btn btn-primary",
                msgSizeTooLarge: 'Foto "{name}" (<b>{size} KB</b>) melebihi batas maksium ukuran file <b>{maxSize} KB</b>. Silahkan ganti foto anda !',
       
    });
    </script>
</body>
</html>



