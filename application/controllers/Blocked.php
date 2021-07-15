<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blocked extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Rapor_model', 'rapor');
	}
	public function index()
	{
		$this->load->view('blocked');
	}
}
