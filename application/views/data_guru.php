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
					<h6 class="m-0 font-weight-bold text-primary">Tambah Guru</h6>
				</div>
				<!-- Card Body -->
				<div class="card-body">
					<form action="<?= base_url('admin/tambah_guru'); ?>" method="POST">
						<div class="mb-3">
							<label for="np-guru" class="form-label">NIP</label>
							<input type="number" name="np-guru" class="form-control" id="np-guru" required>
						</div>
						<div class="mb-3">
							<label for="nama-guru" class="form-label">Nama Lengkap</label>
							<input type="text" name="nama-guru" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))' class="form-control" id="nama-guru" required>
						</div>
						<div class="mb-3">
							<div class="form-group">
								<div class="form-group">
									<label for="wali-kelas" class="form-label">Wali Kelas</label>
									<select class="form-control" name="wali-kelas" id="wali-kelas" required>
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
					<h6 class="m-0 font-weight-bold text-primary">Data Guru</h6>
				</div>
				<!-- Card Body -->
				<div class="card-body">
					<table class="table table-responsive-md table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th class="text-center">No</th>
								<th>Nama Guru</th>
								<th>Wali Kelas</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 0;

							if (isset($guru)) {
								foreach ($guru as $key => $g) {
									$i++;
							?>
									<tr>
										<td class="text-center"><?= $i ?></td>
										<td><?= $g->nama ?></td>
										<td><?= $g->wali ?></td>
										<td>
											<div class="text-center">
												<div class="text-center">
													<button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalEditGuru<?= $g->id ?>">Edit</button>
													<a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapusModal<?= $g->id ?>">Hapus</a>
												</div>
											</div>
										</td>
									</tr>
									<div class="modal fade" id="hapusModal<?= $g->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
													<a class="btn btn-primary" href="<?= base_url('admin/hapus_guru/') . $g->id; ?>">Hapus</a>
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
	<?php foreach ($dataGuru as $guru) : ?>
		<div class="modal fade" id="modalEditGuru<?= $guru->id; ?>" tabindex="-1" aria-labelledby="modalEditGuruLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="modalEditGuruLabel">Edit Guru</h5>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<form method="post" action="<?= base_url('admin/edit_guru/' . $guru->id); ?>">
						<div class=" modal-body">
							<div class="mb-3">
								<label for="np-guru-edit" class="col-form-label">NIP</label>
								<input type="number" class="form-control" name="np-guru-edit" value="<?= $guru->np; ?>" id="np-guru-edit" required>
							</div>
							<div class="mb-3">
								<label for="nama-guru" class="col-form-label">Nama Lengkap</label>
								<input type="text" class="form-control" name="nama-guru-edit" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))' value="<?= $guru->nama; ?>" id="nama-guru-edit" required>
							</div>
							<div class="mb-3">
								<div class="form-group">
									<div class="form-group">
										<label for="wali-kelas" class="col-form-label">Wali Kelas</label>
										<select class="form-control" name="wali-kelas-edit" id="wali-kelas-edit" required>
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