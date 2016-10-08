<?php
class Property extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->model('property_model');
	}

	public function propertylist() {
		if (!isset($this->session->userdata['logged_in'])) {
			$data['title'] = "Login";

	        $this->load->view('templates/header', $data);
	        $this->load->view('user/login', $data);
	        $this->load->view('templates/footer', $data);
		} else {
			$data['propertylists'] = $this->property_model->readAll();
			$data['title'] = "Property";
			$this->load->view('templates/header', $data);
	        $this->load->view('property/propertylist', $data);
	        $this->load->view('templates/footer', $data);
		}
	}

	public function searchLocation() {
		$inpData['location'] = $this->input->post('location');
		$data['propertylists'] = $this->property_model->readAll($inpData);
		$data['title'] = "Property";
		$this->load->view('templates/header', $data);
        $this->load->view('property/propertylist', $data);
        $this->load->view('templates/footer', $data);
	}

	public function searchAll() {
		$data['propertylists'] = $this->property_model->readAll();
		$data['title'] = "Property";
		$this->load->view('templates/header', $data);
        $this->load->view('property/propertylist', $data);
        $this->load->view('templates/footer', $data);
	}

}