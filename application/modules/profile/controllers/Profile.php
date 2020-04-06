<?php defined('BASEPATH') or exit('No direct script access allowed');
class Profile extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/profile_model', 'profile_model');
	}
	//-------------------------------------------------------------------------
	public function index()
	{
		if ($this->input->post('submit')) {

			$this->form_validation->set_rules('email', 'E-mail', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data['user'] = $this->profile_model->get_user_detail();
				$data['title'] = 'Admin Profile';
				$data['view'] = 'admin/profile/index';
				$this->load->view('layout', $data);
			} else {

				$upload_path = './uploads/fotoProfil';

				if (!is_dir($upload_path)) {
					mkdir($upload_path, 0777, TRUE);
				}
				//$newName = "hrd-".date('Ymd-His');
				$config = array(
					'upload_path' => $upload_path,
					'allowed_types' => "jpg|png|jpeg",
					'overwrite' => FALSE,
				);

				$this->load->library('upload', $config);
				$this->upload->do_upload('foto_profil');
				$foto_profil = $this->upload->data();

				$data = array(
				
					'email' => $this->input->post('email'),
					'password' => ($this->input->post('password') !== "" ? password_hash($this->input->post('password'), PASSWORD_BCRYPT) : $this->input->post('password_hidden')),
					'updated_at' => date('Y-m-d : h:m:s'),
					'photo' => ($foto_profil['file_name']) !== "" ? $upload_path . '/' . $foto_profil['file_name'] : $this->input->post('foto_profil_hidden'),
				);

				$data = $this->security->xss_clean($data);
				$result = $this->profile_model->update_user($data);
				if ($result) {
					$this->session->set_flashdata('msg', 'Profil Anda berhasil diubah!');
					redirect(base_url('profile'), 'refresh');
				}
			}
		} else {
			$data['user'] = $this->profile_model->get_user_detail();
			$data['title'] = 'Admin Profile';
			$data['view'] = 'profile/index';
			$this->load->view('layout', $data);
		}
	}
}
