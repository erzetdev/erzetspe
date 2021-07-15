<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="id">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title><?= $title ?></title>
	<link rel="shorcut icon" href="http://www.smapgri1tamanpemalang.sch.id/theme/images/icon.png">
	<!-- Custom fonts for this template-->
	<link href="<?= base_url('vendor/sb-admin/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="<?= base_url('vendor/sb-admin/') ?>css/sb-admin-2.min.css" rel="stylesheet">
	<link href="<?= base_url('vendor/sb-admin/') ?>css/style.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
	<div class="container">
		<!-- Outer Row -->
		<div class="row justify-content-center">
			<div class="col-md-5">
				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<div class="row justify-content-center">
							<div class="col-lg-12">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1>
									</div>
									<div class="mb-4 text-center">
										<img src="<?= base_url('vendor/sb-admin/img/') . $sekolah['logo'] ?>" alt="Logo Sekolah" class="school-img">
									</div>
									<form class="user" action="<?= base_url('auth/login'); ?>" method="POST">
										<?= $this->session->flashdata('message'); ?>
										<div class="form-group">
											<input type="text" class="form-control form-control-user" name="username" id="inputUserName" aria-describedby="emailHelp" placeholder="Username" required>
										</div>
										<div class="form-group">
											<input type="password" class="form-control form-control-user" name="password" id="inputPassword" placeholder="Password" required>
										</div>
										<button type="submit" class="btn btn-primary btn-user btn-block">
											Login
										</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Bootstrap core JavaScript-->
	<script src="<?= base_url('vendor/sb-admin/') ?>vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url('vendor/sb-admin/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?= base_url('vendor/sb-admin/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="<?= base_url('vendor/sb-admin/') ?>js/sb-admin-2.min.js"></script>

	<!-- Page level plugins -->
	<script src="<?= base_url('vendor/sb-admin/') ?>vendor/chart.js/Chart.min.js"></script>

	<!-- Page level custom scripts -->
	<script src="<?= base_url('vendor/sb-admin/') ?>js/demo/chart-area-demo.js"></script>
	<script src="<?= base_url('vendor/sb-admin/') ?>js/demo/chart-pie-demo.js"></script>


</body>

</html>