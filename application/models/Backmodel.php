<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backmodel extends CI_Model {

	// PRD FUNCTIONS

	public function c_product($data) {
		$this->db->insert('product', $data);
		
		$insertedID = $this->db->insert_id();
		return $insertedID;
	}
	public function u_product($id, $data) {
		$this->db->where('idProduct', $id);
		$this->db->update('product', $data); 
	}
	public function ra_product($limit) {
		$this->db->select('*');
		$this->db->from('product');
		if ($limit != '') {
			$this->db->limit($limit);
		}
		$this->db->order_by('createdOn', 'desc');	
		
		$q = $this->db->get();		
		if ($q->num_rows() > 0) {
			foreach ($q->result() as $row)
			{
			    $data[] = $row;
			}
			return $data;
		}	
	}
	public function r_product($id) {
		$this->db->select('*');
		$this->db->from('product');
		$this->db->where('idProduct',$id);
		
		$q = $this->db->get()->result();
		return $q[0];
	}
	public function d_product($id) {
	   $this->db->where('idProduct', $id);
	   $this->db->delete('product'); 
	}	

	public function c_photo($data) {
		$this->db->insert('photo', $data);
	}
	public function ra_photo($limit) {
		$this->db->select('*');
		$this->db->from('photo');
		if ($limit != '') {
			$this->db->limit($limit);
		}
		$this->db->order_by('photoName', 'desc');	
		
		$q = $this->db->get();		
		if ($q->num_rows() > 0) {
			foreach ($q->result() as $row)
			{
			    $data[] = $row;
			}
			return $data;
		}
	}
	public function r_photo($id) {
		$this->db->select('*');
		$this->db->from('photo');
		$this->db->where('idPhoto',$id);
		
		$q = $this->db->get()->result();
		return $q[0];
	}
	public function r_photo_byProduct($id) {
		$this->db->select('*');
		$this->db->from('photo');
		$this->db->where('idProduct',$id);
		
		$q = $this->db->get();		
		if ($q->num_rows() > 0) {
			foreach ($q->result() as $row)
			{
			    $data[] = $row;
			}
			return $data;
		}
	}
	public function d_photo($id) {
	   $this->db->where('idPhoto', $id);
	   $this->db->delete('photo'); 
	}
	
	public function u_text($id, $data) {
		$this->db->where('idText', $id);
		$this->db->update('text', $data); 
	}
	
	public function ra_text($limit) {
		$this->db->select('*');
		$this->db->from('text');
		if ($limit != '') {
			$this->db->limit($limit);
		}
		
		$q = $this->db->get();		
		if ($q->num_rows() > 0) {
			foreach ($q->result() as $row)
			{
			    $data[] = $row;
			}
			return $data;
		}
	}
	public function r_text($id) {
		$this->db->select('*');
		$this->db->from('text');
		$this->db->where('idText',$id);
		
		$q = $this->db->get()->result();
		return $q[0];
	}

	// EXPORT FILE
	public function export($tableName){
		$this->db->select('*');
		$this->db->from($tableName);
		
		$q = $this->db->get();
		return $q;
	}  
}
