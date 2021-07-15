<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rapor_model extends CI_Model
{
    public function get_school()
    {
        return $this->db->get_where('sekolah', ['id' => 1])->row_array();
    }
    public function update_school($data)
    {
        $this->db->update('sekolah',  $data, ['id' => 1]);
        return $this->db->affected_rows();
    }
    public function update_student($data, $id)
    {
        $this->db->update('siswa',  $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
    public function update_teacher($data, $id)
    {
        $this->db->update('guru',  $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
    public function update_attitude($data, $daftar_nilai, $id_siswa)
    {
        $this->db->update('sikap',  $data, ['daftar_nilai' => $daftar_nilai, 'siswa' => $id_siswa]);
        return $this->db->affected_rows();
    }
    public function update_ekstrakulikuler($data, $id)
    {
        $this->db->update('ekstrakulikuler',  $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
    public function update_prestasi($data, $id)
    {
        $this->db->update('prestasi',  $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
    public function update_pengetahuan($data, $daftar_nilai, $idSiswa, $mapel)
    {
        $this->db->update('pengetahuan',  $data, ['daftar_nilai' => $daftar_nilai, 'siswa' => $idSiswa, 'mapel' => $mapel]);
        return $this->db->affected_rows();
    }
    public function update_ketrampilan($data, $daftar_nilai, $idSiswa, $mapel)
    {
        $this->db->update('ketrampilan',  $data, ['daftar_nilai' => $daftar_nilai, 'siswa' => $idSiswa, 'mapel' => $mapel]);
        return $this->db->affected_rows();
    }
    public function update_ketidakhadiran($data, $id)
    {
        $this->db->update('ketidakhadiran',  $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
    public function update_catatan_wali($data, $id)
    {
        $this->db->update('catatan_wali',  $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
    public function insert_class($data)
    {
        $this->db->insert('kelas', $data);
        return $this->db->affected_rows();
    }
    public function insert_lesson($data)
    {
        $this->db->insert('mapel', $data);
        return $this->db->affected_rows();
    }
    public function insert_student($data)
    {
        $this->db->insert('siswa', $data);
        return $this->db->affected_rows();
    }
    public function insert_teacher($data)
    {
        $this->db->insert('guru', $data);
        return $this->db->affected_rows();
    }
    public function insert_score($data)
    {
        $this->db->insert('daftar_nilai', $data);
        return $this->db->affected_rows();
    }
    public function insert_pengetahuan($data)
    {
        $this->db->insert('pengetahuan', $data);
        return $this->db->affected_rows();
    }
    public function insert_ketrampilan($data)
    {
        $this->db->insert('ketrampilan', $data);
        return $this->db->affected_rows();
    }
    public function insert_attitude($data)
    {
        $this->db->insert('sikap', $data);
        return $this->db->affected_rows();
    }
    public function insert_ekstrakulikuler($data)
    {
        $this->db->insert('ekstrakulikuler', $data);
        return $this->db->affected_rows();
    }
    public function insert_prestasi($data)
    {
        $this->db->insert('prestasi', $data);
        return $this->db->affected_rows();
    }
    public function insert_user($data)
    {
        $this->db->insert('user', $data);
        return $this->db->affected_rows();
    }
    public function insert_ketidakhadiran($data)
    {
        $this->db->insert('ketidakhadiran', $data);
        return $this->db->affected_rows();
    }
    public function insert_catatan_wali($data)
    {
        $this->db->insert('catatan_wali', $data);
        return $this->db->affected_rows();
    }
    public function get_class($kelas)
    {
        return $this->db->get_where('kelas', ['kelas' => $kelas])->row_array();
    }
    public function get_class_id($id)
    {
        return $this->db->get_where('kelas', ['id' => $id])->row_array();
    }
    public function get_lesson($kelas, $kelompok)
    {
        return $this->db->get_where('mapel', ['mapel' => $kelas, 'kelompok' => $kelompok])->row_array();
    }
    public function get_ekstrakulikuler($id)
    {
        return $this->db->get_where('ekstrakulikuler', ['id' => $id])->row_array();
    }
    public function get_prestasi($id)
    {
        return $this->db->get_where('ekstrakulikuler', ['id' => $id])->row_array();
    }
    public function get_ekstrakulikulers($daftar_nilai, $id_siswa)
    {
        return $this->db->get_where('ekstrakulikuler', ['daftar_nilai' => $daftar_nilai, 'siswa' => $id_siswa])->result_object();
    }
    public function get_menu($level)
    {
        return $this->db->get_where('menu', ['level' => $level])->result_object();
    }
    public function get_prestasis($daftar_nilai, $id_siswa)
    {
        return $this->db->get_where('prestasi', ['daftar_nilai' => $daftar_nilai, 'siswa' => $id_siswa])->result_object();
    }
    public function get_attitude($daftar_nilai, $id_siswa)
    {
        return $this->db->get_where('sikap', ['daftar_nilai' => $daftar_nilai, 'siswa' => $id_siswa])->row_array();
    }
    public function get_ketidakhadiran($daftar_nilai, $id_siswa)
    {
        return $this->db->get_where('ketidakhadiran', ['daftar_nilai' => $daftar_nilai, 'siswa' => $id_siswa])->row_array();
    }
    public function get_ketrampilan_mapel($mapel)
    {
        return $this->db->get_where('ketrampilan', ['mapel' => $mapel])->row_array();
    }
    public function get_guru_kelas($guru)
    {
        return $this->db->get_where('guru', ['wali' => $guru])->row_array();
    }
    public function get_catatan_wali($daftar_nilai, $id_siswa)
    {
        return $this->db->get_where('catatan_wali', ['daftar_nilai' => $daftar_nilai, 'siswa' => $id_siswa])->row_array();
    }
    public function get_student($nis)
    {
        return $this->db->get_where('siswa', ['nis' => $nis])->row_array();
    }
    public function get_student_by_id($id)
    {
        return $this->db->get_where('siswa', ['id' => $id])->row_array();
    }
    public function get_teacher($np)
    {
        return $this->db->get_where('guru', ['np' => $np])->row_array();
    }
    public function get_teacher_id($id)
    {
        return $this->db->get_where('guru', ['id' => $id])->row_array();
    }
    public function get_teacher_by_kelas($kelas)
    {
        return $this->db->get_where('guru', ['wali' => $kelas])->row_array();
    }
    public function get_list_scores($id)
    {
        $this->db->select('daftar_nilai.*, kelas.kelas as kelas, semester.semester as semester, tahun.tahun as tahun');
        $this->db->join('kelas', 'kelas.id = daftar_nilai.kelas', 'left');
        $this->db->join('tahun', 'tahun.id = daftar_nilai.tahun', 'left');
        $this->db->join('semester', 'semester.id = daftar_nilai.semester', 'left');
        $this->db->where('daftar_nilai.id', $id);
        return $this->db->get('daftar_nilai', ['id' => $id])->row_array();
    }
    public function get_list_score($id)
    {
        return $this->db->get_where('daftar_nilai', ['id' => $id])->row_array();
    }
    public function get_list_score_guru($guru)
    {
        return $this->db->get_where('daftar_nilai', ['guru' => $guru])->row_array();
    }
    public function student_by_class($class)
    {
        $result = $this->db->get_where('siswa', ['kelas' => $class]);
        return $result->result_object();
    }
    public function get_student_by_class($class)
    {
        $this->db->select('siswa.*, kelas.kelas as kelas');
        $this->db->join('kelas', 'kelas.id = siswa.kelas', 'left');
        $this->db->order_by('nama', 'ASC');
        $this->db->where('siswa.kelas', $class);
        return $this->db->get('siswa')->result_object();
    }
    public function get_pengetahuan($daftar_nilai, $idSiswa, $mapel)
    {
        return $this->db->get_where('pengetahuan', ['daftar_nilai' => $daftar_nilai, 'siswa' => $idSiswa, 'mapel' => $mapel])->row_array();
    }
    public function get_ketrampilan($daftar_nilai, $idSiswa, $mapel)
    {
        return $this->db->get_where('ketrampilan', ['daftar_nilai' => $daftar_nilai, 'siswa' => $idSiswa, 'mapel' => $mapel])->row_array();
    }
    public function get_all_class_in()
    {
        $this->db->order_by('kelas', 'ASC');
        $this->db->where_not_in('id', 0);
        return $this->db->get('kelas')->result_object();
    }
    public function get_all_class()
    {
        $this->db->order_by('kelas', 'ASC');
        return $this->db->get('kelas')->result_object();
    }
    public function get_all_year()
    {
        $this->db->order_by('tahun', 'ASC');
        return $this->db->get('tahun')->result_object();
    }
    public function get_all_semester()
    {
        $this->db->order_by('semester', 'ASC');
        return $this->db->get('semester')->result_object();
    }
    public function get_all_lesson()
    {
        $this->db->order_by('kelompok', 'ASC');
        return $this->db->get('mapel')->result_object();
    }
    public function get_all_lesson_a()
    {
        $result = $this->db->get_where('mapel', ['kelompok' => 'A']);
        return $result->result_object();
    }
    public function get_all_lesson_b()
    {
        $result = $this->db->get_where('mapel', ['kelompok' => 'B']);
        return $result->result_object();
    }
    public function get_all_lesson_c()
    {
        $result = $this->db->get_where('mapel', ['kelompok' => 'C']);
        return $result->result_object();
    }
    public function get_all_student()
    {
        $this->db->select('siswa.*, kelas.kelas as kelas');
        $this->db->join('kelas', 'kelas.id = siswa.kelas', 'left');
        $this->db->order_by('nama', 'ASC');
        return $this->db->get('siswa')->result_object();
    }
    public function get_all_student_by_class($id)
    {
        $this->db->select('siswa.*, kelas.kelas as kelas');
        $this->db->where('siswa.kelas', $id);
        $this->db->join('kelas', 'kelas.id = siswa.kelas', 'left');
        $this->db->order_by('nama', 'ASC');
        return $this->db->get('siswa')->result_object();
    }
    public function get_all_teacher()
    {
        $this->db->select('guru.*, kelas.kelas as wali');
        $this->db->join('kelas', 'kelas.id = guru.wali', 'left');
        $this->db->order_by('nama', 'ASC');
        return $this->db->get('guru')->result_object();
    }
    public function get_all_score_list()
    {
        $this->db->select('daftar_nilai.*, kelas.kelas as kelas, guru.nama as guru, semester.semester as semester, tahun.tahun as tahun');
        $this->db->join('kelas', 'kelas.id = daftar_nilai.kelas', 'left');
        $this->db->join('guru', 'guru.id = daftar_nilai.guru', 'left');
        $this->db->join('tahun', 'tahun.id = daftar_nilai.tahun', 'left');
        $this->db->join('semester', 'semester.id = daftar_nilai.semester', 'left');
        // $this->db->order_by('nama', 'ASC');
        return $this->db->get('daftar_nilai')->result_object();
    }
    public function get_all_score_list_teacher($id)
    {
        $this->db->select('daftar_nilai.*, kelas.kelas as kelas, guru.nama as guru, semester.semester as semester, tahun.tahun as tahun');
        $this->db->join('kelas', 'kelas.id = daftar_nilai.kelas', 'left');
        $this->db->join('guru', 'guru.id = daftar_nilai.guru', 'left');
        $this->db->join('tahun', 'tahun.id = daftar_nilai.tahun', 'left');
        $this->db->join('semester', 'semester.id = daftar_nilai.semester', 'left');
        $this->db->where('daftar_nilai.guru', $id);
        return $this->db->get('daftar_nilai')->result_object();
    }
    public function hitung_siswa()
    {
        $this->db->from('siswa');
        return $this->db->count_all_results();
    }
    public function hitung_guru()
    {
        $this->db->from('guru');
        return $this->db->count_all_results();
    }
    public function hitung_mapel()
    {
        $this->db->from('mapel');
        return $this->db->count_all_results();
    }
    public function hitung_kelas()
    {
        $this->db->from('kelas');
        return $this->db->count_all_results();
    }
    public function delete_class($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kelas');
        return $this->db->affected_rows();
    }
    public function delete_lesson($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('mapel');
        return $this->db->affected_rows();
    }
    public function delete_student($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('siswa');
        return $this->db->affected_rows();
    }
    public function delete_teacher($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('guru');
        return $this->db->affected_rows();
    }
    public function delete_ekstrakulikuler($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('ekstrakulikuler');
        return $this->db->affected_rows();
    }
    public function delete_prestasi($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('prestasi');
        return $this->db->affected_rows();
    }
    public function delete_score_list($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('daftar_nilai');
        return $this->db->affected_rows();
    }
    public function delete_user($username)
    {
        $this->db->where('username', $username);
        $this->db->delete('user');
        return $this->db->affected_rows();
    }
}
