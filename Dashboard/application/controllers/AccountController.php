<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AccountController extends CI_Controller {

	/* ==== START: PUBLIC FUNCTIONS ==== */
	public function Autenticate() {
		
		log_message('debug','[AccountController][Autenticate] Start');

		try {
			$username = $this->security->xss_clean($this->input->post('Username'));
			$password = $this->security->xss_clean($this->input->post('Password'));
			log_message('debug','[AccountController][Autenticate] Username: ' . $username);
			log_message('debug','[AccountController][Autenticate] Password: ' . $password);
			
			$this->load->library('form_validation');
			$this->form_validation->set_rules('Username', 'Username', 'trim|required');
			$this->form_validation->set_rules('Password', 'Password', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {

				log_message('debug','[AccountController][Autenticate] Form validation is false');
				$this->setAttemptsFromIp();
				redirect('LayoutController/back');

			} else {

				log_message('debug','[AccountController][Autenticate] Form validation is true');

				$validationResult = $this->validateCredentials($username, $password);
				log_message('debug','[AccountController][Autenticate] ValidationResult: ' . $validationResult);

				// TODO: Generate a custom token and store it in the session
				// by the token i can get all the user information
				// ex. $this->security->get_csrf_token_name();

				if ($validationResult) {
					log_message('debug','[AccountController][Autenticate] DB validation is true');
					
					$config['csrf_protection'] = FALSE;
					$this->resetAttemptsFromIp();
					
					$this->session->set_userdata( array('isAuthenticated' => 'true') );
					redirect('LayoutController/back');
				} else {
					log_message('debug','[AccountController][Autenticate] DB validation is false');
					$this->setAttemptsFromIp();
					redirect('LayoutController/back');
				}
			}
		} catch(Exception $e) {
			log_message('error','[AccountController][Autenticate] Message' . $e->getMessage());
			log_message('debug','[AccountController][Autenticate] End');
		}
	}

	public function Logout() {
		/* TODO:
		- at the login save a token in the session
		- save the token and use it to validate the call (FUCK YEAH)
		*/
		log_message('debug','[AccountController][Logout] Start');

		// $userToken = $this->session->userToken;
		// $validationResult = $this->validateToken($userToken);

		// if ($validationResult) {							
		// 	$this->load->model('AccountService');
		// 	$user = $this->AccountService->logout($currentUser);
		// 	redirect('front/login');
		// }

		$this->session->sess_destroy();
		redirect('LayoutController/back');

		log_message('debug','[AccountController][Logout] Start');
	}

	public function GetUserInformations($username) {
				
		log_message('debug','[AccountController][getUserInformations] Start');

		$this->load->model('AccountService');
		$user = $this->AccountService->getUserInformations($username);
		log_message('debug','[AccountController][Autenticate] UserInfo: ' . print_r($userInfo, TRUE));					
				
		log_message('debug','[AccountController][getUserInformations] End');

		return $user;
	}

	public function GetAttemptsFromIp() {	
		
		log_message('debug','[AccountController][GetAttemptsFromIp] Start');

		$viewModel = new AttemptsViewModel();

		try {			
		 	$this->load->model('AccountService');
		 	$attempts = $this->AccountService->getAttemptsFromIp($_SERVER['REMOTE_ADDR']);		
		 	log_message('debug','[AccountController][GetAttemptsFromIp] attempts: ' . $attempts);

		 	// Check if the user try to login more than 5 times
		 	if($attempts < 5) {
		 		$viewModel->loginAllowed = true;
			 }
			 
			$viewModel->ip = $_SERVER['REMOTE_ADDR'];
		 	$viewModel->attempts = 5 - $attempts;
		 	$viewModel->execution = true;

		} catch(Exception $exc) {
		 	$viewModel->execution = false;
		}			

		log_message('debug','[AccountController][GetAttemptsFromIp] viewModel: ' . print_r($viewModel, TRUE));
		log_message('debug','[AccountController][GetAttemptsFromIp] End');

		echo json_encode($viewModel);
	}

	public function IsAuthenticated() {

		log_message('debug','[AccountController][IsAuthenticated] Start');
		
		$viewModel = new AutenticationViewModel();

		try {	
			$isAuthenticated = $this->session->userdata('isAuthenticated');		
			log_message('debug','[AccountController][IsAuthenticated] isAuthenticated: ' . $isAuthenticated);	

			$viewModel->execution = true;
			if (isset($isAuthenticated) && $isAuthenticated == true) {
				$viewModel->isAuthenticated = true;
			}

		} catch(Exception $exc) {
			$viewModel->execution = false;
		}	

		log_message('debug','[AccountController][IsAuthenticated] viewModel: ' . print_r($viewModel, TRUE));	
		log_message('debug','[AccountController][IsAuthenticated] End');

		echo json_encode($viewModel);
	}
	/* ==== END: PUBLIC FUNCTIONS ==== */

	/* ==== START: PRIVATE FUNCTIONS ==== */
	private function validateCredentials($username, $password) {

		log_message('debug','[AccountController][validateCredentials] Start');
		
		$this->load->model('AccountService');
		$validationResult = $this->AccountService->Validate($username, $password);

		log_message('debug','[AccountController][validateCredentials] validationResult: ' . $validationResult);
		log_message('debug','[AccountController][validateCredentials] End');

		return $validationResult;
	}

	private function setAttemptsFromIp() {

		log_message('debug','[AccountController][setAttemptsFromIp] Start');
		
		$this->load->model('AccountService');
		$this->AccountService->setAttemptsFromIp($_SERVER['REMOTE_ADDR']);

		log_message('debug','[AccountController][setAttemptsFromIp] End');
	}

	private function resetAttemptsFromIp() {
		log_message('debug','[AccountController][resetAttemptsFromIp] Start');
		
		$this->load->model('AccountService');
		$this->AccountService->resetAttemptsFromIp($_SERVER['REMOTE_ADDR']);

		log_message('debug','[AccountController][resetAttemptsFromIp] End');
	}

	private function validateToken($token) {
		
		log_message('debug','[AccountController][validateCredentials] Start');

		$this->load->model('AccountService');
		// $validationResult = $this->AccountService->validate($username, $password);
		// TODO: store the token on the DB or find something else to persist it

		log_message('debug','[AccountController][validateCredentials] End');

		return $validationResult;
	}
	/* ==== END: PRIVATE FUNCTIONS ==== */
}


// Viewmodels
class ExecutionViewModel  {
	public $execution = false;
}

class AttemptsViewModel extends ExecutionViewModel {
	public $ip;
	
	public $attempts;

	public $loginAllowed;

	function __construct() {
		$this->attempts = 0;
		$this->loginAllowed = false;
	}
}

class AutenticationViewModel extends ExecutionViewModel {
	public $isAuthenticated;

	function __construct() {
		$this->isAuthenticated = false;
	}
}
