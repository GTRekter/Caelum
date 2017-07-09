<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Back extends CI_Controller {

	public function index() 
	{
		// Read the configuration from the config folder
		// $this->getConfiguration();

		$data['topNav'] = $this->load->view('partial/_topNav',NULL, TRUE);
		$data['sideNav'] = $this->load->view('partial/_sideNav', NULL, TRUE);

		/* ==== START: DASHBOARD ==== */
		$data['topTiles'] = $this->load->view('partial/_topTiles', NULL, TRUE);
		$data['charts'] = $this->load->view('partial/_charts', NULL, TRUE);
		$data['activities'] = $this->load->view('partial/_activities', NULL, TRUE);
		$data['toDoList'] = $this->load->view('partial/_toDoList', NULL, TRUE);
   		/* ==== END: DASHBOARD ==== */

		/* ==== START: LIST ==== */
		$data['topTitle'] = $this->load->view('partial/_topTitle', NULL, TRUE);
		$data['list'] = $this->load->view('partial/_list', NULL, TRUE);
		/* ==== END: LIST ==== */

		/* ==== START: DETAILS ==== */
		$data['topTitle'] = $this->load->view('partial/_topTitle', NULL, TRUE);
		$data['details'] = $this->load->view('partial/_details', NULL, TRUE);
		/* ==== END: DETAILS ==== */

		$this->load->view('layout', $data);
	}
}
