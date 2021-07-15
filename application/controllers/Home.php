<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Rapor_model', 'rapor');
	}
	public function index()
	{
		$sekolah = $this->rapor->get_school();
		$data['sekolah'] = $sekolah;
		$data['title'] = 'Sistem Akademik'; //Judul Halaman
		$this->load->view('home', $data); //Login view
		// echo password_hash('admin', PASSWORD_DEFAULT);
	}
}
