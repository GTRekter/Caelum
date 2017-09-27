<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ColorService extends CI_Model {

	public function addColor($data) {

		log_message('debug','[addColors] Start');

		$this->db->insert('ib_color', $data);		

		log_message('debug','[addColors] End');
	}

	public function updateColor($id, $data) {
		
		log_message('debug','[updateColor] Start');

		$this->db->where('id', $id);
		$this->db->update('ib_color', $data); 

		log_message('debug','[updateColor] End');
	}
	
    public function getColors($limit,$offset) {

        log_message('debug','[getColors] Start');
		
		$this->db->select('id, name');
		$this->db->from('ib_color');
		$this->db->limit($limit,$offset);

        $result = $this->db->get();

		if ($result->num_rows() > 0) {

			log_message('debug','[getColors] result: ' . print_r($result->result(), TRUE));
			foreach ($result->result() as $row)
			{
			    $data[] = $row;
			}

			log_message('debug','[getColors] data: ' . print_r($data, TRUE));
			log_message('debug','[getColors] End');

			return $data;
		}
	}

	public function getAllColors() {

		log_message('debug','[getAllColors] Start');
		
		$this->db->select('id, name');
		$this->db->from('ib_color');

		$result = $this->db->get();

		if ($result->num_rows() > 0) {

			log_message('debug','[getAllColors] result: ' . print_r($result->result(), TRUE));
			foreach ($result->result() as $row)
			{
				$data[] = $row;
			}

			log_message('debug','[getAllColors] data: ' . print_r($data, TRUE));
			log_message('debug','[getAllColors] End');

			return $data;
		}
	}

	public function getColorsCount() {
		log_message('debug','[getColorsCount] Start');
		
		$this->db->select('count(*) as count');
		$this->db->from('ib_color');
		
        $result = $this->db->get();
		return $result->result()[0];
	}

	public function deleteColors($ids) {
		
		log_message('debug','[deleteColors] Start');
		
		foreach($ids as $id) {
			$this->db->where('id', $id);

			log_message('debug','[deleteColors] id:' . $id);

			$this->db->delete('ib_color');
		}

		log_message('debug','[deleteColors] End');
	}
	
}