<?php defined('BASEPATH') OR exit('No direct script access allowed');

class LayoutController extends CI_Controller {

	public function index() {
		log_message('debug','[LayoutController][index] Start');

		/* ==== START: HOMEPAGE ==== */
		$data['navBar'] = $this->load->view('frontend/partial/_navbar', NULL, TRUE);
		$data['homepage'] = $this->load->view('frontend/partial/_homepage', NULL, TRUE);
		$data['footer'] = $this->load->view('frontend/partial/_footer', NULL, TRUE);
   		/* ==== END: HOMEPAGE ==== */

		// /* ==== START: ABOUT ==== */
		$data['about'] = $this->load->view('frontend/partial/_about', NULL, TRUE);
		// /* ==== END: ABOUT ==== */

		// /* ==== START: RETIRE ==== */
		$data['retire'] = $this->load->view('frontend/partial/_retire', NULL, TRUE);
		// /* ==== END: RETIRE ==== */

		// /* ==== START: BREEDING ==== */
		$data['breeding'] = $this->load->view('frontend/partial/_breeding', NULL, TRUE);
		// /* ==== END: BREEDING ==== */

		// /* ==== START: CONTACT ==== */
		$data['contact'] = $this->load->view('frontend/partial/_contact', NULL, TRUE);
		// /* ==== END: CONTACT ==== */

		$this->load->view('frontend/layout', $data);

		log_message('debug','[LayoutController][index] Start');
	}

	public function login() {
		log_message('debug','[LayoutController][login] Start');

		$this->load->view('dashboard/login');

		log_message('debug','[LayoutController][login] End');
	}

	public function back() {
		log_message('debug','[LayoutController][back] Start');

		// check if the user has already log, instead show the login view
		$authenticationResult = $this->session->userdata('isAuthenticated');;
		if($authenticationResult) {

			$data['sideNav'] = $this->load->view('dashboard/partial/_sideNav', NULL, TRUE);
			$data['modals'] = $this->load->view('dashboard/partial/_modals', NULL, TRUE);
	
			/* ==== START: DASHBOARD ==== */
			$data['topTitle'] = $this->load->view('dashboard/partial/_topTitle', NULL, TRUE);
			$data['charts'] = $this->load->view('dashboard/partial/_charts', NULL, TRUE);
			$data['chat'] = $this->load->view('dashboard/partial/_chat', NULL, TRUE);
			$data['calendar'] = $this->load->view('dashboard/partial/_calendar', NULL, TRUE);
			   /* ==== END: DASHBOARD ==== */
	
			/* ==== START: LIST ==== */
			$data['list'] = $this->load->view('dashboard/partial/_list', NULL, TRUE);
			/* ==== END: LIST ==== */
	
			/* ==== START: DETAILS ==== */
			$data['details'] = $this->load->view('dashboard/partial/_details', NULL, TRUE);
			/* ==== END: DETAILS ==== */
	
			$this->load->view('dashboard/layout', $data);
		} else {
			$this->load->view('dashboard/login');
		}

		log_message('debug','[LayoutController][back] End');
	}


}
