<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Dashboard extends Admin_Controller {
		public function __construct(){
			parent::__construct();
		}

		public function index(){
			$data['view'] = 'dashboard/index'; 
			$this->load->view('layout', $data);
		}
		
	}

?>	
