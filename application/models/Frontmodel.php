<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frontmodel extends CI_Model {

	// Validate login
	function Validate($username, $password) 
	{
		log_message('debug','[Validate] Start');

		$this->db->where('Username', $username);
		$this->db->where('Password', sha1($password));
		log_message('debug','[Validate] username: ' . $username);
		log_message('debug','[Validate] password: ' . $password);
		
		$q = $this->db->get('ib_user');		
		if ($q->num_rows() == 1) {
			foreach ($q->result() as $row)
			{
			    $data[] = $row;
			}	

			log_message('debug','[Validate] End');	
			return $data;
		}
	}	
}
