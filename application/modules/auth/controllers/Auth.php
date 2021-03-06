<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Auth extends CI_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->library('mailer');
			$this->load->model('auth_model', 'auth_model');
		}
		//--------------------------------------------------------------
		public function index(){
			if(!$this->session->has_userdata('is_login')) {		
				redirect ('auth/login');
			}
		}
		//--------------------------------------------------------------
		public function login(){
			if($this->input->post('submit')){
				$this->form_validation->set_rules('username', 'Username', 'trim|required');
				$this->form_validation->set_rules('password', 'Password', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$this->load->view('auth/login');
				}
				else {
					$data = array(
					'username' => $this->input->post('username'),
					'password' => $this->input->post('password')
					);
					$result = $this->auth_model->login($data);
					if($result){					
				    	
						$user_data = array(
							'user_id' => $result['id'],
							'username' => $result['username'],
							'role' => $result['role'],
							'is_login' => TRUE,
										
						);

						$this->session->set_userdata($user_data);
						redirect(base_url('admin/dashboard'), 'refresh');						
					}

					else{
						$data['msg'] = 'Invalid Username or Password!';
						$this->load->view('auth/login', $data);
					}
				}
			}
			else{
				$this->load->view('auth/login');
			}
		}	

		
		//--------------------------------------------------		
		public function forgot_password(){
			if($this->input->post('submit')){
				//checking server side validation
				$this->form_validation->set_rules('email', 'Email', 'valid_email|trim|required');
				if ($this->form_validation->run() === FALSE) {
					$this->load->view('auth/forget_password');
					return;
				}
				$email = $this->input->post('email');
				$response = $this->auth_model->check_user_mail($email);
				if($response){
					$rand_no = rand(0,1000);
					$pwd_reset_code = md5($rand_no.$response['id']);
					$this->auth_model->update_reset_code($pwd_reset_code, $response['id']);
					// --- sending email
					$name = $response['firstname'].' '.$response['lastname'];
					$email = $response['email'];
					$reset_link = base_url('auth/reset_password/'.$pwd_reset_code);
					$body = $this->mailer->Tpl_PwdResetLink($name,$reset_link);

					$this->load->helper('email_helper');
					$to = $email;
					$subject = 'Reset your password';
					$message =  $body ;
					$email = sendEmail($to, $subject, $message, $file = '' , $cc = '');
					if($email){
						$this->session->set_flashdata('success', 'We have sent instructions for resetting your password to your email');

						redirect(base_url('auth/forgot_password'));
					}
					else{
						$this->session->set_flashdata('error', 'There is the problem on your email');
						redirect(base_url('auth/forgot_password'));
					}
				}
				else{
					$this->session->set_flashdata('error', 'The Email that you provided are invalid');
					redirect(base_url('auth/forgot_password'));
				}
			}
			else{
				$data['title'] = 'Forget Password';
				$this->load->view('auth/forget_password',$data);	
			}
		}
		//----------------------------------------------------------------		
		public function reset_password($id=0){
			// check the activation code in database
			if($this->input->post('submit')){
				$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
				$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');

				if ($this->form_validation->run() == FALSE) {
					$result = false;
					$data['reset_code'] = $id;
					$data['title'] = 'Reseat Password';
					$this->load->view('auth/reset_password',$data);
				}   
				else{
					$new_password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
					$this->auth_model->reset_password($id, $new_password);
					$this->session->set_flashdata('success','New password has been Updated successfully.Please login below');
					redirect(base_url('auth/login'));
				}
			}
			else{
				$result = $this->auth_model->check_password_reset_code($id);
				if($result){
					$data['reset_code'] = $id;
					$data['title'] = 'Reseat Password';
					$this->load->view('auth/reset_password',$data);
				}
				else{
					$this->session->set_flashdata('error','Password Reset Code is either invalid or expired.');
					redirect(base_url('auth/forgot_password'));
				}
			}
		}
			
		public function logout(){
			$this->session->sess_destroy();
			redirect(base_url('auth/login'), 'refresh');
		}
			
	}  // end class


?>
