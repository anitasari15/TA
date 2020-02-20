<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Pinder</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login/css/main.css">
</head>
<body>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('<?php echo base_url(); ?>assets/login/images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form id="login" method="POST" class="login100-form validate-form">
					<span class="login100-form-title">Perbasi</span>
					<!-- <p class="text-center p-b-49"><a href="<?php //echo base_url(); ?>index.php/setup/">(IP Server: <?php // echo $this->session->userdata('ip_server'); ?>)</a></p>	 -->
					<div class="wrap-input100 m-b-23">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="user_email" required="required" autocomplete="off" placeholder="Email">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
					
					<div class="wrap-input100 m-b-23">
						<span class="label-input100">Kata Sandi</span>
						<input class="input100" type="password" name="user_password" required="required" autocomplete="off" placeholder="Kata Sandi">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					<!-- <div class="text-right p-t-8 p-b-31">
						<a href="#">Lupa kata sandi?</a>
					</div> -->
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<button type="submit" class="login100-form-btn" style="background-color: #222222;">Masuk</button>
						</div>
					</div>
					<div>

						<a href="<?php echo base_url(); ?>index.php/login/create" class="btn pull-right hidden-sm-down btn-success"> Daftar</a>

					</div>
					<!-- <div class="flex-col-c p-t-20">
						<a href="#">Daftar Sekarang</a>
					</div> -->
				</form>
			</div>
		</div>
	</div>
	<script src="<?php echo base_url(); ?>assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/login/vendor/animsition/js/animsition.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url(); ?>assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/login/vendor/select2/select2.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/login/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="<?php echo base_url(); ?>assets/login/vendor/countdowntime/countdowntime.js"></script>
	<script src="<?php echo base_url(); ?>assets/login/js/main.js"></script>
	<script>
		$(document).ready(function() {
			$('#login').on('submit', (function(e) {
				e.preventDefault();

				$.ajax({
                    method: 'POST',
                    url: 'http://localhost:81/pinder/index.php/login/do_login',
                    data: new FormData(this),
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(res) {
						if(res.status == 200) {
                           	document.location.href = 'http://localhost:81/pinder/index.php/dashboard/player';
                       	} else {
							alert(res.message);
						}
                    }
                })
			}))
		})
	</script>
</body>
</html>