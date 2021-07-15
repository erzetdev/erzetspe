<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Begin Page Content -->
<div class="container-fluid">
	<?= $this->session->flashdata('message'); ?>

	<!-- Content Row -->
	<div class="row">
		<div class="col-12">
			<div class="card-body">
				<div class="row">
					<div class="col-2">Nama Sekolah</div>
					<div class="col-6">: <?= $sekolah['nama']; ?></div>
					<div class="col-2">Kelas</div>
					<div class="col-2">: <?= $daftar_nilai['kelas']; ?></div>
					<div class="col-2">Alamat</div>
					<div class="col-6">: <?= $sekolah['alamat']; ?></div>
					<div class="col-2">Semester</div>
					<div class="col-2">: <?= $daftar_nilai['semester']; ?></div>
					<div class="col-2">Nama</div>
					<div class="col-6">: <strong><?= $siswa['nama']; ?></strong></div>
					<div class="col-2">Tahun Pelajaran</div>
					<div class="col-2">: <?= $daftar_nilai['tahun']; ?></div>
					<div class="col-2">NIS/NISN</div>
					<div class="col-6">: <?= $siswa['nis']; ?>/<?= $siswa['nisn']; ?></div>
					<div class="col-2"></div>
					<div class="col-2"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- Content Row -->
	<div class="col-12 mb-5 mt-5"></div>
	<!-- Content Row -->
	<div class="row">
		<div class="col-12">
			<div class="card-body">
				<h6 class="m-0 font-weight-bold text-center mb-3">CAPAIAN HASIL BELAJAR</h6>
				<h6 class="m-0 font-weight-bold text-primary mb-3">A. Sikap</h6>
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
							<textarea class="form-control" name="spiritual_des" rows="3"><?= $sikap['spiritual_des']; ?></textarea>
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
							<textarea class="form-control" name="sosial_des" rows="3"><?= $sikap['sosial_des']; ?></textarea>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Content Row -->
	<!-- Content Row -->
	<div class="row">
		<div class="col-12">
			<!-- Card Body -->
			<div class="card-body">
				<h6 class="m-0 font-weight-bold text-primary">B. Pengetahuan</h6>
				<label class="mb-3 label">Kriteria Ketuntasan Minimal = 65</label>
				<h6 class="mb-3 font-weight-bold text-dark">Kelompok A (Umum)</h6>
				<table class="table table-bordered">
					<tr>
						<th class="text-center">No</th>
						<th style="width: 20%" class="col-2 ">Mata Pelajaran</th>
						<th style="width: 10%" class="col-1 text-center">Nilai</th>
						<th style="width: 10%" class="col-1 text-center">Predikat</th>
						<th style="width: 60%" class="col-8">Deskripsi</th>
					</tr>
					<?php
					$i = 0;

					if (isset($pengetahuanA)) {
						foreach ($pengetahuanA as $key => $A) {
							$i++;
					?>

							<tr>
								<td><?= $i; ?></td>
								<td style="width: 20%" class="col-2"><?= $A['mapel']; ?></td>
								<td style="width: 10%" class="col-1 text-center"><?= $A['nilai']; ?></td>
								<td style="width: 10%" class="col-1 text-center"><?= (isset($A['predikat']) ?  $A['predikat'] : ''); ?></td>
								<td style="width: 60%" class="col-8"><?= $A['deskripsi']; ?></td>
							</tr>
					<?php

						}
					}
					?>
				</table>
				<h6 class="mb-3 font-weight-bold text-dark">Kelompok B (Umum)</h6>
				<table class="table table-bordered">
					<tr>
						<th class="text-center">No</th>
						<th style="width: 20%" class="col-2 ">Mata Pelajaran</th>
						<th style="width: 10%" class="col-1 text-center">Nilai</th>
						<th style="width: 10%" class="col-1 text-center">Predikat</th>
						<th style="width: 60%" class="col-8">Deskripsi</th>
					</tr>
					<?php
					$i = 0;

					if (isset($pengetahuanB)) {
						foreach ($pengetahuanB as $key => $B) {
							$i++;
					?>

							<tr>
								<td><?= $i; ?></td>
								<td style="width: 20%" class="col-2"><?= $B['mapel']; ?></td>
								<td style="width: 10%" class="col-1 text-center"><?= $B['nilai']; ?></td>
								<td style="width: 10%" class="col-1 text-center"><?= (isset($B['predikat']) ?  $B['predikat'] : ''); ?></td>
								<td style="width: 60%" class="col-8"><?= $B['deskripsi']; ?></td>
							</tr>
					<?php

						}
					}
					?>
				</table>
				<h6 class="mb-3 font-weight-bold text-dark">Kelompok C (Peminatan)</h6>

				<table class="table table-bordered">
					<tr>
						<th class="text-center">No</th>
						<th style="width: 20%" class="col-2 ">Mata Pelajaran</th>
						<th style="width: 10%" class="col-1 text-center">Nilai</th>
						<th style="width: 10%" class="col-1 text-center">Predikat</th>
						<th style="width: 60%" class="col-8">Deskripsi</th>
					</tr>
					<?php
					$i = 0;

					if (isset($pengetahuanC)) {
						foreach ($pengetahuanC as $key => $C) {
							$i++;
					?>

							<tr>
								<td><?= $i; ?></td>
								<td style="width: 20%" class="col-2"><?= $C['mapel']; ?></td>
								<td style="width: 10%" class="col-1 text-center"><?= $C['nilai']; ?></td>
								<td style="width: 10%" class="col-1 text-center"><?= (isset($C['predikat']) ?  $C['predikat'] : ''); ?></td>
								<td style="width: 60%" class="col-8"><?= $C['deskripsi']; ?></td>
							</tr>
					<?php

						}
					}
					?>
				</table>
			</div>
		</div>
	</div>
	<!-- Content Row -->
	<!-- Content Row -->
	<div class="row">
		<div class="col-12">
			<div class="card-body">
				<h6 class="font-weight-bold text-primary mb-3">C. Ketrampilan</h6>
				<label class="mb-3 label">Kriteria Ketuntasan Minimal = 65</label>
				<h6 class="mb-3 font-weight-bold text-dark">Kelompok A (Umum)</h6>
				<table class="table table-bordered">
					<tr>
						<th class="text-center">No</th>
						<th style="width: 20%" class="col-2 ">Mata Pelajaran</th>
						<th style="width: 10%" class="col-1 text-center">Nilai</th>
						<th style="width: 10%" class="col-1 text-center">Predikat</th>
						<th style="width: 60%" class="col-8">Deskripsi</th>
					</tr>
					<?php
					$i = 0;

					if (isset($ketrampilanA)) {
						foreach ($ketrampilanA as $key => $A) {
							$i++;
					?>

							<tr>
								<td><?= $i; ?></td>
								<td style="width: 20%" class="col-2"><?= $A['mapel']; ?></td>
								<td style="width: 10%" class="col-1 text-center"><?= $A['nilai']; ?></td>
								<td style="width: 10%" class="col-1 text-center"><?= (isset($A['predikat']) ?  $A['predikat'] : ''); ?></td>
								<td style="width: 60%" class="col-8"><?= $A['deskripsi']; ?></td>
							</tr>
					<?php

						}
					}
					?>
				</table>
				<h6 class="mb-3 font-weight-bold text-dark">Kelompok B (Umum)</h6>

				<table class="table table-bordered">
					<tr>
						<th class="text-center">No</th>
						<th style="width: 20%" class="col-2 ">Mata Pelajaran</th>
						<th style="width: 10%" class="col-1 text-center">Nilai</th>
						<th style="width: 10%" class="col-1 text-center">Predikat</th>
						<th style="width: 60%" class="col-8">Deskripsi</th>
					</tr>
					<?php
					$i = 0;

					if (isset($ketrampilanB)) {
						foreach ($ketrampilanB as $key => $B) {
							$i++;
					?>

							<tr>
								<td><?= $i; ?></td>
								<td style="width: 20%" class="col-2"><?= $B['mapel']; ?></td>
								<td style="width: 10%" class="col-1 text-center"><?= $B['nilai']; ?></td>
								<td style="width: 10%" class="col-1 text-center"><?= (isset($B['predikat']) ?  $B['predikat'] : ''); ?></td>
								<td style="width: 60%" class="col-8"><?= $B['deskripsi']; ?></td>
							</tr>
					<?php

						}
					}
					?>
				</table>
				<br class="col-12 mb-5 mt-5">
				<br class="col-12 mb-5 mt-5">
				<br class="col-12 mb-5 mt-5">
				<br class="col-12 mb-5 mt-5">
				<br class="col-12 mb-5 mt-5">
				<br class="col-12 mb-5 mt-5">
				<br class="col-12 mb-5 mt-5">
				<br class="col-12 mb-5 mt-5">
				<br class="col-12 mb-5 mt-5">
				<br class="col-12 mb-5 mt-5">
				<br class="col-12 mb-5 mt-5">
				<br class="col-12 mb-5 mt-5">
				<h6 class="mb-3 font-weight-bold text-dark">Kelompok C (Peminatan)</h6>
				<table class="table table-bordered">
					<tr>
						<th class="text-center">No</th>
						<th style="width: 20%" class="col-2 ">Mata Pelajaran</th>
						<th style="width: 10%" class="col-1 text-center">Nilai</th>
						<th style="width: 10%" class="col-1 text-center">Predikat</th>
						<th style="width: 60%" class="col-8">Deskripsi</th>
					</tr>
					<?php
					$i = 0;

					if (isset($ketrampilanC)) {
						foreach ($ketrampilanC as $key => $C) {
							$i++;
					?>

							<tr>
								<td><?= $i; ?></td>
								<td style="width: 20%" class="col-2"><?= $C['mapel']; ?></td>
								<td style="width: 10%" class="col-1 text-center"><?= $C['nilai']; ?></td>
								<td style="width: 10%" class="col-1 text-center"><?= (isset($C['predikat']) ?  $C['predikat'] : ''); ?></td>
								<td style="width: 60%" class="col-8"><?= $C['deskripsi']; ?></td>
							</tr>
					<?php

						}
					}
					?>
				</table>
			</div>
		</div>
	</div>
	<!-- Content Row -->
	<!-- Content Row -->
	<div class="row">
		<div class="col-12">
			<!-- Card Body -->

			<div class="card-body">
				<h6 class="font-weight-bold text-primary mb-3">D. Ekstra Kulikuler</h6>
				<label class="label">Tabel Interval Predikat</label>
				<table class="table table-bordered">
					<thead>
						<tr>
							<td style="width: 100%" class="text-center" colspan="4">Predikat</td>
						</tr>
						<tr>
							<td style="width: 25%" class="text-center col-3">D</td>
							<td style="width: 25%" class="text-center col-3">C</td>
							<td style="width: 25%" class="text-center col-3">B</td>
							<td style="width: 25%" class="text-center col-3">A</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td style="width: 25%" class="text-center col-3">N < 64</td>
							<td style="width: 25%" class="text-center col-3">65 ≤ N < 76</td>
							<td style="width: 25%" class="text-center col-3">77 ≤ N < 88</td>
							<td style="width: 25%" class="text-center col-3">89 ≤ N ≤ 100</td>
						</tr>
					</tbody>
				</table>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th style="width: 5%" class="text-center">No</th>
							<th style="width: 25%">Kegiatan Ekstrakulikuler</th>
							<th style="width: 10%" class="text-center">Predikat</th>
							<th style="width: 60%">Deskripsi</th>
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
									<td style="width: 5%" class="text-center"><?= $i; ?></td>
									<td style="width: 25%" class="col-4"><?= $k->kegiatan; ?></td>
									<td style="width: 10%" class="col-1 text-center"><?= (isset($k->predikat) ? $k->predikat : ''); ?></td>
									<td style="width: 60%" class="col-6"><?= $k->deskripsi; ?></td>
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
	<!-- Content Row -->
	<!-- Content Row -->
	<div class="row">
		<div class="col-12">
			<div class="card-body">
				<h6 class="m-0 font-weight-bold text-primary">E. Prestasi</h6>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th style="width: 5%" class="text-center">No</th>
							<td style="width:25%" class="col-4">Jenis Kegiatan</th>
							<td style="width: 70%" class="col-7">Keterangan</th>
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
									<td style="width: 5%" class="text-center"><?= $i; ?></td>
									<td style="width: 25%"><?= $p->kegiatan; ?></td>
									<td style="width: 70%"><?= $p->keterangan; ?></td>
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
	<!-- Content Row -->
	<!-- Content Row -->
	<div class="row">
		<div class="col-12">
			<div class="card-body">
				<h6 class="font-weight-bold text-primary mb-3">F. Ketidakhadiran</h6>
				<table class="table table-bordered">
					<thead>
					<tbody>
						<tr>
							<td style="width: 25%" class="col-6">Sakit</td>
							<td style="width: 5%" class="text-center col-1"><?= $ketidakhadiran['sakit']; ?></td>
							<td style="width: 70%" class="col-5"> Hari</td>
						</tr>
						<tr>
							<td style="width: 25%" class="col-6">Izin</td>
							<td style="width: 5%" class="text-center col-1"><?= $ketidakhadiran['izin']; ?></td>
							<td style="width: 70%" class="col-5"> Hari</td>
						</tr>
						<tr>
							<td style="width: 25%" class="col-6">Tanpa Keterangan</td>
							<td style="width: 5%" class="text-center col-1"><?= $ketidakhadiran['tanpa_keterangan']; ?></td>
							<td style="width: 70%" class="col-5"> Hari</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- Content Row -->
	<!-- Content Row -->
	<div class="row">
		<div class="col-12">
			<div class="card-body">
				<h6 class="font-weight-bold text-primary mb-3">G. Catatan Wali Kelas</h6>
				<div class="mb-3">
					<textarea class="form-control" name="catatan" rows="4"><?= $catatanWali['catatan']; ?></textarea>
				</div>
			</div>
		</div>
	</div>
	<!-- Content Row -->
	<br class="col-12 mb-5 mt-5">
	<!-- Content Row -->
	<br class="col-12 mb-5 mt-5">
	<br class="col-12 mb-5 mt-5">
	<br class="col-12 mb-5 mt-5">
	<br class="col-12 mb-5 mt-5">
	<br class="col-12 mb-5 mt-5">
	<br class="col-12 mb-5 mt-5">
	<div class="row">
		<div class="col-12">
			<div class="card-body">
				<h6 class="m-0 font-weight-bold text-primary">H. Tanggapan Orang Tua / Wali</h6>
				<div class="mb-3">
					<textarea class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
				</div>
			</div>
		</div>
	</div>
	<!-- Content Row -->
	<?php
	function tgl_indo($tanggal)
	{
		$bulan = array(
			1 =>   'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		);
		$pecahkan = explode('-', $tanggal);

		// variabel pecahkan 0 = tanggal
		// variabel pecahkan 1 = bulan
		// variabel pecahkan 2 = tahun

		return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
	}
	?>
	<!-- Content Row -->
	<div class="row">
		<div class="col-12">
			<div class="card-body">
				<div class="row">
					<div class="col-6">Mengetahui</div>
					<div class="col-6">Pemalang, <?= tgl_indo(date('Y-m-d')); ?></div>
					<div class="col-6 mb-5">Orang Tua/Wali</div>
					<div class="col-6 mb-5">Wali Kelas</div>
					<div class="col-12 mb-5"></div>
					<div class="col-6"></div>
					<div class="col-6"><strong><?= $guru['nama']; ?></strong></div>
					<div class="col-6">................................</div>
					<div class="col-6">NIP. <?= $guru['np']; ?></div>
					<div class="col-3"></div>
					<div class="col-8 mt-5">Mengetahui</div>
					<div class="col-3"></div>
					<div class="col-8">KEPALA SEKOLAH</div>
					<div class="col-12 mb-5 mt-5"></div>
					<div class="col-3"></div>
					<div class="col-8"><strong><?= $sekolah['kepsek']; ?></strong></div>
					<div class="col-3"></div>
					<div class="col-8">NIP. <?= $sekolah['np']; ?></div>
				</div>
			</div>
		</div>
	</div>
	<!-- Content Row -->
</div>
<!-- /.container-fluid -->
<script>
	window.print()
</script>