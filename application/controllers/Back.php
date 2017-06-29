<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Back extends CI_Controller {

	public function index() {
		$data['page'] = 'index';
		
		$data['topNav'] = $this->load->view('partial/_topNav',NULL, TRUE);
		$data['sideNav'] = $this->load->view('partial/_sideNav', NULL, TRUE);
		$data['topTiles'] = $this->load->view('partial/_topTiles', NULL, TRUE);
		$data['charts'] = $this->load->view('partial/_charts', NULL, TRUE);
   		
		$this->load->view('layout', $data);
	}
}
