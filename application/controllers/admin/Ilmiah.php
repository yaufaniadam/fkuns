<?php defined('BASEPATH') or exit('No direct script access allowed');
class Ilmiah extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();	
	}
 
	public function index()
	{		
		$query = $this->db->query("SELECT i.judul_ilmiah, i.date, k.kategori, rt.tahap, r.nama_lengkap FROM ilmiah i
		LEFT JOIN kategori_ilmiah k ON k.id=i.id_kategori		
		LEFT JOIN residen r ON r.id=i.id_residen		
		LEFT JOIN residen_tahap rt ON rt.id=i.id_tahap		
		");
		$result = $query->result_array();

		$data['query'] = $result;
		$data['id_menu'] = "ilmiah";
		$data['class_menu'] = "index";
		$data['title'] = 'Ilmiah';
		//$data['deskripsi'] = 'Tampilkan semua ilmiah dari semua residen. dan semua tahap';
		$data['view'] = 'ilmiah/index.php';
		$this->load->view('layout', $data);
	}
	
	public function tahap($tahap)
	{		
		$query = $this->db->query("SELECT i.judul_ilmiah, i.date, k.kategori, rt.tahap, r.nama_lengkap FROM ilmiah i
		LEFT JOIN kategori_ilmiah k ON k.id=i.id_kategori		
		LEFT JOIN residen r ON r.id=i.id_residen		
		LEFT JOIN residen_tahap rt ON rt.id=i.id_tahap	
		WHERE i.id_tahap=$tahap
		");
		$result = $query->result_array();

		$data['query'] = $result;
		$data['id_menu'] = "ilmiah";
		$data['class_menu'] = "tahap".$tahap;
		$data['title'] = 'Ilmiah Tahap '. $tahap;
		//$data['deskripsi'] = 'Tampilkan semua ilmiah dari semua residen berdasarkan tahap';
		$data['view'] = 'ilmiah/index.php';
		$this->load->view('layout', $data);
	}
	public function divisi()
	{		
		$query = $this->db->query("SELECT i.judul_ilmiah, i.date, k.kategori, rt.tahap, r.nama_lengkap FROM ilmiah i
		LEFT JOIN kategori_ilmiah k ON k.id=i.id_kategori		
		LEFT JOIN residen r ON r.id=i.id_residen		
		LEFT JOIN residen_tahap rt ON rt.id=i.id_tahap	
		WHERE (rt.tahap='2a' OR rt.tahap='2b')
		");
		$result = $query->result_array();

		$data['query'] = $result;
		$data['id_menu'] = "ilmiah";
		$data['class_menu'] = "divisi";
		$data['title'] = 'Ilmiah Semua Divisi ';
		$data['deskripsi'] = 'Tampilkan semua ilmiah dari semua residen berdasarkan Divisi. Yg tampil hanya tahap 2a dan 2b saja';
		$data['view'] = 'ilmiah/index.php';
		$this->load->view('layout', $data);
	}
	
}
