<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AccountService extends CI_Model {

    public function Validate($username, $password) {
		log_message('debug','[AccountService][Validate] Start');

		$isValid = false;

		$this->db->where('Username', $username);
		$this->db->where('Password', sha1($password));
		log_message('debug','[AccountService][Validate] username: ' . $username);
		log_message('debug','[AccountService][Validate] password: ' . $password);
		
		$q = $this->db->get('ib_user');	
		log_message('debug','[AccountService][setAttemptsFromIp] num_rows: ' . $q->num_rows());	
		if ($q->num_rows() == 1) {
			$isValid = true;
		} 

		log_message('debug','[AccountService][Validate] End');	
		log_message('debug','[AccountService][Validate] isValid: ' . $isValid);	

		return $isValid;
	}

	public function Logout($username) {
		log_message('debug','[AccountService][logout] Start');

		$this->db->select('name, surname, username');
		$this->db->from('ib_user');
		$this->db->where('username', $username);

        $result = $this->db->get()->result();

        log_message('debug','[AccountService][logout] End');
	}

	public function GetAttemptsFromIp($ip) {
		$this->db->select('ip, attempts');
		$this->db->from('ib_loginchronology');	
		$this->db->where('ip', $ip);
		
		$q = $this->db->get();		
		if ($q->num_rows() > 0) {
			$data = array_shift($q->result_array());		
			return $data['attempts'];
		}
		return 0;
	}

	// First check if the current ip has already try to login, then increment or create the attempts value associated to himself
	public function setAttemptsFromIp($ip) {

		log_message('debug','[AccountService][setAttemptsFromIp] Start');

		$this->db->select('attempts');
		$this->db->from('ib_loginchronology');	
		$this->db->where('ip', $ip);
		
		$q = $this->db->get();		
		
		log_message('debug','[AccountService][setAttemptsFromIp] num_rows: ' . $q->num_rows());
		if ($q->num_rows() > 0) {

			foreach ($q->result() as $row)
			{
				// Increment the attempts
				$this->db->where('ip', $ip);
				$this->db->from('ib_LoginChronology');	
				$this->db->set('attempts', $row->attempts + 1);
				$this->db->update('ib_loginchronology');
			}
		} else {
			// Create a new row for the current IP
			$data['ip'] = $ip;
			$data['attempts'] = 1;
			$this->db->insert('ib_loginchronology', $data);
		}

		log_message('debug','[AccountService][setAttemptsFromIp] End');
	}

	public function resetAttemptsFromIp($ip) {
		
		log_message('debug','[AccountService][resetAttemptsFromIp] Start');

		$this->db->select('attempts');
		$this->db->from('ib_loginchronology');	
		$this->db->where('ip', $ip);
		
		$q = $this->db->get();		
		
		log_message('debug','[AccountService][resetAttemptsFromIp] num_rows: ' . $q->num_rows());
		if ($q->num_rows() > 0) {

			foreach ($q->result() as $row)
			{
				// Increment the attempts
				$this->db->where('ip', $ip);
				$this->db->from('ib_loginchronology');	
				$this->db->set('attempts', 0);
				$this->db->update('ib_loginchronology');
			}
		}

		log_message('debug','[AccountService][resetAttemptsFromIp] End');
	}

    // Get User informations by username
    public function getUserInformations($username) {

        log_message('debug','[AccountService][getUserInformations] Start');

		$this->db->select('name, surname, username');
		$this->db->from('ib_user');
		$this->db->where('username', $username);

        $result = $this->db->get()->result();

        log_message('debug','[AccountService][getUserInformations] End');

		return $result[0];
	}
	
}
