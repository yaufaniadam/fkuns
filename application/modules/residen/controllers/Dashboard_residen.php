<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Dashboard_residen extends MY_Controller {
		public function __construct(){
			parent::__construct();
		}

		public function index(){
			$data['view'] = 'residen/dashboard/index'; 
			$this->load->view('layout/layout', $data);
		}
		
	}

?>	
