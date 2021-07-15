<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">
	<?= $this->session->flashdata('message'); ?>

	<!-- Content Row -->
	<div class="row">
		<div class="col-lg-4">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Tambah Siswa</h6>
				</div>
				<!-- Card Body -->
				<div class="card-body">
					<form action="<?= base_url('admin/tambah_siswa'); ?>" method="POST">
						<div class="mb-3">
							<label for="nis" class="form-label">NIS</label>
							<input type="number" name="nis" class="form-control" id="nis" placeholder="123xx" required>
						</div>
						<div class="mb-3">
							<label for="nisn" class="form-label">NISN</label>
							<input type="number" name="nisn" class="form-control" id="nisn" placeholder="Isikan angka 0, jika tidak ada NISN" required>
						</div>
						<div class="mb-3">
							<label for="nama-siswa" class="form-label">Nama Lengkap</label>
							<input type="text" name="nama-siswa" class="form-control" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))' id="nama-siswa" placeholder="Nama Lengkap" required>
						</div>
						<div class="mb-3">
							<label for="alamat-siswa" class="form-label">Alamat</label>
							<input type="text" name="alamat-siswa" class="form-control" id="alamat-siswa" placeholder="Alamat" required>
						</div>
						<div class="mb-3">
							<div class="form-group">
								<div class="form-group">
									<label for="kelas" class="form-label">Kelas</label>
									<select class="form-control" name="kelas" id="kelas" required>
										<option value="">....</option>
										<?php foreach ($kelas as $kls) : ?>
											<option value="<?= $kls->id ?>"><?= $kls->kelas ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
						</div>
						<div class="text-right">
							<button type="submit" class="btn btn-primary">Buat</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-lg-8">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Kelas</h6>
				</div>
				<!-- Card Body -->
				<div class="card-body">
					<table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
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

							if (isset($kelas)) {
								foreach ($kelas as $key => $s) {
									$i++;
							?>
									<tr>
										<td class="text-center"><?= $i ?></td>
										<td><?= $s->kelas ?></td>
										<td>
											<div class="text-center">
												<div class="text-center">
													<a href="<?= base_url('admin/data_siswa/') . $s->id ?>" class="btn btn-sm btn-primary">Lihat</a>
												</div>
											</div>
										</td>
									</tr>

									<div class="modal fade" id="hapusModal<?= $s->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
													<a class="btn btn-primary" href="<?= base_url('admin/hapus_siswa/') . $s->id; ?>">Hapus</a>
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
</div>
<!-- /.container-fluid -->