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
				<div class="card-body">
					<div class="text-right mb-3">
						<a href="<?= base_url('admin/cetak_nilai/') . $daftar_nilai['id'] . '/' . $siswa['id']; ?>" class="btn btn-success">Cetak Nilai</a>
					</div>
					<!-- Editable table -->
					<table class="table table-responsive-md">
						<thead>
						<tbody>
							<tr>
								<td class="col-2">Nama Sekolah</td>
								<td class="col-6">: <?= $sekolah['nama']; ?></td>
								<td class="col-2">Kelas</td>
								<td class="col-2">: <?= $daftar_nilai['kelas']; ?></td>
							</tr>
							<tr>
								<td class="col-2">Alamat</td>
								<td class="col-6">: <?= $sekolah['alamat']; ?></td>
								<td class="col-2">Semester</td>
								<td class="col-2">: <?= $daftar_nilai['semester']; ?></td>
							</tr>
							<tr>
								<td class="col-2">Nama</td>
								<td class="col-6">: <strong><?= $siswa['nama']; ?></strong></td>
								<td class="col-2">Tahun Pelajaran</td>
								<td class="col-2">: <?= $daftar_nilai['tahun']; ?></td>
							</tr>
							<tr>
								<td class="col-2">NIS/NISN</td>
								<td class="col-6">: <?= $siswa['nis']; ?>/<?= $siswa['nisn']; ?></td>
								<td class="col-2">Wali Kelas</td>
								<td class="col-2">: <strong><?= $guru['nama']; ?></strong></td>
							</tr>
						</tbody>
					</table>
					<!-- Editable table -->
				</div>
			</div>

		</div>
	</div>
	<!-- Content Row -->
	<!-- Content Row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">A. Sikap</h6>
				</div>
				<!-- Card Body -->

				<div class="card-body">
					<form action="<?= base_url('admin/input_sikap/'); ?>" method="POST">
						<input type="hidden" value="<?= $siswa['id']; ?>" name="siswa">
						<input type="hidden" value="<?= $daftar_nilai['id']; ?>" name="daftar_nilai">
						<h6 class="mb-3 text-dark">1. Sikap Spiritual</h6>
						<div class="row">
							<div class="col-2">
								<div class="mb-3">
									<label class="form-label text-primary">Predikat</label>
									<select name="spiritual_predikat" class="form-control" required>
										<option value="">...</option>
										<option value="A" <?= set_select('spiritual_predikat', 'A', (isset($sikap['spiritual_predikat']) && $sikap['spiritual_predikat'] == "A" ? TRUE : FALSE)); ?>>A</option>
										<option value="B" <?= set_select('spiritual_predikat', 'B', (isset($sikap['spiritual_predikat']) && $sikap['spiritual_predikat'] == "B" ? TRUE : FALSE)); ?>>B</option>
										<option value="C" <?= set_select('spiritual_predikat', 'C', (isset($sikap['spiritual_predikat']) && $sikap['spiritual_predikat'] == "C" ? TRUE : FALSE)); ?>>C</option>
										<option value="D" <?= set_select('spiritual_predikat', 'D', (isset($sikap['spiritual_predikat']) && $sikap['spiritual_predikat'] == "D" ? TRUE : FALSE)); ?>>D</option>
										<option value="E" <?= set_select('spiritual_predikat', 'E', (isset($sikap['spiritual_predikat']) && $sikap['spiritual_predikat'] == "E" ? TRUE : FALSE)); ?>>E</option>
									</select>
								</div>
							</div>
							<div class="col-10">
								<div class="mb-3">
									<label for="spiritual_des" class="form-label text-primary">Deskripsi</label>
									<textarea class="form-control" name="spiritual_des" rows="2"><?= $sikap['spiritual_des']; ?></textarea>
								</div>
							</div>
						</div>
						<hr>
						<h6 class="mb-3 text-dark">2. Sikap Sosial</h6>
						<div class="row">
							<div class="col-2">
								<div class="mb-3">
									<label class="form-label text-primary">Predikat</label>
									<select name="sosial_predikat" class="form-control" required>
										<option value="">...</option>
										<option value="A" <?= set_select('sosial_predikat', 'A', (isset($sikap['sosial_predikat']) && $sikap['sosial_predikat'] == "A" ? TRUE : FALSE)); ?>>A</option>
										<option value="B" <?= set_select('sosial_predikat', 'B', (isset($sikap['sosial_predikat']) && $sikap['sosial_predikat']  == "B" ? TRUE : FALSE)); ?>>B</option>
										<option value="C" <?= set_select('sosial_predikat', 'C', (isset($sikap['sosial_predikat']) && $sikap['sosial_predikat']  == "C" ? TRUE : FALSE)); ?>>C</option>
										<option value="D" <?= set_select('sosial_predikat', 'D', (isset($sikap['sosial_predikat']) && $sikap['sosial_predikat']  == "D" ? TRUE : FALSE)); ?>>D</option>
										<option value="E" <?= set_select('sosial_predikat', 'E', (isset($sikap['sosial_predikat']) && $sikap['sosial_predikat']  == "E" ? TRUE : FALSE)); ?>>E</option>
									</select>
								</div>
							</div>
							<div class="col-10">
								<div class="mb-3">
									<label for="sosial_des" class="form-label text-primary">Deskripsi</label>
									<textarea class="form-control" name="sosial_des" rows="2"><?= $sikap['sosial_des']; ?></textarea>
								</div>
							</div>
						</div>
						<div class="text-right mb-3">
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>
	<!-- Content Row -->
	<!-- Content Row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">B. Pengetahuan</h6>
				</div>
				<!-- Card Body -->
				<form action="<?= base_url('admin/simpan_pengetahuan/'); ?>" method="POST">
					<input type="hidden" value="<?= $siswa['id']; ?>" name="siswa">
					<input type="hidden" value="<?= $daftar_nilai['id']; ?>" name="daftar_nilai">
					<div class="card-body">
						<label class="mb-3 label">Kriteria Ketuntasan Minimal = 65</label>
						<h6 class="mb-3 font-weight-bold text-dark">Kelompok A (Umum)</h6>

						<!-- Editable table -->
						<div id="table" class="table-editable">
							<table class="table table-bordered table-responsive-md table-striped">
								<thead>
									<tr>
										<th class="text-center">No</th>
										<th>Mata Pelajaran</th>
										<th class="text-center">Nilai</th>
										<th class="text-center">Predikat</th>
										<th>Deskripsi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i = 0;

									if (isset($pengetahuanA)) {
										foreach ($pengetahuanA as $key => $A) {
											$i++;
									?>

											<tr>
												<td><?= $i; ?></td>
												<td class="col-4"><?= $A['mapel']; ?></td>
												<input type="hidden" value="<?= $A['id']; ?>" name="mapel<?= $A['id']; ?>">
												<td class="col-1"><input type="number" value="<?= $A['nilai']; ?>" name="nilai<?= $A['id']; ?>" class="form-control no-border" placeholder="" required></td>
												<td class="col-1"><select name="predikat<?= $A['id']; ?>" class="form-control no-border" required>
														<option value="">...</option>
														<option value="A" <?= set_select('predikat', 'A', (isset($A['predikat']) && $A['predikat'] == "A" ? TRUE : FALSE)); ?>>A</option>
														<option value="B" <?= set_select('predikat', 'B', (isset($A['predikat']) && $A['predikat']  == "B" ? TRUE : FALSE)); ?>>B</option>
														<option value="C" <?= set_select('predikat', 'C', (isset($A['predikat']) && $A['predikat']  == "C" ? TRUE : FALSE)); ?>>C</option>
														<option value="D" <?= set_select('predikat', 'D', (isset($A['predikat']) && $A['predikat']  == "D" ? TRUE : FALSE)); ?>>D</option>
														<option value="E" <?= set_select('predikat', 'E', (isset($A['predikat']) && $A['predikat']  == "E" ? TRUE : FALSE)); ?>>E</option>
													</select></td>
												<td class="col-6"><input type="text" value="<?= $A['deskripsi']; ?>" name="des<?= $A['id']; ?>" class="form-control no-border"></td>
											</tr>
									<?php

										}
									}
									?>
								</tbody>
							</table>
						</div>
						<!-- Editable table -->
						<h6 class="mb-3 font-weight-bold text-dark">Kelompok B (Umum)</h6>

						<!-- Editable table -->
						<div id="table" class="table-editable">
							<table class="table table-bordered table-responsive-md table-striped">
								<thead>
									<tr>
										<th class="text-center">No</th>
										<th>Mata Pelajaran</th>
										<th class="text-center">Nilai</th>
										<th class="text-center">Predikat</th>
										<th>Deskripsi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i = 0;

									if (isset($pengetahuanB)) {
										foreach ($pengetahuanB as $key => $B) {
											$i++;
									?>

											<tr>
												<td><?= $i; ?></td>
												<td class="col-4"><?= $B['mapel']; ?></td>
												<input type="hidden" value="<?= $B['id']; ?>" name="mapel<?= $B['id']; ?>">
												<td class="col-1"><input type="number" value="<?= $B['nilai']; ?>" name="nilai<?= $B['id']; ?>" class="form-control no-border" placeholder="" required></td>
												<td class="col-1"><select name="predikat<?= $B['id']; ?>" class="form-control no-border" required>
														<option value="">...</option>
														<option value="A" <?= set_select('predikat', 'A', (isset($B['predikat']) && $B['predikat'] == "A" ? TRUE : FALSE)); ?>>A</option>
														<option value="B" <?= set_select('predikat', 'B', (isset($B['predikat']) && $B['predikat']  == "B" ? TRUE : FALSE)); ?>>B</option>
														<option value="C" <?= set_select('predikat', 'C', (isset($B['predikat']) && $B['predikat']  == "C" ? TRUE : FALSE)); ?>>C</option>
														<option value="D" <?= set_select('predikat', 'D', (isset($B['predikat']) && $B['predikat']  == "D" ? TRUE : FALSE)); ?>>D</option>
														<option value="E" <?= set_select('predikat', 'E', (isset($B['predikat']) && $B['predikat']  == "E" ? TRUE : FALSE)); ?>>E</option>
													</select></td>
												<td class="col-6"><input type="text" value="<?= $B['deskripsi']; ?>" name="des<?= $B['id']; ?>" class="form-control no-border"></td>
											</tr>
									<?php

										}
									}
									?>
								</tbody>
							</table>
						</div>
						<!-- Editable table -->
						<h6 class="mb-3 font-weight-bold text-dark">Kelompok C (Peminatan)</h6>

						<!-- Editable table -->
						<div id="table" class="table-editable">
							<table class="table table-bordered table-responsive-md table-striped">
								<thead>
									<tr>
										<th class="text-center">No</th>
										<th>Mata Pelajaran</th>
										<th class="text-center">Nilai</th>
										<th class="text-center">Predikat</th>
										<th>Deskripsi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i = 0;

									if (isset($pengetahuanC)) {
										foreach ($pengetahuanC as $key => $C) {
											$i++;
									?>

											<tr>
												<td><?= $i; ?></td>
												<td class="col-4"><?= $C['mapel']; ?></td>
												<input type="hidden" value="<?= $C['id']; ?>" name="mapel<?= $C['id']; ?>">
												<td class="col-1"><input type="number" value="<?= $C['nilai']; ?>" name="nilai<?= $C['id']; ?>" class="form-control no-border" placeholder="" required></td>
												<td class="col-1"><select name="predikat<?= $C['id']; ?>" class="form-control no-border" required>
														<option value="">...</option>
														<option value="A" <?= set_select('predikat', 'A', (isset($C['predikat']) && $C['predikat'] == "A" ? TRUE : FALSE)); ?>>A</option>
														<option value="B" <?= set_select('predikat', 'B', (isset($C['predikat']) && $C['predikat']  == "B" ? TRUE : FALSE)); ?>>B</option>
														<option value="C" <?= set_select('predikat', 'C', (isset($C['predikat']) && $C['predikat']  == "C" ? TRUE : FALSE)); ?>>C</option>
														<option value="D" <?= set_select('predikat', 'D', (isset($C['predikat']) && $C['predikat']  == "D" ? TRUE : FALSE)); ?>>D</option>
														<option value="E" <?= set_select('predikat', 'E', (isset($C['predikat']) && $C['predikat']  == "E" ? TRUE : FALSE)); ?>>E</option>
													</select></td>
												<td class="col-6"><input type="text" value="<?= $C['deskripsi']; ?>" name="des<?= $C['id']; ?>" class="form-control no-border"></td>
											</tr>
									<?php

										}
									}
									?>
								</tbody>
							</table>
						</div>
						<!-- Editable table -->

						<div class="text-right mb-3">
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					</div>
				</form>
			</div>

		</div>
	</div>
	<!-- Content Row -->
	<!-- Content Row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">C. Ketrampilan</h6>
				</div>
				<!-- Card Body -->
				<form action="<?= base_url('admin/simpan_ketrampilan/'); ?>" method="POST">
					<input type="hidden" value="<?= $siswa['id']; ?>" name="siswa">
					<input type="hidden" value="<?= $daftar_nilai['id']; ?>" name="daftar_nilai">
					<div class="card-body">
						<label class="mb-3 label">Kriteria Ketuntasan Minimal = 65</label>
						<h6 class="mb-3 font-weight-bold text-dark">Kelompok A (Umum)</h6>

						<!-- Editable table -->
						<div id="table" class="table-editable">
							<table class="table table-responsive-md table-bordered table-striped">
								<thead>
									<tr>
										<th class="text-center">No</th>
										<th class="col-4">Mata Pelajaran</th>
										<th class="col-1 text-center">Nilai</th>
										<th class="col-1 text-center">Predikat</th>
										<th class="col-6">Deskripsi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i = 0;

									if (isset($ketrampilanA)) {
										foreach ($ketrampilanA as $key => $A) {
											$i++;
									?>

											<tr>
												<td><?= $i; ?></td>
												<td class="col-4"><?= $A['mapel']; ?></td>
												<input type="hidden" value="<?= $A['id']; ?>" name="mapel<?= $A['id']; ?>">
												<td class="col-1"><input type="number" value="<?= $A['nilai']; ?>" name="nilai<?= $A['id']; ?>" class="form-control no-border ketrampilanA" placeholder="" required></td>
												<td class="col-1"><select name="predikat<?= $A['id']; ?>" class="form-control no-border" required>
														<option value="">...</option>
														<option value="A" <?= set_select('predikat', 'A', (isset($A['predikat']) && $A['predikat'] == "A" ? TRUE : FALSE)); ?>>A</option>
														<option value="B" <?= set_select('predikat', 'B', (isset($A['predikat']) && $A['predikat']  == "B" ? TRUE : FALSE)); ?>>B</option>
														<option value="C" <?= set_select('predikat', 'C', (isset($A['predikat']) && $A['predikat']  == "C" ? TRUE : FALSE)); ?>>C</option>
														<option value="D" <?= set_select('predikat', 'D', (isset($A['predikat']) && $A['predikat']  == "D" ? TRUE : FALSE)); ?>>D</option>
														<option value="E" <?= set_select('predikat', 'E', (isset($A['predikat']) && $A['predikat']  == "E" ? TRUE : FALSE)); ?>>E</option>
													</select></td>
												<td class="col-6"><input type="text" value="<?= $A['deskripsi']; ?>" name="des<?= $A['id']; ?>" class="form-control no-border"></td>
											</tr>
									<?php

										}
									}
									?>
								</tbody>
							</table>
						</div>
						<!-- Editable table -->
						<h6 class="mb-3 font-weight-bold text-dark">Kelompok B (Umum)</h6>

						<!-- Editable table -->
						<div id="table" class="table-editable">
							<table class="table table-responsive-md table-bordered table-striped">
								<thead>
									<tr>
										<th class="text-center">No</th>
										<th>Mata Pelajaran</th>
										<th class="text-center">Nilai</th>
										<th class="text-center">Predikat</th>
										<th>Deskripsi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i = 0;

									if (isset($ketrampilanB)) {
										foreach ($ketrampilanB as $key => $B) {
											$i++;
									?>

											<tr>
												<td><?= $i; ?></td>
												<td class="col-4"><?= $B['mapel']; ?></td>
												<input type="hidden" value="<?= $B['id']; ?>" name="mapel<?= $B['id']; ?>">
												<td class="col-1"><input type="number" value="<?= $B['nilai']; ?>" name="nilai<?= $B['id']; ?>" class="form-control no-border ketrampilanB" placeholder="" required></td>
												<td class="col-1"><select name="predikat<?= $B['id']; ?>" class="form-control no-border" required>
														<option value="">...</option>
														<option value="A" <?= set_select('predikat', 'A', (isset($B['predikat']) && $B['predikat'] == "A" ? TRUE : FALSE)); ?>>A</option>
														<option value="B" <?= set_select('predikat', 'B', (isset($B['predikat']) && $B['predikat']  == "B" ? TRUE : FALSE)); ?>>B</option>
														<option value="C" <?= set_select('predikat', 'C', (isset($B['predikat']) && $B['predikat']  == "C" ? TRUE : FALSE)); ?>>C</option>
														<option value="D" <?= set_select('predikat', 'D', (isset($B['predikat']) && $B['predikat']  == "D" ? TRUE : FALSE)); ?>>D</option>
														<option value="E" <?= set_select('predikat', 'E', (isset($B['predikat']) && $B['predikat']  == "E" ? TRUE : FALSE)); ?>>E</option>
													</select></td>
												<td class="col-6"><input type="text" value="<?= $B['deskripsi']; ?>" name="des<?= $B['id']; ?>" class="form-control no-border"></td>
											</tr>
									<?php

										}
									}
									?>
								</tbody>
							</table>
						</div>
						<!-- Editable table -->
						<h6 class="mb-3 font-weight-bold text-dark">Kelompok C (Peminatan)</h6>

						<!-- Editable table -->
						<div id="table" class="table-editable">
							<table class="table table-responsive-md table-bordered table-striped">
								<thead>
									<tr>
										<th class="text-center">No</th>
										<th>Mata Pelajaran</th>
										<th class="text-center">Nilai</th>
										<th class="text-center">Predikat</th>
										<th>Deskripsi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i = 0;

									if (isset($ketrampilanC)) {
										foreach ($ketrampilanC as $key => $C) {
											$i++;
									?>

											<tr>
												<td><?= $i; ?></td>
												<td class="col-4"><?= $C['mapel']; ?></td>
												<input type="hidden" value="<?= $C['id']; ?>" name="mapel<?= $C['id']; ?>">
												<td class="col-1"><input type="number" id="input<?= $C['id']; ?>" data-id="<?= $C['id']; ?>" value="<?= $C['nilai']; ?>" name="nilai<?= $C['id']; ?>" class="form-control no-border ketrampilanC" placeholder="" required></td>
												<td class="col-1"><select name="predikat<?= $C['id']; ?>" id="c<?= $C['id']; ?>" class="form-control no-border" required>
														<option value="" id=" ketCopsi<?= $C['id']; ?>">...</option>
														<option id="ketCopsiA<?= $C['id']; ?>" value="A" <?= set_select('predikat', 'A', (isset($C['predikat']) && $C['predikat'] == "A" ? TRUE : FALSE)); ?>>A</option>
														<option id="ketCopsiB<?= $C['id']; ?>" value="B" <?= set_select('predikat', 'B', (isset($C['predikat']) && $C['predikat']  == "B" ? TRUE : FALSE)); ?>>B</option>
														<option id="ketCopsiC<?= $C['id']; ?>" value="C" <?= set_select('predikat', 'C', (isset($C['predikat']) && $C['predikat']  == "C" ? TRUE : FALSE)); ?>>C</option>
														<option id="ketCopsiD<?= $C['id']; ?>" value="D" <?= set_select('predikat', 'D', (isset($C['predikat']) && $C['predikat']  == "D" ? TRUE : FALSE)); ?>>D</option>
														<option id="ketCopsiE<?= $C['id']; ?>" value="E" <?= set_select('predikat', 'E', (isset($C['predikat']) && $C['predikat']  == "E" ? TRUE : FALSE)); ?>>E</option>
													</select></td>
												<td class="col-6"><input type="text" value="<?= $C['deskripsi']; ?>" name="des<?= $C['id']; ?>" class="form-control no-border"></td>
											</tr>
									<?php

										}
									}
									?>
								</tbody>
							</table>
						</div>
						<!-- Editable table -->

						<div class="text-right mb-3">
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					</div>
				</form>
			</div>

		</div>
	</div>
	<!-- Content Row -->
	<!-- Content Row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">D. Ekstra Kulikuler</h6>
				</div>
				<!-- Card Body -->

				<div class="card-body">
					<!-- Editable table -->
					<form action="<?= base_url('admin/simpan_ekstrakulikuler'); ?>" method="POST">
						<div id="table" class="table-editable">
							<label class="label">Tabel Interval Predikat</label>
							<table class="table table-bordered table-responsive-md table-striped">
								<thead>
									<tr>
										<td class="text-center" colspan="4">Predikat</td>
									</tr>
									<tr>
										<td class="text-center col-3">D</td>
										<td class="text-center col-3">C</td>
										<td class="text-center col-3">B</td>
										<td class="text-center col-3">A</td>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="text-center col-3">N < 64</td>
										<td class="text-center col-3">65 ≤ N < 76</td>
										<td class="text-center col-3">77 ≤ N < 88</td>
										<td class="text-center col-3">89 ≤ N ≤ 100</td>
									</tr>
								</tbody>
							</table>
							<div class="text-right mb-3">
								<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalTambahEkstrakulikuler">Tambah Ekstrakulikuler</button>
							</div>
							<table class="table table-bordered table-responsive-md table-striped">
								<thead>
									<tr>
										<th class="text-center">No</th>
										<th>Kegiatan Ekstrakulikuler</th>
										<th class="text-center">Predikat</th>
										<th>Deskripsi</th>
										<th class="text-center">Hapus</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i = 0;

									if (isset($ekstrakulikuler)) {
										foreach ($ekstrakulikuler as $key => $k) {
											$i++;
									?>

											<tr>
												<td><?= $i; ?></td>
												<td class="col-4"><?= $k->kegiatan; ?></td>
												<input type="hidden" value="<?= $k->id; ?>" name="id">
												<input type="hidden" value="<?= $k->id; ?>" name="id<?= $k->id; ?>">
												<input type="hidden" value="<?= $siswa['id']; ?>" name="siswa">
												<input type="hidden" value="<?= $daftar_nilai['id']; ?>" name="daftar_nilai">
												<td class="col-1"><select name="predikat<?= $k->id; ?>" class="form-control no-border" required>
														<option value="">...</option>
														<option value="A" <?= set_select('predikat', 'A', (isset($k->predikat) && $k->predikat == "A" ? TRUE : FALSE)); ?>>A</option>
														<option value="B" <?= set_select('predikat', 'B', (isset($k->predikat) && $k->predikat  == "B" ? TRUE : FALSE)); ?>>B</option>
														<option value="C" <?= set_select('predikat', 'C', (isset($k->predikat) && $k->predikat  == "C" ? TRUE : FALSE)); ?>>C</option>
														<option value="D" <?= set_select('predikat', 'D', (isset($k->predikat) && $k->predikat  == "D" ? TRUE : FALSE)); ?>>D</option>
													</select></td>
												<td class="col-6"><input type="text" value="<?= $k->deskripsi; ?>" name="deskripsi<?= $k->id; ?>" class="form-control no-border">
												<td class="col-1 text-center">
													<a href="<?= base_url('admin/hapus_ekstrakulikuler/') . $k->id . '/' . $daftar_nilai['id'] . '/' . $siswa['id']; ?>" class="btn btn-danger">x</a>
												</td>
											</tr>
									<?php

										}
									}
									?>
								</tbody>
							</table>
						</div>
						<?= $btnEkstrakulikuler; ?>
					</form>
					<!-- Editable table -->
				</div>
			</div>

		</div>
	</div>
	<!-- Content Row -->
	<!-- Content Row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">E. Prestasi</h6>
				</div>
				<!-- Card Body -->

				<div class="card-body">

					<div class="text-right mb-3">
						<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalTambahPrestasi">Tambah Prestasi</button>
					</div>
					<form action="<?= base_url('admin/simpan_prestasi'); ?>" method="POST">
						<!-- Editable table -->
						<div id="table" class="table-editable">
							<table class="table table-bordered table-responsive-md table-striped">
								<thead>
									<tr>
										<th class="text-center">No</th>
										<td class="col-4">Jenis Kegiatan</th>
										<td class="col-7">Keterangan</th>
										<th class="col-1 text-center">Hapus</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i = 0;

									if (isset($prestasi)) {
										foreach ($prestasi as $key => $p) {
											$i++;
									?>

											<tr>
												<td><?= $i; ?></td>
												<input type="hidden" value="<?= $p->id; ?>" name="id">
												<input type="hidden" value="<?= $p->id; ?>" name="id<?= $p->id; ?>">
												<input type="hidden" value="<?= $siswa['id']; ?>" name="siswa">
												<input type="hidden" value="<?= $daftar_nilai['id']; ?>" name="daftar_nilai">
												<td><input type="text" name="kegiatan<?= $p->id; ?>" class="form-control no-border" value="<?= $p->kegiatan; ?>"></td>
												<td><input type="text" name="keterangan<?= $p->id; ?>" class="form-control no-border" value="<?= $p->keterangan; ?>"></td>
												<td class="text-center">
													<a href="<?= base_url('admin/hapus_prestasi/') . $p->id . '/' . $daftar_nilai['id'] . '/' . $siswa['id']; ?>" class="btn btn-danger">x</a>
												</td>
											</tr>
									<?php

										}
									}
									?>
								</tbody>
							</table>
						</div>
						<?= $btnPrestasi; ?>
						<!-- Editable table -->
					</form>
				</div>
			</div>

		</div>
	</div>
	<!-- Content Row -->
	<!-- Content Row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">F. Ketidakhadiran</h6>
				</div>
				<!-- Card Body -->

				<div class="card-body">
					<form action="<?= base_url('admin/simpan_ketidakhadiran/'); ?>" method="POST">
						<input type="hidden" value="<?= $ketidakhadiran['id']; ?>" name="id">
						<input type="hidden" value="<?= $siswa['id']; ?>" name="siswa">
						<input type="hidden" value="<?= $daftar_nilai['id']; ?>" name="daftar_nilai">
						<!-- Editable table -->
						<div id="table" class="table-editable">
							<table class="table table-bordered table-responsive-md">
								<thead>
								<tbody>
									<tr>
										<td class="col-6">Sakit</td>
										<td class="text-center col-1"><input type="number" value="<?= $ketidakhadiran['sakit']; ?>" name="sakit" class="form-control" placeholder="" required></td>
										<td class="col-5"> Hari</td>
									</tr>
									<tr>
										<td class="col-6">Izin</td>
										<td class="text-center col-1"><input type="number" value="<?= $ketidakhadiran['izin']; ?>" name="izin" class="form-control" placeholder="" required></td>
										<td class="col-5"> Hari</td>
									</tr>
									<tr>
										<td class="col-6">Tanpa Keterangan</td>
										<td class="text-center col-1"><input type="number" value="<?= $ketidakhadiran['tanpa_keterangan']; ?>" name="tanpa_keterangan" class="form-control" placeholder="" required></td>
										<td class="col-5"> Hari</td>
									</tr>
								</tbody>
							</table>
						</div>
						<!-- Editable table -->
						<div class="text-right mb-3">
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>
	<!-- Content Row -->
	<!-- Content Row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">G. Catatan Wali Kelas</h6>
				</div>
				<!-- Card Body -->

				<div class="card-body">
					<form action="<?= base_url('admin/simpan_catatan_wali/'); ?>" method="POST">
						<input type="hidden" value="<?= $siswa['id']; ?>" name="siswa">
						<input type="hidden" value="<?= $daftar_nilai['id']; ?>" name="daftar_nilai">
						<input type="hidden" name="id" value="<?= $catatanWali['id']; ?>">
						<input type="hidden" name="wali" value="<?= $guru['id']; ?>">
						<div class="mb-3">
							<textarea class="form-control" name="catatan" rows="3"><?= $catatanWali['catatan']; ?></textarea>
						</div>
						<div class="text-right mb-3">
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>

