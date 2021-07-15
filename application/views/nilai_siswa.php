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
					<h6 class="m-0 font-weight-bold text-primary">Daftar Nilai</h6>
				</div>
				<!-- Card Body -->

				<div class="card-body">
					<table class="table table-bordered table-responsive-md table-striped" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th class="text-center">No</th>
								<th class="text-center">Kelas</th>
								<th class="text-center">Wali Kelas</th>
								<th class="text-center">Semester</th>
								<th class="text-center">Tahun Pelajaran</th>
								<th class="text-center ">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 0;

							if (isset($umum)) {
								foreach ($umum as $key => $u) {
									$i++;
							?>

									<tr>
										<td><?= $i; ?></td>
										<td class="text-center col-2"><?= $u->kelas; ?></td>
										<td class="text-center col-4"><?= $u->guru; ?></td>
										<td class="text-center col-2"><?= $u->semester; ?></td>
										<td class="text-center col-2"><?= $u->tahun; ?></td>
										<td class="text-center col-2">
											<a href="<?= base_url('siswa/lihat_nilai/') . $u->id; ?>" class="btn btn-primary">Lihat</a>
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


</div>
<!-- /.container-fluid -->
<div class=" modal fade" id="modalTambahDaftarNilai" tabindex="-1" aria-labelledby="modalTambahDaftarNilaiLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalTambahDaftarNilaiLabel">Tambah Daftar Nilai</h5>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<form action="<?= base_url('siswa/tambah_daftar_nilai'); ?>" method="POST">
				<div class="modal-body">
					<div class="mb-3">
						<div class="form-group">
							<div class="form-group">
								<label for="guru" class="col-form-label">Guru</label>
								<select class="form-control" name="guru" id="guru" required>
									<option value="">...</option>
									<?php foreach ($guru as $g) : ?>
										<option value="<?= $g->id ?>"><?= $g->nama ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
					</div>
					<div class="mb-3">
						<div class="form-group">
							<div class="form-group">
								<label for="semester" class="col-form-label">Semester</label>
								<select class="form-control" name="semester" id="semester" required>
									<option value="">...</option>
									<?php foreach ($semester as $s) : ?>
										<option value="<?= $s->id ?>"><?= $s->semester ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
					</div>
					<div class="mb-3">
						<div class="form-group">
							<div class="form-group">
								<label for="tahun" class="col-form-label">Tahun Pelajaran</label>
								<select class="form-control" name="tahun" id="tahun" required>
									<option value="">...</option>
									<?php foreach ($tahun as $t) : ?>
										<option value="<?= $t->id ?>"><?= $t->tahun ?></option>
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