<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rescues extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Rescue');
	}

}