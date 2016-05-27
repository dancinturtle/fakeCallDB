<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Incidents extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Incident');
	}

	public function get_categories(){	
		$gotCategories = $this->Incident->get_categories();
		$data = array("all" => $gotCategories);
		echo json_encode($data);
	}

	public function get_categories_by_id(){
		$id = $this->input->post();
		$gotCategory = $this->Incident->get_categories_by_id($id);
		$data = array("category" => $gotCategory);
		echo json_encode($data);
	}

	public function add_incident(){
		$incident = $this->input->post();
		$reported = $this->Incident->add_incident($incident);
		$data = array("addedIncident" => $reported);
		echo json_encode($data);
	}

	public function add_incident_type(){
		$incident = $this->input->post();
		$addedType = $this->Incident->add_incident_type($incident);
		$data = array("addedType" => $addedType);
		echo json_encode($data);
	}

	public function get_detailed_incidents(){
		$detailed = $this->Incident->get_detailed_incidents();
		$data = array("all" => $detailed);
		echo json_encode($data);
	}
}