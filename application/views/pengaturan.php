<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">
	<?= $this->session->flashdata('message'); ?>
	<!-- Content Row -->
	<div class="row">
		<div class="col-lg-4 ">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Data Sekolah</h6>
				</div>
				<!-- Card Body -->
				<form action="<?= base_url('admin/edit_sekolah'); ?>" method="post">
					<div class="card-body">
						<div class="mb-3">
							<label for="np-kepsek" class="form-label">NIP Kepala Sekolah</label>
							<input type="number" class="form-control" name="np-kepsek" id="np-kepsek" value="<?= $sekolah['np']; ?>" placeholder="123xxxx" required>
						</div>
						<div class="mb-3">
							<label for="kepsek" class="form-label">Kepala Sekolah</label>
							<input type="text" class="form-control" name="kepsek" id="kepsek" value="<?= $sekolah['kepsek']; ?>" placeholder="" required>
						</div>
						<div class="mb-3">
							<label for="namaSekolah" class="form-label">Nama</label>
							<input type="text" class="form-control" name="namaSekolah" id="namaSekolah" value="<?= $sekolah['nama']; ?>" placeholder="SMA NEGERI 1 TEGAL" required>
						</div>
						<div class="mb-3">
							<label for="noTeleponSekolah" class="form-label">No Telepon</label>
							<input type="text" class="form-control" name="noTeleponSekolah" id="noTeleponSekolah" value="<?= $sekolah['telepon']; ?>" placeholder="0823xxxxx" required>
						</div>
						<div class="mb-3">
							<label for="emailSekolah" class="form-label">Email</label>
							<input type="email" class="form-control" name="emailSekolah" id="emailSekolah" value="<?= $sekolah['email']; ?>" placeholder="sman1tegal@gmail.com" required>
						</div>
						<div class="mb-3">
							<label for="alamatSekolah" class="form-label">Alamat</label>
							<input class="form-control" name="alamatSekolah" id="alamatSekolah" value="<?= $sekolah['alamat']; ?>" required>
						</div>
						<div class="text-right">
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					</div>
				</form>
			</div>
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Upload Logo Sekolah</h6>
				</div>
				<!-- Card Body -->
				<div class="card-body">
					<form action="<?= base_url('admin/upload/'); ?>" method="post" enctype="multipart/form-data">
						<div class="mb-3 text-center">
							<img src="<?= base_url('vendor/sb-admin/img/') . $sekolah['logo'] ?>" alt="Logo Sekolah" class="school-img">
						</div>
						<div class="mb-3">
							<input class="form-control" name="userfile" type="file" id="userfile" required>
						</div>
						<div class="text-right">
							<button type="submit" class="btn btn-primary">Upload</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-lg-8">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Data Kelas</h6>
					<button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalTambahKelas">Tambah Kelas</button>
				</div>
				<!-- Card Body -->
				<div class="card-body">
					<!-- <div class="mb-3 text-right"> -->
					<!-- <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalTambahKelas">Tambah Kelas</button> -->
					<!-- </div> -->
					<table class="table  table-responsive-md table-bordered table-hover" id="dataTableKelas" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th class="text-center">No</th>
								<th>Kelas</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<?php
						$i = 0;

						if (isset($kelas)) {
							foreach ($kelas as $key => $kls) {
								$i++;
						?>
								<tr>
									<td class="text-center"><?= $i ?></td>
									<td><?= $kls->kelas ?></td>
									<td>
										<div class="text-center">
											<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapusModalKls<?= $kls->id ?>">Hapus</a>
										</div>
									</td>
								</tr>

								<div class="modal fade" id="hapusModalKls<?= $kls->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title text-danger" id="exampleModalLabel">Peringatan!</h5>
												<button class="close" type="button" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">×</span>
												</button>
											</div>
											<div class="modal-body">Data akan dihapus permanen?</div>
											<div class="modal-footer">
												<button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
												<a class="btn btn-primary" href="<?= base_url('admin/hapus_kelas/') . $kls->id; ?>">Hapus</a>
											</div>
										</div>
									</div>
								</div>
						<?php

							}
						}
						?>

					</table>
				</div>
			</div>
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Data Mapel</h6>
					<button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalTambahMapel">Tambah Mapel</button>
				</div>
				<!-- Card Body -->
				<div class="card-body">
					<!-- <div class="mb-3 text-right"> -->
					<!-- <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalTambahMapel">Tambah Mapel</button> -->
					<!-- </div> -->
					<table class="table table-bordered table-responsive-md table-hover" id="dataTableMapel" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th class="text-center">No</th>
								<th>Kelas</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 0;

							if (isset($mapel)) {
								foreach ($mapel as $key => $mpl) {
									$i++;
							?>
									<tr>
										<td class="text-center"><?= $i ?></td>
										<td><?= $mpl->mapel . " (" . $mpl->kelompok . ")" ?></td>
										<td>
											<div class="text-center">
												<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapusModal<?= $mpl->id ?>">Hapus</a>
											</div>
										</td>
									</tr>
									<div class="modal fade" id="hapusModal<?= $mpl->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title text-danger" id="exampleModalLabel">Peringatan!</h5>
													<button class="close" type="button" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">×</span>
													</button>
												</div>
												<div class="modal-body">Data akan dihapus permanen?</div>
												<div class="modal-footer">
													<button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
													<a class="btn btn-primary" href="<?= base_url('admin/hapus_mapel/') . $mpl->id; ?>">Hapus</a>
												</div>
											</div>
										</div>
									</div>
							<?php

								}
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- Content Row -->

	<div class="modal fade" id="modalTambahKelas" tabindex="-1" aria-labelledby="modalTambahKelasLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalTambahKelasLabel">Tambah Kelas</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<form action="<?= base_url('admin/tambah_kelas'); ?>" method="POST">
					<div class="modal-body">
						<div class="mb-3">
							<label for="nama-kelas" class="col-form-label">Nama Kelas</label>
							<input type="text" class="form-control" name="nama-kelas" id="nama-kelas" placeholder="MIPA" required>
						</div>
						<div class="mb-3">
							<div class="form-group">
								<div class="form-group">
									<label for="tingkat" class="col-form-label">Tingkat</label>
									<select class="form-control" name="tingkat" id="tingkat" required>
										<option value="">...</option>
										<option value="X">X</option>
										<option value="XI">XI</option>
										<option value="XII">XII</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modalTambahMapel" tabindex="-1" aria-labelledby="modalTambahMapelLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalTambahMapelLabel">Tambah Mapel</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<form action="<?= base_url('admin/tambah_mapel'); ?>" method="POST">
					<div class="modal-body">
						<div class="mb-3">
							<label for="nama-mapel" class="col-form-label">Nama Mapel</label>
							<input type="text" class="form-control" name="nama-mapel" id="nama-mapel" placeholder="Matematika" required>
						</div>
						<div class="mb-3">
							<div class="form-group">
								<div class="form-group">
									<label for="kelompok" class="col-form-label">Kelompok</label>
									<select class="form-control" name="kelompok" id="kelompok" required>
										<option value="">...</option>
										<option value="A">Kelompok A (Umum)</option>
										<option value="B">Kelompok B (Umum)</option>
										<option value="C">Kelompok C (Peminatan)</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /.container-fluid -->