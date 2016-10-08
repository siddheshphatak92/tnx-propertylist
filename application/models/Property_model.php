<?php
class Property_model extends CI_Model {
	
	public function __construct() {
		$this->load->database();
	}

	public function readAll($where = null) {
		$this->db->select('*');
		$this->db->from('property_listings');
		$this->db->join('room_size_type', 'room_size_type.id = property_listings.room_size_id');
		$this->db->join('property_type', 'property_type.id = property_listings.property_type_id');
		$this->db->join('selling_type', 'selling_type.id = property_listings.selling_type_id');
		if ($where != null) {
			$this->db->where($where);
		}
		$query = $this->db->get();
		return $query->result_array();
	}


}