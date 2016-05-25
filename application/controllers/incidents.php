<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Incidents extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Incident');
	}

	public function get_categories(){	
		$gotCategories = $this->Incident->get_categories();
		$data = array("all" => $gotCategories, 
			"testing" => "Another message");
		echo json_encode($data);
	}
}