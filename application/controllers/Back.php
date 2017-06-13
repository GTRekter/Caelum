<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Back extends CI_Controller {

	// Login Check
	// function __construct() {
	// 	parent::__construct();
	// 	$query = $this->is_logged_in();
		
	// 	if ($query == false) {
	// 		redirect('front/login');
	// 	}
	// 	$this->load->model('backmodel');
	// }

	// function is_logged_in() {
	// 	$is_logged_in = $this->session->userdata('is_logged_in');
		
	// 	if (!isset($is_logged_in) || $is_logged_in != true) {
	// 		return false;
	// 	} else {
	// 		return true;
	// 	}
	// }
	// function logout() {
	// 	$data = array('username', 'is_logged_in');
	// 	$this->session->unset_userdata($data);
		
	// 	$this->session->set_flashdata('message','Ciao, a presto!');
	// 	redirect('front/login');
	// }
	// End Login Check
	
	// PRESENTATION
	public function index() {
		$data['page'] = 'index';
		
		$this->load->view('header',$data);
		$this->load->view('nav');
		
		// $data['products'] = $this->backmodel->ra_product('');
		// $data['photos'] = $this->backmodel->ra_photo('');
		
		$this->load->view('home',$data);
		$this->load->view('footer',$data);
	}	
	public function products() {
		$data['page'] = 'products';
		
		$this->load->view('header',$data);
		$this->load->view('nav');
		
		$data['photos'] = $this->backmodel->ra_photo('');
		$data['products'] = $this->backmodel->ra_product('');
		
		$this->load->view('pages/products',$data);
		$this->load->view('footer',$data);
	}
	public function product() {
		$data['page'] = 'product';
		
		$this->load->view('header',$data);
		$this->load->view('nav');
		
		$data['photos'] = $this->backmodel->r_photo_byProduct($this->uri->segment(3));
		$data['product'] = $this->backmodel->r_product($this->uri->segment(3));
		
		$this->load->view('pages/product',$data);
		$this->load->view('footer',$data);
	}	
	public function n_product() {
		$data['page'] = 'n_product';
		
		$this->load->view('header',$data);
		$this->load->view('nav');
		
		$this->load->view('pages/n_product',$data);
		$this->load->view('footer',$data);
	}
	public function text() {
		$data['page'] = 'text';
		
		$this->load->view('header',$data);
		$this->load->view('nav');
		
		$data['text'] = $this->backmodel->r_text($this->uri->segment(3));
		
		$this->load->view('pages/text',$data);
		$this->load->view('footer',$data);
	}
	public function texts() {
		$data['page'] = 'texts';
		
		$this->load->view('header',$data);
		$this->load->view('nav');
		
		$data['texts'] = $this->backmodel->ra_text('');
		
		$this->load->view('pages/texts',$data);
		$this->load->view('footer',$data);
	}
	public function csv() {
		$data['page'] = 'csv';
		
		$this->load->view('header',$data);
		$this->load->view('nav');
		
		$this->load->view('pages/csv',$data);
		$this->load->view('footer',$data);
	}
	public function xml() {
		$data['page'] = 'xml';
		
		$this->load->view('header',$data);
		$this->load->view('nav');
		
		$this->load->view('pages/xml',$data);
		$this->load->view('footer',$data);
	}
	
	// ACTIONS	
	public function c_product() {
		//Form Validation
		$this->load->library('form_validation');
		
		if($this->input->post('status')== NULL)
			{ $status = 0; } else { $status = 1; }
		
		// Rules
		$this->form_validation->set_rules('productName', 'Nome', 'trim|required');
		$this->form_validation->set_rules('clientName', 'Nome', 'trim|required');
		// Messages
		$this->form_validation->set_message('required', 'Riempi il campo %s');
		//End Form Validation

		if ($this->form_validation->run() == FALSE) {
			// Validation Errors
			$this->session->set_flashdata('message', validation_errors());
			// Returning to Checkout Page
			redirect($this->input->post('currentURL'));
		} else {	
			// Prepairing the Data for the Product
			$data = array(
				'productName' => strtolower($this->input->post('productName')),
				'clientName' => strtolower($this->input->post('clientName')),
				'status' => $status,
				'createdOn' => date("Y-m-d")
			);
			
			// Saving Product to Database
			$idProduct = $this->backmodel->c_product($data);
			header('Content-Type: application/x-json; charset=utf-8');
			echo json_encode($idProduct);
		}	
	}
	public function r_PRD_Products() {
		$idProduct = $this->input->post('idProduct');
		$data = $this->backmodel->r_PRD_Products($idProduct);
		header('Content-Type: application/x-json; charset=utf-8');
		echo json_encode($data);
	}
	public function u_product() {
		
		// Prepairing the Data for the Product
		$data = array(
			'productName' => strtolower($this->input->post('productName')),
			'clientName' => strtolower($this->input->post('clientName')),
			'status' => $this->input->post('status'),
		);
			
		// Updating Product
		$this->backmodel->u_product($this->input->post('idProduct'), $data);
	}
	public function d_product() {
		$this->backmodel->d_product($this->uri->segment(3)); 

		$photos = $this->backmodel->ra_photo('');
		foreach ($photos as $photo) {
			if($photo->idProduct == $this->uri->segment(3)) {
				$img = $this->backmodel->r_photo($photo->idPhoto);
				unlink('./resources/img/product/'.$img->photoName);
				$this->backmodel->d_photo($photo->idPhoto);
			}
		}
 
		$this->session->set_flashdata('message', 'Prodotto cancellato con successo');
		redirect(site_url('back/products'));
	}	
	public function c_photo() {  
		// Upload Path
		$config = array(
		    'upload_path' => './resources/img/product/',
		    'allowed_types' => 'jpg|png',
		    'multi' => 'halt'
		);
		$this->load->library('upload', $config);
	   	
	   	if ( ! $this->upload->do_upload('files')) {
	   		$this->session->set_flashdata('message', 'Seleziona almeno un file da caricare. I file devono essere in formato jpg.');
	   		redirect($this->input->post('currentURL'));
	   	} else {	
	   		$data = array();
	   		$files = $this->upload->data();
	   		foreach ($files as $file) {
	   			$record = array(
	   				'photoName' => $file['file_name'],
	   				'idProduct' => $this->input->post('idProduct')
	   			);
	   			array_push($data, $record);
	   			// Saving Product to Database
	   			$this->backmodel->c_photo($record);
	   		}
	   	}
	}
	public function r_photo_byProduct() {
		$idProduct = $this->input->post('idProduct');
		$data = $this->backmodel->r_photo_byProduct($idProduct);
		header('Content-Type: application/x-json; charset=utf-8');
		echo json_encode($data);
	}	
	public function d_photo() {
		$photos = $this->input->post('idPhoto');
		
		foreach ($photos as $photo) {
			$data[] = $photo;
			$img = $this->backmodel->r_photo($photo);
			unlink('./resources/img/product/'.$img->photoName);
			$this->backmodel->d_photo($photo);
		}

		header('Content-Type: application/x-json; charset=utf-8');
		echo json_encode($data);
	}	
	public function u_text() {
		
		// Prepairing the Data for the Text
		$data = array(
			'position' => strtolower($this->input->post('position')),
			'textIT' => $this->input->post('textIT'),
			'textEN' => $this->input->post('textEN'),
		);
			
		// Updating Text
		$this->backmodel->u_text($this->input->post('idText'), $data);
	}

	//EXPORT
	public function exportCSV() {
		
		$tableName = $this->input->post('tableName');
		
	    $this->load->dbutil();
	    $this->load->helper('download');
	    $report = $this->backmodel->export($tableName);
	    $csvFile = $this->dbutil->csv_from_result($report);;

	    $data = $csvFile;
	    $name = ucfirst($tableName).'_file.csv';
	    force_download($name, $data); 
    }
	public function exportXML() {
		
		$tableName = $this->input->post('tableName');
		
	    $this->load->dbutil();
	    $this->load->helper('download');
	    $report = $this->backmodel->export($tableName);
	    $xmlFile = $this->dbutil->xml_from_result($report);;

	    $data = $xmlFile;
	    $name = ucfirst($tableName).'_file.xml';
	    force_download($name, $data); 
    }
}
