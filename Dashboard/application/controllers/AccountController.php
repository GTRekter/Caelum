<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AccountController extends CI_Controller {

	/* ==== START: PUBLIC FUNCTIONS ==== */
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
				$validationResult = $this->validateCredentials($username, $password);
				log_message('debug','[Autenticate] ValidationResult: ' . $validationResult);

				if ($validationResult) {					
					redirect('back');	
				} else {
					redirect('front/login');
				}
			}
		} catch(Exception $e) {
			log_message('error','[AccountController][Autenticate] Message' + $e->getMessage());
			log_message('debug','[AccountController][Autenticate] End');
		}
	}

	public function getUserInformations($username) {
				
		log_message('debug','[AccountController][getUserInformations] Start');

		$this->load->model('AccountModel');
		$user = $this->AccountModel->getUserInformations($username);
		log_message('debug','[AccountController][Autenticate] UserInfo: ' . print_r($userInfo, TRUE));					
				
		log_message('debug','[AccountController][getUserInformations] End');

		return $user;
	}
	/* ==== END: PUBLIC FUNCTIONS ==== */

	/* ==== START: PRIVATE FUNCTIONS ==== */
	private function IsAuthenticated() {

		log_message('debug','[AccountController][getUserInformations] Start');
		
		$isAuthenticated = $this->session->userdata('isAuthenticated');		
		if (!isset($isAuthenticated) || $isAuthenticated != true) {
			return false;
		} else {
			return true;
		}
	}

	private function validateCredentials($username, $password) {

		log_message('debug','[AccountController][validateCredentials] Start');

		$this->load->model('AccountModel');
		$validationResult = $this->AccountModel->validate($username, $password);

		log_message('debug','[AccountController][validateCredentials] End');

		return $validationResult;
	}
	/* ==== END: PRIVATE FUNCTIONS ==== */
}
