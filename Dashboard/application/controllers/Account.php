<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	public function Autenticate() {
		
		log_message('debug','[Autenticate] Start');

		try {
			$username = $this->security->xss_clean($this->input->post('Username'));
			$password = $this->security->xss_clean($this->input->post('Password'));
			log_message('debug','[Autenticate] Username: ' . $username);
			log_message('debug','[Autenticate] Password: ' . $password);
			
			$this->load->library('form_validation');
			$this->form_validation->set_rules('Username', 'Username', 'trim|required');
			$this->form_validation->set_rules('Password', 'Password', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				log_message('debug','[Autenticate] Form validation is false');
				redirect('front/login');
			} else {
				$query = $this->frontmodel->validate($username, $password);
				log_message('debug','[Autenticate] Query: ' . $query);
				if ($query) {
					$data = array(
						'username' => $username,
						'isAuthenticated' => true
					);				
					$this->session->set_userdata($data);
					redirect('back');	
				} else {
					log_message('debug','[Autenticate] Query is false');
					redirect('front/login');
				}
			}
		} catch(Exception $e) {
			log_message('error','[Autenticate] message' + $e->getMessage());
			log_message('debug','[Autenticate] End');
		}
	}

	public function IsAuthenticated() {
		$isAuthenticated = $this->session->userdata('isAuthenticated');		
		if (!isset($isAuthenticated) || $isAuthenticated != true) {
			return false;
		} else {
			return true;
		}
	}
}
