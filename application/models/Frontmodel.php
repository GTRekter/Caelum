<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frontmodel extends CI_Model {

	// Validate login
	function validate($email, $password) {
		$this->db->where('email', $email);
		$this->db->where('password', sha1($password));
		
		$q = $this->db->get('access');
		
		if ($q->num_rows() == 1) {
			foreach ($q->result() as $row)
			{
			    $data[] = $row;
			}
			
			return $data;
		}
	}
	
	// R Product 
	function ra_product($limit) {
		$this->db->select('*');
		$this->db->from('product');
		$this->db->order_by('createdOn', 'desc');
		if ($limit != '') {
			$this->db->limit($limit);
		}
		$this->db->where('status', 1);
		

		$q = $this->db->get();		
		if ($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
			    $data[] = $row;
			}
			return $data;
		}
	}
	function r_product($id) {
		$this->db->select('*');
		$this->db->from('product');
		$this->db->where('idProduct', $id);
		
		$q = $this->db->get()->result();
		return $q[0];
	}
	function r_product_limit($limit, $offset) {
		$this->db->select('*');
		$this->db->from('product');
		$this->db->limit($limit, $offset);
		
		$this->db->where('suspended', 0);
		
		$q = $this->db->get();		
		if ($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
			    $data[] = $row;
			}
			return $data;
		}
	}
	function i_product_view($id) {
		$this->db->where('idProduct', $id);
		$this->db->set('views', 'views+1', FALSE);
		$this->db->update('product');
	}
	function i_productShare($id, $social) {
		$this->db->where('idProduct', $id);
		$this->db->set($social, $social.'+1', FALSE);
		$this->db->update('product');
	}
	function u_product($id, $data) {
		$this->db->where('idProduct', $id);
		$this->db->update('product', $data); 
	}
	
	// Photo
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

	// R Texts 
	function r_text($position) {
		$this->db->select('*');
		$this->db->from('text');
		if ($position != '') {
			$this->db->where('position', $position);
		}
		
		$q = $this->db->get()->result();
		return $q[0];
	}
		
}
