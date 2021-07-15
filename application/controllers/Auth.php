<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Rapor_model', 'rapor');
	}
	public function index()
	{
		$data['sekolah'] = $this->rapor->get_school();
		$data['title'] = 'Login Sistem Akademik'; //Judul Halaman
		$username = $this->session->userdata('username');
		$user = $this->db->get_where('user', ['username' => $username])->row_array();
		if (!$user) {
			$this->load->view('login', $data); //Login view
		} else {
			if ($user['level'] == 1) {
				redirect('admin/dashboard');
			} else if ($user['level'] == 2) {
				redirect('guru/dashboard');
			} else {
				redirect('siswa/dashboard');
			}
		}
	}
	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$user = $this->db->get_where('user', ['username' => $username])->row_array();
		if ($user) {
			if (password_verify($password, $user['password'])) {
				$data = [
					'username' => $user['username'],
					'level' => $user['level']
				];
				$this->session->set_userdata($data);
				if ($user['level'] == 1) {
					redirect('admin/dashboard');
				} else if ($user['level'] == 2) {
					redirect('guru/dashboard');
				} else {
					redirect('siswa/dashboard');
				}
			} else {
				$this->session->set_flashdata('message', '<div class ="alert alert-danger" role= "alert">Password salah!</div>');
				$this->session->unset_userdata('username');
				$this->session->unset_userdata('level');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class ="alert alert-danger" role= "alert">Username belum terdaftar!</div>');
			$this->session->unset_userdata('username');
			$this->session->unset_userdata('level');
			redirect('auth');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kamu sudah keluar!</div>');
		redirect('auth');
	}
}
