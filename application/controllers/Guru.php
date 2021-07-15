<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Rapor_model', 'rapor');
        is_guru();
    }
    public function index()
    {
        $this->dashboard();
    }
    public function dashboard()
    {
        $guru = $this->rapor->get_teacher($this->session->userdata('username'));
        $data['siswa'] = $this->rapor->hitung_siswa();
        $data['guru'] = $this->rapor->hitung_guru();
        $data['mapel'] = $this->rapor->hitung_mapel();
        $data['kelas'] = $this->rapor->hitung_kelas();
        $data['title'] = 'Dashboard'; //Judul Halaman
        $level = $this->session->userdata('level');
        $data['menu'] = $this->rapor->get_menu($level);
        $data['username'] = $guru['nama'];
        $this->load->view('templates/header', $data); //Header view
        $this->load->view('templates/sidebar', $data); //Sidebar view
        $this->load->view('templates/topbar', $data); //Sidebar view
        $this->load->view('dashboard', $data); //Dashboard view
        $this->load->view('templates/footer'); //Footer view
    }
    public function hapus_daftar_nilai($id)
    {
        if ($this->rapor->delete_score_list($id)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sukses!</strong> Daftar nilai berhasil dihapus.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('guru/nilai');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Ooops!</strong> Ada yang salah.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('guru/nilai');
        }
    }
    public function lihat_nilai($id = '')
    {
        $guru = $this->rapor->get_teacher($this->session->userdata('username'));
        $listScore = $this->rapor->get_list_score($id);
        $data['title'] = 'Lihat Nilai'; //Judul Halaman
        $data['kelas'] = $this->rapor->get_all_class();
        $data['siswa'] = $this->rapor->get_student_by_class($listScore['kelas']);
        $data['dataSiswa'] = $this->rapor->get_student_by_class($listScore['kelas']);
        $data['daftar_nilai'] = $id;
        $level = $this->session->userdata('level');
        $data['menu'] = $this->rapor->get_menu($level);
        $data['username'] = $guru['nama'];
        $this->load->view('templates/header', $data); //Header view
        $this->load->view('templates/sidebar', $data); //Sidebar view
        $this->load->view('templates/topbar', $data); //Topbar view
        $this->load->view('lihat_nilai_guru', $data); //Nilai view
        $this->load->view('templates/footer'); //Footer view
    }
    public function input_nilai($daftar_nilai = '', $idSiswa = '')
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
        $guruSes = $this->rapor->get_teacher($this->session->userdata('username'));
        $data['username'] = $guruSes['nama'];
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
        $this->load->view('templates/header', $data); //Header view
        $this->load->view('templates/sidebar', $data); //Sidebar view
        $this->load->view('templates/topbar', $data); //Topbar view
        $this->load->view('input_nilai_guru', $data); //Nilai view
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
        $guru = $this->rapor->get_teacher($this->session->userdata('username'));
        $data['title'] = 'Nilai'; //Judul Halaman
        $data['sekolah'] = $this->rapor->get_school();
        $data['kelas'] = $this->rapor->get_all_class();
        $data['guru'] = $guru['id'];
        $data['umum'] = $this->rapor->get_all_score_list_teacher($guru['id']);
        $data['semester'] = $this->rapor->get_all_semester();
        $data['tahun'] = $this->rapor->get_all_year();
        $level = $this->session->userdata('level');
        $data['menu'] = $this->rapor->get_menu($level);
        $data['username'] = $guru['nama'];
        $this->load->view('templates/header', $data); //Header view
        $this->load->view('templates/sidebar', $data); //Sidebar view
        $this->load->view('templates/topbar', $data); //Topbar view
        $this->load->view('nilai_guru', $data); //Nilai view
        $this->load->view('templates/footer'); //Footer view
    }
    public function tambah_daftar_nilai()
    {
        $guru = htmlspecialchars($this->input->post('guru'));
        $semester = htmlspecialchars($this->input->post('semester'));
        $tahun = htmlspecialchars($this->input->post('tahun'));
        $guruId = $this->rapor->get_teacher_id($guru);
        $data = [
            'kelas' => $guruId['wali'],
            'guru' => $guru,
            'semester' => $semester,
            'tahun' => $tahun
        ];
        if ($this->rapor->insert_score($data) > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sukses!</strong> Daftar nilai berhasil ditambahkan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('guru/nilai');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Ooops!</strong> Ada yang salah.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('guru/nilai');
        }
    }
    public function input_sikap()
    {
        $spiritualPredikat = htmlspecialchars($this->input->post('spiritual_predikat'));
        $spiritualDes = htmlspecialchars($this->input->post('spiritual_des'));
        $sosialPredikat = htmlspecialchars($this->input->post('sosial_predikat'));
        $sosialDes = htmlspecialchars($this->input->post('sosial_des'));
        $siswa = htmlspecialchars($this->input->post('siswa'));
        $daftarNilai = htmlspecialchars($this->input->post('daftar_nilai'));
        $data = [
            'spiritual_predikat' => $spiritualPredikat,
            'sosial_predikat' => $sosialPredikat,
            'spiritual_des' => $spiritualDes,
            'sosial_des' => $sosialDes,
            'siswa' => $siswa,
            'daftar_nilai' => $daftarNilai,
        ];
        $attitude = $this->rapor->get_attitude($daftarNilai, $siswa);
        if (!isset($attitude)) {
            if ($this->rapor->insert_attitude($data)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sukses!</strong> Sikap berhasil disimpan.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('guru/input_nilai/' . $daftarNilai . '/' . $siswa);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sukses!</strong> Sikap berhasil disimpan.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('guru/input_nilai/' . $daftarNilai . '/' . $siswa);
            }
        } else {
            if ($this->rapor->update_attitude($data, $daftarNilai, $siswa)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sukses!</strong> Sikap berhasil disimpan.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('guru/input_nilai/' . $daftarNilai . '/' . $siswa);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sukses!</strong> Sikap berhasil disimpan.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('guru/input_nilai/' . $daftarNilai . '/' . $siswa);
            }
        }
    }
    public function simpan_pengetahuan()
    {
        $mapel = $this->rapor->get_all_lesson();
        foreach ($mapel as $m) {
            $siswa = htmlspecialchars($this->input->post('siswa'));
            $idMapel = htmlspecialchars($this->input->post('mapel' . $m->id));
            $daftarNilai = htmlspecialchars($this->input->post('daftar_nilai'));
            $nilai = htmlspecialchars($this->input->post('nilai' . $m->id));
            $predikat = htmlspecialchars($this->input->post('predikat' . $m->id));
            $des = htmlspecialchars($this->input->post('des' . $m->id));
            $cekNilai = $this->rapor->get_pengetahuan($daftarNilai, $siswa, $idMapel);
            $dataNilai = [
                'siswa' => $siswa,
                'daftar_nilai' => $daftarNilai,
                'mapel' => $idMapel,
                'nilai' => $nilai,
                'predikat' => $predikat,
                'deskripsi' => $des
            ];
            if (isset($cekNilai)) {
                $this->rapor->update_pengetahuan($dataNilai, $daftarNilai, $siswa, $idMapel);
            } else {
                $this->rapor->insert_pengetahuan($dataNilai);
            }
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sukses!</strong> Pengetahuan berhasil disimpan.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('guru/input_nilai/' . $daftarNilai . '/' . $siswa);
    }
    public function simpan_ketrampilan()
    {
        $mapel = $this->rapor->get_all_lesson();
        foreach ($mapel as $m) {
            $siswa = htmlspecialchars($this->input->post('siswa'));
            $idMapel = htmlspecialchars($this->input->post('mapel' . $m->id));
            $daftarNilai = htmlspecialchars($this->input->post('daftar_nilai'));
            $nilai = htmlspecialchars($this->input->post('nilai' . $m->id));
            $predikat = htmlspecialchars($this->input->post('predikat' . $m->id));
            $des = htmlspecialchars($this->input->post('des' . $m->id));
            $cekNilai = $this->rapor->get_ketrampilan($daftarNilai, $siswa, $idMapel);
            $dataNilai = [
                'siswa' => $siswa,
                'daftar_nilai' => $daftarNilai,
                'mapel' => $idMapel,
                'nilai' => $nilai,
                'predikat' => $predikat,
                'deskripsi' => $des
            ];
            if (isset($cekNilai)) {
                $this->rapor->update_ketrampilan($dataNilai, $daftarNilai, $siswa, $idMapel);
            } else {
                $this->rapor->insert_ketrampilan($dataNilai);
            }
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sukses!</strong> Ketrampilan berhasil disimpan.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('guru/input_nilai/' . $daftarNilai . '/' . $siswa);
    }
    public function simpan_ekstrakulikuler()
    {
        $id = htmlspecialchars($this->input->post('id'));
        $siswa = htmlspecialchars($this->input->post('siswa'));
        $daftarNilai = htmlspecialchars($this->input->post('daftar_nilai'));
        $kegiatan = htmlspecialchars($this->input->post('kegiatan'));
        $predikat = htmlspecialchars($this->input->post('predikat'));
        $deskripsi = htmlspecialchars($this->input->post('deskripsi'));
        $ekstra = $this->rapor->get_ekstrakulikulers($daftarNilai, $siswa);
        $data = [
            'siswa' => $siswa,
            'daftar_nilai' => $daftarNilai,
            'kegiatan' => $kegiatan,
            'predikat' => $predikat,
            'deskripsi' => $deskripsi
        ];
        $ekstrakulikuler = $this->rapor->get_ekstrakulikuler($id);
        if (!isset($ekstrakulikuler)) {
            if ($this->rapor->insert_ekstrakulikuler($data) > 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sukses!</strong> Ekstarkulikuler berhasil disimpan.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('guru/input_nilai/' . $daftarNilai . '/' . $siswa);
            }
        } else {
            foreach ($ekstra as $e) {
                $id = htmlspecialchars($this->input->post('id' . $e->id));
                $predikat = htmlspecialchars($this->input->post('predikat' . $e->id));
                $deskripsi = htmlspecialchars($this->input->post('deskripsi' . $e->id));
                $data = [
                    'predikat' => $predikat,
                    'deskripsi' => $deskripsi
                ];
                $this->rapor->update_ekstrakulikuler($data, $id);
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sukses!</strong> Ekstarkulikuler berhasil disimpan.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('guru/input_nilai/' . $daftarNilai . '/' . $siswa);
        }
    }
    public function simpan_prestasi()
    {
        $id = htmlspecialchars($this->input->post('id'));
        $siswa = htmlspecialchars($this->input->post('siswa'));
        $daftarNilai = htmlspecialchars($this->input->post('daftar_nilai'));
        $kegiatan = htmlspecialchars($this->input->post('kegiatan'));
        $keterangan = htmlspecialchars($this->input->post('keterangan'));
        $prestasis = $this->rapor->get_prestasis($daftarNilai, $siswa);
        $data = [
            'siswa' => $siswa,
            'daftar_nilai' => $daftarNilai,
            'kegiatan' => $kegiatan,
            'keterangan' => $keterangan,
        ];
        if ($id == '') {
            if ($this->rapor->insert_prestasi($data) > 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sukses!</strong> Prestasi berhasil disimpan.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('guru/input_nilai/' . $daftarNilai . '/' . $siswa);
            }
        } else {
            foreach ($prestasis as $e) {
                $id = htmlspecialchars($this->input->post('id' . $e->id));
                $kegiatan = htmlspecialchars($this->input->post('kegiatan' . $e->id));
                $keterangan = htmlspecialchars($this->input->post('keterangan' . $e->id));
                $data = [
                    'kegiatan' => $kegiatan,
                    'keterangan' => $keterangan
                ];
                $this->rapor->update_prestasi($data, $id);
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Sukses!</strong> Prestasi berhasil disimpan.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('guru/input_nilai/' . $daftarNilai . '/' . $siswa);
        }
    }
    public function simpan_ketidakhadiran()
    {
        $id = htmlspecialchars($this->input->post('id'));
        $siswa = htmlspecialchars($this->input->post('siswa'));
        $daftarNilai = htmlspecialchars($this->input->post('daftar_nilai'));
        $sakit = htmlspecialchars($this->input->post('sakit'));
        $izin = htmlspecialchars($this->input->post('izin'));
        $tanpaKeterangan = htmlspecialchars($this->input->post('tanpa_keterangan'));
        $data = [
            'siswa' => $siswa,
            'daftar_nilai' => $daftarNilai,
            'sakit' => $sakit,
            'izin' => $izin,
            'tanpa_keterangan' => $tanpaKeterangan
        ];
        if ($id == '') {
            $this->rapor->insert_ketidakhadiran($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sukses!</strong> Ketidakhadiran berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('guru/input_nilai/' . $daftarNilai . '/' . $siswa);
        } else {
            $this->rapor->update_ketidakhadiran($data, $id);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sukses!</strong> Ketidakhadiran berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('guru/input_nilai/' . $daftarNilai . '/' . $siswa);
        }
    }
    public function simpan_catatan_wali()
    {
        $id = htmlspecialchars($this->input->post('id'));
        $siswa = htmlspecialchars($this->input->post('siswa'));
        $daftarNilai = htmlspecialchars($this->input->post('daftar_nilai'));
        $catatan = htmlspecialchars($this->input->post('catatan'));
        $wali = htmlspecialchars($this->input->post('wali'));
        $data = [
            'siswa' => $siswa,
            'daftar_nilai' => $daftarNilai,
            'catatan' => $catatan,
            'wali' => $wali,
        ];
        if ($id == '') {
            $this->rapor->insert_catatan_wali($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sukses!</strong> Catatan wali kelas berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('guru/input_nilai/' . $daftarNilai . '/' . $siswa);
        } else {
            $this->rapor->update_catatan_wali($data, $id);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sukses!</strong> Catatan wali kelas berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('guru/input_nilai/' . $daftarNilai . '/' . $siswa);
        }
    }
    public function hapus_ekstrakulikuler($id, $daftarNilai, $idSiswa)
    {
        if ($this->rapor->delete_ekstrakulikuler($id)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sukses!</strong> Ekstrakulikuler berhasil dihapus.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('guru/input_nilai/' . $daftarNilai . '/' . $idSiswa);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Ooops!</strong> Ada yang salah.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('guru/input_nilai/' . $daftarNilai . '/' . $idSiswa);
        }
    }
    public function hapus_prestasi($id, $daftarNilai, $idSiswa)
    {
        if ($this->rapor->delete_prestasi($id)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sukses!</strong> Prestasi berhasil dihapus.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('guru/input_nilai/' . $daftarNilai . '/' . $idSiswa);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Ooops!</strong> Ada yang salah.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('guru/input_nilai/' . $daftarNilai . '/' . $idSiswa);
        }
    }
}
