<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

// Login
	public function login() {	
		$data['page'] = 'login';
		$this->load->view('pages/login',$data);
	}	
	function autenticate() {

		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		
		$this->form_validation->set_message('required', 'Compila il campo %s.');
		
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('message', 'Compila i campi obbligatori!');
			redirect('front/login');
		} else {
			
			$this->validate_credentials($this->input->post('email'), $this->input->post('password'));
		}
	}
	function validate_credentials($email, $password) {	
		$query = $this->frontmodel->validate($email, $password);
		if ($query) {
			$data = array(
				'username' => $email,
				'is_logged_in' => true
			);
			
			$this->session->set_userdata($data);
			redirect('back');
			
		} else {
			$this->session->set_flashdata('message', 'Utente non trovato. Controlla le tue credenziali e prova di nuovo!');
			redirect('front/login');
		}
	}
// End Login

// PRESENTATIONS
	// Home
	public function index() {
		
		$data['page'] = 'index';
 
		$this->load->view('front/header', $data);
		$this->load->view('front/nav', $data);
		
		// Products
		//$data['products'] = $this->frontmodel->ra_product('');
		//$data['photos'] = $this->frontmodel->ra_photo('');

		$this->load->view('front/home', $data);
		$this->load->view('front/footer');
	}
	// Test
	public function product() {
		
		$data['page'] = 'product';

		$this->load->view('front/header', $data);
		$this->load->view('front/nav', $data);

		// Updating Article
		$this->frontmodel->i_product_view($this->uri->segment(3));	
		$data['product'] = $this->frontmodel->r_product($this->uri->segment(3));
		$data['photos'] = $this->frontmodel->ra_photo('');
				
		$this->load->view('front/product',$data);
		$this->load->view('front/footer');
	}
	
	// About
	public function about() {
		
		$data['page'] = 'about';

		$this->load->view('front/header', $data);
		$this->load->view('front/nav', $data);
		
		$data['text'] = $this->frontmodel->r_text('Chi Siamo');
		
		$this->load->view('front/about',$data);
		$this->load->view('front/footer');
	
	}
	
	// Contact
	public function contact() {
		
		$data['page'] = 'contact';

		$this->load->view('front/header', $data);
		$this->load->view('front/nav', $data);
		
		$this->load->view('front/contact');
		$this->load->view('front/footer');
	
	}
	
	// Privacy
	public function privacy() {
		
		$data['page'] = 'privacy';

		$this->load->view('header', $data);
		$this->load->view('nav', $data);
		
		$data['text'] = $this->frontmodel->r_text('','Privacy Policy');
		$this->load->view('privacy',$data);
		$this->load->view('footer');
	
	}
	
	//Cookie
	public function cookie() {
		
		$data['page'] = 'cookie';

		$this->load->view('header', $data);
		$this->load->view('nav', $data);
		
		$data['text'] = $this->frontmodel->r_text('','Cookie Policy');
		$this->load->view('cookie',$data);
		$this->load->view('footer');
	
	}
// END PRESENTATIONS

// ACTIONS
	
	// Contact Form
	public function send_contact_form() {
		//Form Validation
		$this->load->library('form_validation');
		
		// Rules
		$this->form_validation->set_rules('InputName', 'Nome', 'trim|required');
		$this->form_validation->set_rules('InputEmail', 'Email', 'trim|required');
		$this->form_validation->set_rules('InputMessage', 'Testo', 'trim|required');
		// Messages
		$this->form_validation->set_message('required', 'Riempi il campo %s');
		//End Form Validation

		if ($this->form_validation->run() == FALSE) {
			// Validation Errors
			$this->session->set_flashdata('message', validation_errors());
			// Returning to Checkout Page
			redirect(site_url('front/contact'));
		} else {
			
			// Email Library
			$this->load->library('email');
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			
			// Email to Clients
			$this->email->from($this->input->post('InputEmail'));
			$this->email->subject('Roberto baruffi | Richiesta informazioni dal sito');
			$this->email->to('roberto.baruffi@gmail.com');
			$this->email->message('Nome: '.$this->input->post('InputName').'Nome: '.$this->input->post('InputMessage'));
			
			$this->email->send();
			// End Email to Clients
			
			$this->session->set_flashdata('message', 'Email inviata con successo');
			redirect(site_url('front/contact'));
		}

	}
	
	public function i_productShare() {
		 $this->frontmodel->i_productShare($this->input->post('idProduct'),$this->input->post('socialName'));
	}
// END ACTIONS
}
