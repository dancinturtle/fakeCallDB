<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Incident extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function get_categories(){	
		return $this->db->query("SELECT * FROM incidentCategories") -> result_array();
	}
}