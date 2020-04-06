<?php defined('BASEPATH') or exit('No direct script access allowed');
class Residen extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$query = $this->db->query('select nama_lengkap, nim from residen');
		$result = $query->result_array();

		$data['query'] = $result;
		$data['id_menu'] = "residen";
		$data['class_menu'] = "index";
		$data['title'] = 'Residen'; 
		$data['type'] = 'all_residen';
		$data['deskripsi'] = 'Tampilkan semua residen baik yang masih aktif maupun yng sudah lulus';
		$data['view'] = 'residen/index';
		$this->load->view('layout', $data);
	}

	public function tahap()
	{
		$query = $this->db->query("SELECT r.nama_lengkap, r.nim, 
		(select rt.tahap from residen_tahap rt where rt.id_residen = r.id order by rt.id desc limit 1) as tahap 
		from residen r		
		");
		$result = $query->result_array();

		$data['query'] = $result;
		$data['id_menu'] = "residen";
		$data['class_menu'] = "residen-tahap";
		$data['title'] = 'Residen by Tahap';
		$data['type'] = 'residen_by_tahap';
		$data['deskripsi'] = 'Tampilkan semua residen aktif dan Tahap yang ditempuh saat ini';
		$data['view'] = 'residen/index';
		$this->load->view('layout', $data);
	}

	public function tahap_by_residen($id_residen)
	{
		$query = $this->db->query("SELECT rt.*, r.nama_lengkap FROM residen_tahap rt
		LEFT JOIN residen r ON r.id=rt.id_residen 
		WHERE rt.id_residen=$id_residen
		");
		$result = $query->result_array();

		$data['query'] = $result;
		$data['id_menu'] = "residen";
		$data['class_menu'] = "tahap-residen";
		$data['title'] = 'Tahap spesifik Residen';
		$data['type'] = 'tahap_spesifik_residen';
		$data['deskripsi'] = 'Tampilkan semua tahap spesifik residen';
		$data['view'] = 'residen/index';
		$this->load->view('layout', $data);
	}

	public function divisi()
	{
		$query = $this->db->query("select r.nama_lengkap, r.nim, rt.tahap, rto.id_tod, rto.id_divisi, d.divisi, CONCAT(DATE_FORMAT(tod.start_date, '%M %Y') , ' - ', DATE_FORMAT(tod.end_date, '%M %Y')) as periode
		from residen r
		LEFT JOIN residen_tahap rt ON rt.id_residen = r.id
		LEFT JOIN residen_tod rto ON rto.id_residen = r.id
		JOIN divisi d ON rto.id_divisi = d.id
		JOIN tod tod ON rto.id_tod = tod.id
		WHERE (rt.tahap='2a' OR rt.tahap='2b')	
		");
		$result = $query->result_array();

		$data['query'] = $result;
		$data['id_menu'] = "residen";
		$data['class_menu'] = "residen-divisi";
		$data['title'] = 'Residen by Divisi';
		$data['type'] = 'residen_by_divisi';
		$data['deskripsi'] = 'Tampilkan semua residen yang sudah menempuh tahap 2a dan 2b serta divisinya yg ditempuh saat ini';
		$data['view'] = 'residen/index';
		$this->load->view('layout', $data);
	}

	public function divisi_by_residen($id_residen)
	{
		$query = $this->db->query("SELECT rd.*,r.nama_lengkap FROM residen_divisi rd
		LEFT JOIN residen r ON r.id=rd.id_residen
		WHERE rd.id_residen=$id_residen
		");
		$result = $query->result_array();

		$data['query'] = $result;
		$data['id_menu'] = "residen";
		$data['class_menu'] = "divisi-residen";
		$data['title'] = 'Divisi spesifik Residen';
		$data['type'] = 'divisi_spesifik_residen';
		$data['deskripsi'] = 'Tampilkan semua divisi spesifik residen';
		$data['view'] = 'residen/index';
		$this->load->view('layout', $data);
	}

}
