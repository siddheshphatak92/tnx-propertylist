<?php
class User_model extends CI_Model {

	public function __construct() {
        $this->load->database();
    }

	public function login($data) {
		$query = $this->db->get_where('user', array(
				'user_name' => $data['username'],
				'password' => $data['password']
			)
		);
		return $query->result_array();
	}

}