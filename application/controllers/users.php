<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('User');
	}

	public function index() {
		$this->load->view('index');
	}

	public function add_user(){
		$newuser = $this->input->post();
		$added_user = $this->User->add_user($newuser);
		$data = array("newid" => $added_user);
		echo json_encode($data);
	}





}