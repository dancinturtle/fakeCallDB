<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Incident extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function get_categories(){	
		return $this->db->query("SELECT * FROM incidentCategories") -> result_array();
	}


	public function get_categories_by_id($id){
		$query = "SELECT * FROM incidentCategories where id = ?;";
		$values = array($id['id']);
		return $this->db->query($query, $values) -> row_array();
	}

	public function add_incident($incident){
		$query = "INSERT INTO incidents (user_id, date, description, coordinates, created_at, updated_at) values (?,?,?,?, NOW(), NOW());";
		$values = array($incident['userid'], $incident['date'], $incident['desc'], $incident['coords']);
		$this->db->query($query, $values);
		$id = $this->db->insert_id();
		return $id;
	}

	public function add_incident_type($incident) {
		$query = "INSERT INTO incidentTypes (incident_id, incidentCategory_id) values (?, ?);";
		$values = array($incident['incidentID'], $incident['categoryID']);
		$this->db->query($query, $values);
		$id = $this->db->insert_id();
		return $id;
	}

	public function get_detailed_incidents() {
		return $this->db->query("SELECT incidents.id, incidents.date, incidents.description, incidents.coordinates, incidentCategories.title
			from incidents
			left join incidentTypes on incidents.id = incident_id
			left join incidentCategories on incidentCategory_id = incidentCategories.id") -> result_array();

	}
}