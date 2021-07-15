<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">
	<?= $this->session->flashdata('message'); ?>

	<!-- Content Row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Input Nilai</h6>
				</div>
				<!-- Card Body -->
				<div class="card-body">
					<table class="table table-responsive-md table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th class="text-center">No</th>
								<th>Nama</th>
								<th>Kelas</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 0;

							if (isset($siswa)) {
								foreach ($siswa as $key => $s) {
									$i++;
							?>
									<tr>
										<td class="text-center"><?= $i ?></td>
										<td><?= $s->nama ?></td>
										<td><?= $s->kelas ?></td>
										<td>
											<div class="text-center">
												<div class="text-center">
													<a href="<?= base_url('guru/input_nilai/') . $daftar_nilai . '/' . $s->id; ?>" class="btn btn-sm btn-success">Input</a>
													<!-- <a href="<?= base_url('guru/hapus_siswa/') . $s->id; ?>" class="btn btn-sm btn-danger">Hapus</a> -->
												</div>
											</div>
										</td>
									</tr>
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

	<?php foreach ($dataSiswa as $siswa) : ?>
		<div class="modal fade" id="modalEditSiswa<?= $siswa->id ?>" tabindex="-1" aria-labelledby="modalEditSiswaLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="modalEditSiswaLabel">Edit Siswa</h5>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<form action="<?= base_url('guru/edit_siswa/' . $siswa->id); ?>" method="POST">
						<div class="modal-body">
							<div class="mb-3">
								<label for="nis-edit" class="form-label">NIS</label>
								<input type="number" name="nis-edit" class="form-control" value="<?= $siswa->nis ?>" id="nis-edit" required>
							</div>
							<div class="mb-3">
								<label for="nisn-edit" class="form-label">NISN</label>
								<input type="number" name="nisn-edit" class="form-control" value="<?= $siswa->nisn ?>" id="nisn-edit" required>
							</div>
							<div class="mb-3">
								<label for="nama-siswa-edit" class="form-label">Nama Lengkap</label>
								<input type="text" name="nama-siswa-edit" class="form-control" value="<?= $siswa->nama ?>" id="nama-siswa-edit" required>
							</div>
							<div class="mb-3">
								<label for="alamat-edit" class="form-label">Alamat</label>
								<input type="text" name="alamat-edit" class="form-control" value="<?= $siswa->alamat ?>" id="alamat-edit" required>
							</div>
							<div class="mb-3">
								<div class="form-group">
									<div class="form-group">
										<label for="kelas-edit" class="form-label">Kelas</label>
										<select class="form-control" name="kelas-edit" id="kelas-edit" required>
											<option value="">....</option>
											<?php foreach ($kelas as $kls) : ?>
												<option value="<?= $kls->id ?>"><?= $kls->kelas ?></option>
											<?php endforeach ?>
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
	<?php endforeach ?>
</div>
<!-- /.container-fluid -->