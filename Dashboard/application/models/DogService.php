<?php defined('BASEPATH') OR exit('No direct script access allowed');

class DogService extends CI_Model {

	public function addDog($data) {
		
		log_message('debug','[DogService][addDog] Start');
		log_message('debug','[DogService][addDog] data: ' . print_r($data, TRUE));

		$this->db->insert('ib_dog', $data);	

		$insertedID = $this->db->insert_id();
	
		log_message('debug','[DogService][addDog] End');

		return $insertedID;
	}

	public function addDogImage($data) {
		
		log_message('debug','[DogService][addDogImage] Start');
		log_message('debug','[DogService][addDogImage] data: ' . print_r($data, TRUE));

		$this->db->insert('ib_dogimages', $data);	

		log_message('debug','[DogService][addDogImage] End');
	}

	public function addDogPedigree($data) {
		
		log_message('debug','[DogService][addDogPeaddDogPedigreedegree] Start');
		log_message('debug','[DogService][addDogPedigree] data: ' . print_r($data, TRUE));

		$this->db->insert('ib_dogpedigrees', $data);	

		log_message('debug','[DogService][addDogPedigree] End');
	}

	public function getDogsCount() {

		log_message('debug','[DogService][getDogsCount] Start');
		
		$this->db->select('count(*) as count');
		$this->db->from('ib_dog');
		
		$result = $this->db->get();
		
		log_message('debug','[DogService][getDogsCount] End');

		return $result->result()[0];
	}

    public function getDogs($limit, $offset) {

        log_message('debug','[DogService][getDogs] Start');
		
		$this->db->select('ib_dog.id, ib_color.name as color, ib_race.name as race, ib_dog.name, ib_dog.description, gender, dateofbirth, roi, microchip');
		$this->db->from('ib_dog');
		$this->db->join('ib_color', 'ib_color.id = ib_dog.idColor', 'inner');
		$this->db->join('ib_race', 'ib_race.id = ib_dog.idRace', 'inner');
		$this->db->limit($limit,$offset);
		
        $result = $this->db->get();

		if ($result->num_rows() > 0) {

			log_message('debug','[DogService][getDogs] result: ' . print_r($result->result(), TRUE));
			foreach ($result->result() as $row)
			{
			    $data[] = $row;
			}

			log_message('debug','[DogService][getDogs] data: ' . print_r($data, TRUE));
			log_message('debug','[DogService][getDogs] End');

			return $data;
		}
	}

	public function getDogsByRaces($ids) {
		
		log_message('debug','[DogService][getDogsByRaces] Start');
		
		$this->db->select('ib_dog.id, ib_race.id as raceId, ib_race.name as race, ib_dog.name');
		$this->db->from('ib_dog');
		$this->db->join('ib_race', 'ib_race.id = ib_dog.idRace', 'inner');

		$where = "";
		for($index = 0; $index < sizeof($ids); $index++) {
			if($index == 0) {
				$where = "ib_race.id=".$ids[$index];
			} else {
				$where = $where." OR ib_race.id=".$ids[$index];
			} 			
		}
		$this->db->where($where);

		$result = $this->db->get();

		if ($result->num_rows() > 0) {

			log_message('debug','[DogService][getDogsByRaces] result: ' . print_r($result->result(), TRUE));
			foreach ($result->result() as $row)
			{
				$data[] = $row;
			}

			log_message('debug','[DogService][getDogsByRaces] data: ' . print_r($data, TRUE));
			log_message('debug','[DogService][getDogsByRaces] End');

			return $data;
		}
	}

	public function getDogsByColors($ids) {
		
		log_message('debug','[DogService][getDogsByColors] Start');
		
		$this->db->select('ib_dog.id, ib_color.name as color, ib_dog.name');
		$this->db->from('ib_dog');
		$this->db->join('ib_color', 'ib_color.id = ib_dog.idColor', 'inner');

		$where = "";
		for($index = 0; $index < sizeof($ids); $index++) {
			if($index == 0) {
				$where = "ib_color.id=".$ids[$index];
			} else {
				$where = $where." OR ib_color.id=".$ids[$index];
			} 			
		}
		$this->db->where($where);

		$result = $this->db->get();

		if ($result->num_rows() > 0) {

			log_message('debug','[DogService][getDogsByColors] result: ' . print_r($result->result(), TRUE));
			foreach ($result->result() as $row)
			{
				$data[] = $row;
			}

			log_message('debug','[DogService][getDogsByColors] data: ' . print_r($data, TRUE));
			log_message('debug','[DogService][getDogsByColors] End');

			return $data;
		}
	}

	public function getDogImages($id) {
		
		log_message('debug','[DogService][getDogImages] Start');
		
		$this->db->select('id, name, primary, path');
		$this->db->from('ib_dogimages');
		$this->db->where('idDog', $id);

		$result = $this->db->get();

		if ($result->num_rows() > 0) {

			log_message('debug','[DogService][getDogImages] result: ' . print_r($result->result(), TRUE));
			foreach ($result->result() as $row)
			{
				$data[] = $row;
			}

			log_message('debug','[DogService][getDogImages] data: ' . print_r($data, TRUE));
			log_message('debug','[DogService][getDogImages] End');

			return $data;
		}
	}

	public function getDogPedigree($id) {
		
		log_message('debug','[DogService][getDogPedigree] Start');
		
		$this->db->select('id, name, path');
		$this->db->from('ib_dogpedigrees');
		$this->db->where('idDog', $id);

		$result = $this->db->get();

		if ($result->num_rows() > 0) {

			log_message('debug','[DogService][getDogPedigree] result: ' . print_r($result->result(), TRUE));
			foreach ($result->result() as $row)
			{
				$data[] = $row;
			}

			log_message('debug','[DogService][getDogPedigree] data: ' . print_r($data, TRUE));
			log_message('debug','[DogService][getDogPedigree] End');

			return $data;
		}
	}

	public function updateDog($id, $data) {

		log_message('debug','[DogService][updateDog] Start');

		$this->db->where('id', $id);
		$this->db->update('ib_dog', $data); 

		log_message('debug','[DogService][updateDog] End');
	}

	public function deleteDog($id) {
		
		log_message('debug','[DogService][deleteDogs] Start');
		
		$this->db->where('id', $id);
		$this->db->delete('ib_dog');

		log_message('debug','[DogService][deleteDogs] End');
	}
	
	public function deleteDogImage($id) {
		
		log_message('debug','[DogService][deleteDogImages] Start');
		
		$this->db->where('id', $id);
		$this->db->delete('ib_dogimages');

		log_message('debug','[DogService][deleteDogImages] End');
	}

	public function deleteDogPedigree($id) {
		
		log_message('debug','[DogService][deleteDogPedigree] Start');
		
		$this->db->where('id', $id);
		$this->db->delete('ib_dogpedigrees');

		log_message('debug','[DogService][deleteDogPedigree] End');
	}
}