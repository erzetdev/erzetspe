<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Rapor_model', 'rapor');
        is_siswa();
    }
    public function index()
    {
        $this->dashboard();
    }
    public function dashboard()
    {
        $siswa = $this->rapor->get_student($this->session->userdata('username'));
        $data['siswa'] = $this->rapor->hitung_siswa();
        $data['guru'] = $this->rapor->hitung_guru();
        $data['mapel'] = $this->rapor->hitung_mapel();
        $data['kelas'] = $this->rapor->hitung_kelas();
        $data['title'] = 'Dashboard'; //Judul Halaman
        $level = $this->session->userdata('level');
        $data['menu'] = $this->rapor->get_menu($level);
        $data['username'] = $siswa['nama'];
        $this->load->view('templates/header', $data); //Header view
        $this->load->view('templates/sidebar', $data); //Sidebar view
        $this->load->view('templates/topbar', $data); //Sidebar view
        $this->load->view('dashboard', $data); //Dashboard view
        $this->load->view('templates/footer'); //Footer view
    }
    public function lihat_nilai($daftar_nilai)
    {
        $siswa = $this->rapor->get_student($this->session->userdata('username'));
        $idSiswa = $siswa['id'];
        foreach ($this->rapor->get_all_lesson_a() as $kelompokA) {
            $nilai = $this->rapor->get_pengetahuan($daftar_nilai, $idSiswa, $kelompokA->id);
            $array = [
                'id' => $kelompokA->id,
                'mapel' => $kelompokA->mapel,
                'nilai' => (isset($nilai['nilai']) ? $nilai['nilai'] : ''),
                'predikat' => (isset($nilai['predikat']) ? $nilai['predikat'] : ''),
                'deskripsi' => (isset($nilai['deskripsi']) ? $nilai['deskripsi'] : '')
            ];
            $pengetahuanA[] = $array;
        }
        foreach ($this->rapor->get_all_lesson_b() as $kelompokB) {
            $nilai = $this->rapor->get_pengetahuan($daftar_nilai, $idSiswa, $kelompokB->id);
            $array = [
                'id' => $kelompokB->id,
                'mapel' => $kelompokB->mapel,
                'nilai' => (isset($nilai['nilai']) ? $nilai['nilai'] : ''),
                'predikat' => (isset($nilai['predikat']) ? $nilai['predikat'] : ''),
                'deskripsi' => (isset($nilai['deskripsi']) ? $nilai['deskripsi'] : '')
            ];
            $pengetahuanB[] = $array;
        }
        foreach ($this->rapor->get_all_lesson_c() as $kelompokC) {
            $nilai = $this->rapor->get_pengetahuan($daftar_nilai, $idSiswa, $kelompokC->id);
            $array = [
                'id' => $kelompokC->id,
                'mapel' => $kelompokC->mapel,
                'nilai' => (isset($nilai['nilai']) ? $nilai['nilai'] : ''),
                'predikat' => (isset($nilai['predikat']) ? $nilai['predikat'] : ''),
                'deskripsi' => (isset($nilai['deskripsi']) ? $nilai['deskripsi'] : '')
            ];
            $pengetahuanC[] = $array;
        }
        foreach ($this->rapor->get_all_lesson_a() as $kelompokA) {
            $nilai = $this->rapor->get_ketrampilan($daftar_nilai, $idSiswa, $kelompokA->id);
            $array = [
                'id' => $kelompokA->id,
                'mapel' => $kelompokA->mapel,
                'nilai' => (isset($nilai['nilai']) ? $nilai['nilai'] : ''),
                'predikat' => (isset($nilai['predikat']) ? $nilai['predikat'] : ''),
                'deskripsi' => (isset($nilai['deskripsi']) ? $nilai['deskripsi'] : '')
            ];
            $ketrampilanA[] = $array;
        }
        foreach ($this->rapor->get_all_lesson_b() as $kelompokB) {
            $nilai = $this->rapor->get_ketrampilan($daftar_nilai, $idSiswa, $kelompokB->id);
            $array = [
                'id' => $kelompokB->id,
                'mapel' => $kelompokB->mapel,
                'nilai' => (isset($nilai['nilai']) ? $nilai['nilai'] : ''),
                'predikat' => (isset($nilai['predikat']) ? $nilai['predikat'] : ''),
                'deskripsi' => (isset($nilai['deskripsi']) ? $nilai['deskripsi'] : '')
            ];
            $ketrampilanB[] = $array;
        }
        foreach ($this->rapor->get_all_lesson_c() as $kelompokC) {
            $nilai = $this->rapor->get_ketrampilan($daftar_nilai, $idSiswa, $kelompokC->id);
            $array = [
                'id' => $kelompokC->id,
                'mapel' => $kelompokC->mapel,
                'nilai' => (isset($nilai['nilai']) ? $nilai['nilai'] : ''),
                'predikat' => (isset($nilai['predikat']) ? $nilai['predikat'] : ''),
                'deskripsi' => (isset($nilai['deskripsi']) ? $nilai['deskripsi'] : '')
            ];
            $ketrampilanC[] = $array;
        }
        $dataGuru = $this->rapor->get_list_score($daftar_nilai);
        $guru = $this->rapor->get_teacher_by_kelas($dataGuru['kelas']);
        $ketidakhadiran = $this->rapor->get_ketidakhadiran($daftar_nilai, $idSiswa);
        $catatanWali = $this->rapor->get_catatan_wali($daftar_nilai, $idSiswa);
        $data['title'] = 'Nilai'; //Judul Halaman
        $data['sekolah'] = $this->rapor->get_school();
        $data['ketrampilanA'] = $ketrampilanA;
        $data['ketrampilanB'] = $ketrampilanB;
        $data['ketrampilanC'] = $ketrampilanC;
        $data['pengetahuanA'] = $pengetahuanA;
        $data['pengetahuanB'] = $pengetahuanB;
        $data['pengetahuanC'] = $pengetahuanC;
        $data['kelas'] = $this->rapor->get_all_class();
        $data['mapel'] = $this->rapor->get_all_lesson();
        $data['daftar_nilai'] = $this->rapor->get_list_scores($daftar_nilai);
        $data['siswa'] = $this->rapor->get_student_by_id($idSiswa);
        $data['sikap'] = $this->rapor->get_attitude($daftar_nilai, $idSiswa);
        $data['ekstrakulikuler'] = $this->rapor->get_ekstrakulikulers($daftar_nilai, $idSiswa);
        $data['prestasi'] = $this->rapor->get_prestasis($daftar_nilai, $idSiswa);
        $data['ketidakhadiran'] = '';
        $data['guru'] = $guru;
        $data['btnEkstrakulikuler'] = '';
        $data['btnPrestasi'] = '';
        if (!empty($data['prestasi'])) {
            $data['btnPrestasi'] =
                '<div class="text-right mb-3">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>';
        }
        if (!empty($data['ekstrakulikuler'])) {
            $data['btnEkstrakulikuler'] =
                '<div class="text-right mb-3">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>';
        }
        if (empty($data['sikap'])) {
            $data['sikap'] = [
                'sosial_des' => '',
                'spiritual_des' => ''
            ];
        }
        if (!empty($ketidakhadiran)) {
            $data['ketidakhadiran'] = $ketidakhadiran;
        } else {
            $data['ketidakhadiran'] = [
                'id' => '',
                'sakit' => '',
                'izin' => '',
                'tanpa_keterangan' => ''
            ];
        }
        if (!empty($catatanWali)) {
            $data['catatanWali'] = $catatanWali;
        } else {
            $data['catatanWali'] = [
                'id' => '',
                'catatan' => '',
            ];
        }
        $level = $this->session->userdata('level');
        $data['menu'] = $this->rapor->get_menu($level);
        $data['username'] = $siswa['nama'];
        $this->load->view('templates/header', $data); //Header view
        $this->load->view('templates/sidebar', $data); //Sidebar view
        $this->load->view('templates/topbar', $data); //Topbar view
        $this->load->view('input_nilai_siswa', $data); //Nilai view
        $this->load->view('templates/footer'); //Footer view
    }
    public function cetak_nilai($daftar_nilai = '', $idSiswa = '')
    {
        foreach ($this->rapor->get_all_lesson_a() as $kelompokA) {
            $nilai = $this->rapor->get_pengetahuan($daftar_nilai, $idSiswa, $kelompokA->id);
            $array = [
                'id' => $kelompokA->id,
                'mapel' => $kelompokA->mapel,
                'nilai' => (isset($nilai['nilai']) ? $nilai['nilai'] : ''),
                'predikat' => (isset($nilai['predikat']) ? $nilai['predikat'] : ''),
                'deskripsi' => (isset($nilai['deskripsi']) ? $nilai['deskripsi'] : '')
            ];
            $pengetahuanA[] = $array;
        }
        foreach ($this->rapor->get_all_lesson_b() as $kelompokB) {
            $nilai = $this->rapor->get_pengetahuan($daftar_nilai, $idSiswa, $kelompokB->id);
            $array = [
                'id' => $kelompokB->id,
                'mapel' => $kelompokB->mapel,
                'nilai' => (isset($nilai['nilai']) ? $nilai['nilai'] : ''),
                'predikat' => (isset($nilai['predikat']) ? $nilai['predikat'] : ''),
                'deskripsi' => (isset($nilai['deskripsi']) ? $nilai['deskripsi'] : '')
            ];
            $pengetahuanB[] = $array;
        }
        foreach ($this->rapor->get_all_lesson_c() as $kelompokC) {
            $nilai = $this->rapor->get_pengetahuan($daftar_nilai, $idSiswa, $kelompokC->id);
            $array = [
                'id' => $kelompokC->id,
                'mapel' => $kelompokC->mapel,
                'nilai' => (isset($nilai['nilai']) ? $nilai['nilai'] : ''),
                'predikat' => (isset($nilai['predikat']) ? $nilai['predikat'] : ''),
                'deskripsi' => (isset($nilai['deskripsi']) ? $nilai['deskripsi'] : '')
            ];
            $pengetahuanC[] = $array;
        }
        foreach ($this->rapor->get_all_lesson_a() as $kelompokA) {
            $nilai = $this->rapor->get_ketrampilan($daftar_nilai, $idSiswa, $kelompokA->id);
            $array = [
                'id' => $kelompokA->id,
                'mapel' => $kelompokA->mapel,
                'nilai' => (isset($nilai['nilai']) ? $nilai['nilai'] : ''),
                'predikat' => (isset($nilai['predikat']) ? $nilai['predikat'] : ''),
                'deskripsi' => (isset($nilai['deskripsi']) ? $nilai['deskripsi'] : '')
            ];
            $ketrampilanA[] = $array;
        }
        foreach ($this->rapor->get_all_lesson_b() as $kelompokB) {
            $nilai = $this->rapor->get_ketrampilan($daftar_nilai, $idSiswa, $kelompokB->id);
            $array = [
                'id' => $kelompokB->id,
                'mapel' => $kelompokB->mapel,
                'nilai' => (isset($nilai['nilai']) ? $nilai['nilai'] : ''),
                'predikat' => (isset($nilai['predikat']) ? $nilai['predikat'] : ''),
                'deskripsi' => (isset($nilai['deskripsi']) ? $nilai['deskripsi'] : '')
            ];
            $ketrampilanB[] = $array;
        }
        foreach ($this->rapor->get_all_lesson_c() as $kelompokC) {
            $nilai = $this->rapor->get_ketrampilan($daftar_nilai, $idSiswa, $kelompokC->id);
            $array = [
                'id' => $kelompokC->id,
                'mapel' => $kelompokC->mapel,
                'nilai' => (isset($nilai['nilai']) ? $nilai['nilai'] : ''),
                'predikat' => (isset($nilai['predikat']) ? $nilai['predikat'] : ''),
                'deskripsi' => (isset($nilai['deskripsi']) ? $nilai['deskripsi'] : '')
            ];
            $ketrampilanC[] = $array;
        }
        $dataGuru = $this->rapor->get_list_score($daftar_nilai);
        $guru = $this->rapor->get_teacher_by_kelas($dataGuru['kelas']);
        $ketidakhadiran = $this->rapor->get_ketidakhadiran($daftar_nilai, $idSiswa);
        $catatanWali = $this->rapor->get_catatan_wali($daftar_nilai, $idSiswa);
        $data['title'] = 'Nilai'; //Judul Halaman
        $data['sekolah'] = $this->rapor->get_school();
        $data['ketrampilanA'] = $ketrampilanA;
        $data['ketrampilanB'] = $ketrampilanB;
        $data['ketrampilanC'] = $ketrampilanC;
        $data['pengetahuanA'] = $pengetahuanA;
        $data['pengetahuanB'] = $pengetahuanB;
        $data['pengetahuanC'] = $pengetahuanC;
        $data['kelas'] = $this->rapor->get_all_class();
        $data['mapel'] = $this->rapor->get_all_lesson();
        $data['daftar_nilai'] = $this->rapor->get_list_scores($daftar_nilai);
        $data['siswa'] = $this->rapor->get_student_by_id($idSiswa);
        $data['sikap'] = $this->rapor->get_attitude($daftar_nilai, $idSiswa);
        $data['ekstrakulikuler'] = $this->rapor->get_ekstrakulikulers($daftar_nilai, $idSiswa);
        $data['prestasi'] = $this->rapor->get_prestasis($daftar_nilai, $idSiswa);
        $data['ketidakhadiran'] = '';
        $data['guru'] = $guru;
        $data['btnEkstrakulikuler'] = '';
        $data['btnPrestasi'] = '';
        if (!empty($data['prestasi'])) {
            $data['btnPrestasi'] =
                '<div class="text-right mb-3">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>';
        }
        if (!empty($data['ekstrakulikuler'])) {
            $data['btnEkstrakulikuler'] =
                '<div class="text-right mb-3">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>';
        }
        if (empty($data['sikap'])) {
            $data['sikap'] = [
                'sosial_des' => '',
                'spiritual_des' => ''
            ];
        }
        if (!empty($ketidakhadiran)) {
            $data['ketidakhadiran'] = $ketidakhadiran;
        } else {
            $data['ketidakhadiran'] = [
                'id' => '',
                'sakit' => '',
                'izin' => '',
                'tanpa_keterangan' => ''
            ];
        }
        if (!empty($catatanWali)) {
            $data['catatanWali'] = $catatanWali;
        } else {
            $data['catatanWali'] = [
                'id' => '',
                'catatan' => '',
            ];
        }
        $this->load->view('templates/header', $data); //Header view
        // $this->load->view('templates/sidebar'); //Sidebar view
        // $this->load->view('templates/topbar'); //Sidebar view
        $this->load->view('print_nilai', $data); //Nilai view
        // $this->load->view('templates/footer'); //Footer view
    }
    public function nilai()
    {
        $siswa = $this->rapor->get_student($this->session->userdata('username'));
        $level = $this->session->userdata('level');
        $data['menu'] = $this->rapor->get_menu($level);
        $data['username'] = $siswa['nama'];
        $data['title'] = 'Nilai'; //Judul Halaman
        $data['sekolah'] = $this->rapor->get_school();
        $data['kelas'] = $this->rapor->get_all_class();
        $data['guru'] = $this->rapor->get_all_teacher();
        $data['umum'] = $this->rapor->get_all_score_list();
        $data['semester'] = $this->rapor->get_all_semester();
        $data['tahun'] = $this->rapor->get_all_year();
        $level = $this->session->userdata('level');
        $data['menu'] = $this->rapor->get_menu($level);
        $this->load->view('templates/header', $data); //Header view
        $this->load->view('templates/sidebar', $data); //Sidebar view
        $this->load->view('templates/topbar', $data); //Topbar view
        $this->load->view('nilai_siswa', $data); //Nilai view
        $this->load->view('templates/footer'); //Footer view
    }
}
