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