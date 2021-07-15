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

<body>
	<!-- Responsive navbar-->
	<!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container">
			<a class="navbar-brand" href="#!">SI-AKAD</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
					<li class="nav-item"><a class="nav-link" href="#">Home</a></li>
					<li class="nav-item"><a class="nav-link" href="#!">About</a></li>
					<li class="nav-item"><a class="nav-link" href="#!">Contact</a></li>
					<li class="nav-item"><a class="nav-link" href="#">Masuk</a></li>
				</ul>
			</div>
		</div>
	</nav> -->
	<!-- Page header with logo and tagline-->
	<header class="py-5 bg-primary border-bottom mb-4 text-light">
		<div class="container">
			<div class="text-center my-5">
				<!-- Search widget-->
				<div class="mb-4">
					<div class="card-body">
						<figure class="mb-4"><img class="img-fluid rounded" src="<?= base_url('vendor/sb-admin/img/logo-dark.png') ?>" alt="..." /></figure>
					</div>
				</div>
				<h1 class="fw-bolder">Selamat Datang!</h1>
				<p class="lead mb-3">Selamat Datang diwebsite Sistem Akademik SMA PGRI 1 Taman. Dengan adanya website siakad ini, diharapkan menjadi sarana interaksi yang positif baik antar guru maupun siswa.</p>
				<a class="btn btn-lg btn-secondary" href="<?= base_url('auth'); ?>">Masuk →</a>
			</div>
		</div>
	</header>
	<!-- Page content-->
	<div class="container">
		<div class="row">
			<!-- Blog entries-->
			<div class="col-lg-8">
				<!-- Featured blog post-->
				<div class="card mb-4">
					<div class="card-body">
						<figure class="mb-4"><img class="img-fluid rounded" src="<?= base_url('vendor/sb-admin/img/berita1.jpg') ?>" alt="..." /></figure>
						<div class="small text-muted">04 Juni 2021</div>
						<h2 class="card-title">Kegiatan KSN-K Daring SMA PGRI 1 Taman</h2>
						<p class="card-text">4-5 Juni 2021, SMA PGRI 1 Taman mengikuti kegiatan KSN-K secara daring yang di laksanakan oleh Pusmenjar. Dimana kegiatan ini agenda tahunan sebagai bentuk pencapaian prestasi bagi pelajar khususnya SMA.
						<p>Dalam pelaksanaannya SMA PGRI 1 Taman mengirimkan peserta sejumlah 20 peserta. Yang mana peserta mewakili beberapa mata pelajaran seperti Informatika, Biologi, Fisika, Kimia, Ekonomi, Kebumian, Geografi dan pelajaran lainnya. Serta dalam pelaksanaannya dilakukan pengawasan silang dari sekolah lain. </p>
						</p>
					</div>
				</div>
			</div>
			<!-- Side widgets-->
			<div class="col-lg-4">
				<!-- Side widget-->
				<div class="card mb-4">
					<div class="card-header">Tentang</div>
					<div class="card-body">
						<h6 class="card-text">Alhamdulillahi robbil alamin kami panjatkan kehadlirat Allah SWT, bahwasannya dengan rahmat dan karunia-Nya lah akhirnya Website sekolah ini dengan alamat <strong>siakadspegesta-poltek.my.id</strong> dapat kami perbaharui. Kami mengucapkan selamat datang di Website kami Sekolah Menengah Atas (SMA) PGRI 1 Taman Pemalang yang saya tujukan untuk seluruh unsur pimpinan, guru, karyawan dan siswa serta khalayak umum guna dapat mengakses seluruh informasi tentang segala profil, aktifitas/kegiatan serta fasilitas sekolah kami.</h6>
					</div>
				</div>
				<!-- Side widget-->
				<div class="card mb-4">
					<div class="card-header">Kontak</div>
					<div class="card-body">
						<div class="row">
							<div class="col-3">
								<h6><strong>Alamat</strong></h6>
							</div>
							<div class="col-9">
								<h6>: Jl. Dr. Wahidin Sudirohusodo Taman Pemalang Jawa Tengah 52361</h6>
							</div>
						</div>
						<div class="row">
							<div class="col-3">
								<h6><strong>Email</strong></h6>
							</div>
							<div class="col-9">
								<h6>: spegesta@ymail.com</h6>
							</div>
						</div>
						<div class="row">
							<div class="col-3">
								<h6><strong>Phone</strong></h6>
							</div>
							<div class="col-9">
								<h6>: (0284) 323259</h6>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Blog entries-->
			<div class="col-lg-8">
				<div class="card mb-4">
					<div class="card-body">
						<figure class="mb-4"><img class="img-fluid rounded" src="<?= base_url('vendor/sb-admin/img/berita1.jpg') ?>" alt="..." /></figure>
						<div class="small text-muted">04 Juni 2021</div>
						<h2 class="card-title">PELATIHAN OFFICE 365 BAGI GURU DAN SISWA</h2>
						<!-- Post content-->
						<section class="mb-5">
							<p class="fs-5 mb-4">Di masa pandemi seperti saat ini dunia Pendidikan harus tetap berjalan, dengan mengurangi tatap muka antisipasi penularan virus kegiatan Belajar Mengajar harus tetap dilaksanakan, meskipun banyak aplikasi yang dapat digunakan untuk menunjang PJJ atau belajar jarak jauh. hadir ditengah-tengah kita Office 365, Office 365 adalah aplikasi perangkat lunak buatan microsoft yang didesain untuk meningkatkan kinerja anda atau perusahaan anda dalam dunia pendidikan adalah sekolah. aplikasi ini bisa di intall pada sistem operasi microsoft windows dan mac OS. Salah satu layanan yang sering kita gunakan adalan microsoft word, excel, dan powerpoint.</p>
							<p class="fs-5 mb-4">Saat ini SMA PGRI 1 Taman memberikan layanan terbaiknya dengan membekali guru-guru dan siswa untuk mengikuti pelatihan Office 365 dengan harapan aplikasi tersebut dapat menunjang dalam pembelajaran di tengah pandemi ini. Pelatihan ini di trainer oleh A. Ira Nugrohoningsih dan dibantu trainer lokal sekolah ( Guru TIK ) Bpk Agus Riyanto dan Bpk Slamet Kusworo.</p>
						</section>
						<p class="card-text">Saat ini SMA PGRI 1 Taman memberikan layanan terbaiknya dengan membekali guru-guru dan siswa untuk mengikuti pelatihan Office 365 dengan harapan aplikasi tersebut dapat menunjang dalam pembelajaran di tengah pandemi ini. Pelatihan ini di trainer oleh A. Ira Nugrohoningsih dan dibantu trainer lokal sekolah ( Guru TIK ) Bpk Agus Riyanto dan Bpk Slamet Kusworo.</p>
					</div>
				</div>
				<!-- Nested row for non-featured blog posts-->
			</div>
		</div>
	</div>
	<!-- Footer-->
	<footer class="py-5 bg-dark">
		<div class="container">
			<p class="m-0 text-center text-white">Copyright &copy; Sistem Akademik 2021</p>
		</div>
	</footer>
	<!-- Footer-->
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