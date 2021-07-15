<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="row">
		<!-- Earnings (Monthly) Card Example -->
		<div class="col-lg-3 mb-4">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
								Siswa</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $siswa; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-user-graduate fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-lg-3 mb-4">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
								Guru</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $guru; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Earnings (Monthly) Card Example -->
		<div class="col-lg-3 mb-4">
			<div class="card border-left-info shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Mata Pelajaran
							</div>
							<div class="row no-gutters align-items-center">
								<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $mapel; ?></div>
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Pending Requests Card Example -->
		<div class="col-lg-3 mb-4">
			<div class="card border-left-warning shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
								Kelas</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $kelas; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-home fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Content Row -->
</div>
<!-- /.container-fluid -->