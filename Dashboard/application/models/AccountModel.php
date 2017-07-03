<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AccountModel extends CI_Model {

    public function Validate($username, $password) 
	{
		log_message('debug','[AccountModel][Validate] Start');

		$this->db->where('Username', $username);
		$this->db->where('Password', sha1($password));
		log_message('debug','[AccountModel][Validate] username: ' . $username);
		log_message('debug','[AccountModel][Validate] password: ' . $password);
		
		$q = $this->db->get('ib_user');		
		if ($q->num_rows() == 1) {
			log_message('debug','[AccountModel][Validate] End');	
			return true;
		} else {
			log_message('debug','[AccountModel][Validate] End');	
			return false;
		}
	}

    // Get User informations by username
    public function getUserInformations($username) {

        log_message('debug','[AccountModel][getUserInformations] Start');

		$this->db->select('name, surname, username');
		$this->db->from('ib_user');
		$this->db->where('username', $username);

        $result = $this->db->get()->result();

        log_message('debug','[AccountModel][getUserInformations] End');

		return $result[0];
	}
	
}
