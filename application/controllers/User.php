<?php

// session_start();

class User extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
		// Load form helper library

		$this->load->library('session');
	}

	public function login() {
        if(isset($this->session->userdata['logged_in'])){
        	$data['title'] = "Property";
			$this->load->view('templates/header', $data);
			$this->load->view('property/propertylist');
			$this->load->view('templates/footer', $data);
		}else{
			$data['title'] = "Login";
			$this->load->view('templates/header', $data);
	        $this->load->view('user/login', $data);
	        $this->load->view('templates/footer', $data);
		}
	}

	public function login_process() {
		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		);
		$result = $this->user_model->login($data);
		if ($result) {
			$session_data = array(
				'username' => $result[0]['user_name'],
				'email' => $result[0]['user_email']
			);
			$this->session->set_userdata('logged_in', $session_data);

			$data['title'] = "Property";
			$this->load->view('templates/header', $data);
	        $this->load->view('property/propertylist', $data);
	        $this->load->view('templates/footer', $data);
		} else {
			$data['title'] = "Login";
			$data['error_message'] = "Incorrect username and password. Please try again.";
			// $this->load->view('templates/header', $data);
	        $this->load->view('user/login', $data);
	        // $this->load->view('templates/footer', $data);
		}
	}

	public function logout() {
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		$data["title"] = "Login";
		$this->load->view('templates/header', $data);
        $this->load->view('user/login', $data);
        $this->load->view('templates/footer', $data);
	}

}