<?php defined('BASEPATH') or exit('No direct script access allowed');
class Tahap extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index($role = 0)
	{
		$data['ilmiah'] = "tampilkan semua ilmiah";
		$data['view'] = 'admin/tahap/index';
		$this->load->view('layout', $data);
	}



	
}