</div>
<!-- /.container-fluid -->
<div class="modal fade" id="modalTambahEkstrakulikuler" tabindex="-1" aria-labelledby="modalTambahEkstrakulikulerLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalTambahEkstrakulikulerLabel">Ekstrakulikuler</h5>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<form action="<?= base_url('admin/simpan_ekstrakulikuler'); ?>" method="POST">
				<input type="hidden" value="<?= $siswa['id']; ?>" name="siswa">
				<input type="hidden" value="<?= $daftar_nilai['id']; ?>" name="daftar_nilai">
				<div class="modal-body">
					<div class="mb-3">
						<div class="form-group">
							<div class="form-group">
								<label for="kegiatan" class="col-form-label">Kegiatan Ekstrakulikuler</label>
								<input type="text" name="kegiatan" class="form-control">
							</div>
						</div>
					</div>
					<div class="mb-3">
						<div class="form-group">
							<div class="form-group">
								<label for="predikat" class="col-form-label">Predikat</label>
								<select class="form-control" name="predikat" required>
									<option value="">...</option>
									<option value="A">A</option>
									<option value="B">B</option>
									<option value="C">C</option>
									<option value="D">D</option>
								</select></td>
							</div>
						</div>
					</div>
					<div class="mb-3">
						<div class="form-group">
							<div class="form-group">
								<label for="deskripsi" class="col-form-label">Deskripsi</label>
								<textarea class="form-control" name="deskripsi" rows="3"></textarea>
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
<div class="modal fade" id="modalTambahPrestasi" tabindex="-1" aria-labelledby="modalTambahPrestasiLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalTambahPrestasiLabel">Prestasi</h5>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<form action="<?= base_url('admin/simpan_prestasi'); ?>" method="POST">
				<input type="hidden" value="<?= $siswa['id']; ?>" name="siswa">
				<input type="hidden" value="<?= $daftar_nilai['id']; ?>" name="daftar_nilai">
				<div class="modal-body">
					<div class="mb-3">
						<div class="form-group">
							<div class="form-group">
								<label for="kegiatan" class="col-form-label">Jenis Kegiatan</label>
								<input type="text" name="kegiatan" class="form-control">
							</div>
						</div>
					</div>
					<div class="mb-3">
						<div class="form-group">
							<div class="form-group">
								<label for="keterangan" class="col-form-label">Keterangan</label>
								<textarea class="form-control" name="keterangan" rows="3"></textarea>
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
<!-- End of Main Content -->
<!-- Footer -->
<footer class="sticky-footer bg-white">
	<div class="container my-auto">
		<div class="copyright text-center my-auto">
			<span>Copyright &copy; Sistem Akademik Sekolah 2021</span>
		</div>
	</div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Anda yakin akan keluar?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">Pilih logout untuk keluar dari sesi.</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
				<a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
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

<script src="<?= base_url('vendor/sb-admin/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('vendor/sb-admin/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('vendor/sb-admin/') ?>js/demo/datatables-demo.js"></script>

<script>
	$(document).ready(function() {
		$(".ketrampilanA").keyup(function(e) {
			console.log('a' + $(this).val());
		});
		$(".ketrampilanB").keyup(function(e) {
			console.log('b' + $(this).val());
		});
		$(".ketrampilanC").keyup(function() {
			var dataId = $(this).attr("data-id");
			var idInput = 'nilai' + dataId;
			var nilai = parseInt($('#input' + dataId).val());

			if (nilai > 88) {
				$("#ketCopsiA" + dataId).attr("selected", "selected");
			} else if (nilai > 76) {
				$("#ketCopsiB" + dataId).attr("selected", "selected");
			} else if (nilai > 64) {
				$("#ketCopsiC" + dataId).attr("selected", "selected");
			} else if (nilai < 65) {
				$("#ketCopsiD" + dataId).attr("selected", "selected");
			} else {
				$("#ketCopsi" + dataId).attr("selected", "selected");
			}
		});
	});
</script>

</body>

</html>