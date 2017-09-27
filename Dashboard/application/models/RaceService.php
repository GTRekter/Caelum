<?php defined('BASEPATH') OR exit('No direct script access allowed');

class RaceService extends CI_Model {

	public function addRace($data) {

		log_message('debug','[addRace] Start');

		log_message('debug','[addRace] data: ' . print_r($data, TRUE));

		$this->db->insert('ib_race', $data);		

		log_message('debug','[addRace] End');
	}

	public function updateRace($id, $data) {

		log_message('debug','[addRace] Start');

		$this->db->where('id', $id);
		$this->db->update('ib_race', $data); 

		log_message('debug','[addRace] End');
	}
			
    public function getRaces($limit,$offset) {

        log_message('debug','[getRaces] Start');
		
		$this->db->select('id, name, description');
		$this->db->from('ib_race');
		$this->db->limit($limit,$offset);
		
        $result = $this->db->get();

		if ($result->num_rows() > 0) {

			log_message('debug','[getRaces] result: ' . print_r($result->result(), TRUE));
			foreach ($result->result() as $row)
			{
			    $data[] = $row;
			}

			log_message('debug','[getRaces] data: ' . print_r($data, TRUE));
			log_message('debug','[getRaces] End');

			return $data;
		}
	}

	public function getAllRaces() {

		log_message('debug','[getRaces] Start');
		
		$this->db->select('id, name, description');
		$this->db->from('ib_race');
		
		$result = $this->db->get();

		if ($result->num_rows() > 0) {

			log_message('debug','[getRaces] result: ' . print_r($result->result(), TRUE));
			foreach ($result->result() as $row)
			{
				$data[] = $row;
			}

			log_message('debug','[getRaces] data: ' . print_r($data, TRUE));
			log_message('debug','[getRaces] End');

			return $data;
		}
	}
	
	public function getRacesCount() {
		log_message('debug','[getRacesCount] Start');
		
		$this->db->select('count(*) as count');
		$this->db->from('ib_race');
		
        $result = $this->db->get();
		return $result->result()[0];
	}

	public function deleteRaces($ids) {
		
		log_message('debug','[deleteRaces] Start');
		
		foreach($ids as $id) {
			$this->db->where('id', $id);

			log_message('debug','[deleteRaces] id:' . $id);

			$this->db->delete('ib_race');
		}

		log_message('debug','[deleteRaces] End');
	}
}