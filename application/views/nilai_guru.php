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
					<div class="text-right mb-3">
						<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalTambahDaftarNilai">Tambah Daftar Nilai</button>
					</div>
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
											<a href="<?= base_url('guru/lihat_nilai/') . $u->id; ?>" class="btn btn-primary">Lihat</a>
											<a href="#" class="btn btn-danger" data-toggle="modal" data-target="#hapusModal<?= $u->id ?>">Hapus</a>
										</td>
									</tr>
									<div class="modal fade" id="hapusModal<?= $u->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
													<a class="btn btn-primary" href="<?= base_url('guru/hapus_daftar_nilai/') . $u->id; ?>">Hapus</a>
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
<div class=" modal fade" id="modalTambahDaftarNilai" tabindex="-1" aria-labelledby="modalTambahDaftarNilaiLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalTambahDaftarNilaiLabel">Tambah Daftar Nilai</h5>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<form action="<?= base_url('guru/tambah_daftar_nilai'); ?>" method="POST">
				<div class="modal-body">
					<input type="hidden" name="guru" value="<?= $guru; ?>">
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