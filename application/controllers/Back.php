<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Back extends CI_Controller {

	// PRESENTATION
	public function index() {
		$data['page'] = 'index';
		
		$data['topNav'] = $this->load->view('partial/_topNav',NULL, TRUE);
		$data['sideNav'] = $this->load->view('partial/_sideNav', NULL, TRUE);
		$data['home'] = $this->load->view('partial/_home', NULL, TRUE);
   		
		$this->load->view('layout', $data);
	}
}
