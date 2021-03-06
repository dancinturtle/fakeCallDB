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
	public function update_user_and_get_new_info(){
		$updates = $this->input->post();
		$id = $updates['id'];
		$updated_user = $this->User->update_user($updates);
		$updated_info = $this->User->get_user_by_id($id);
		$data = array("updatedInfo" => $updated_info);
		echo json_encode($data);
	}

	public function get_user_by_username(){
		$user = $this->input->post();
		$founduser = $this->User->get_user_by_username($user);
		if($founduser) {
			$data = array("foundUser" => $founduser);
			echo json_encode($data);
		}
		else {
			$data = array("notFound" => "Please register");
			echo json_encode($data);
		}
	}

	public function add_contact(){
		$newcontact = $this->input->post();
		$added_contact = $this->User->add_contact($newcontact);
		$data = array("newcontact" => $added_contact);
		echo json_encode($data);
	}

	public function get_users_contacts(){
		$userid = $this->input->post();
		$contacts = $this->User->get_users_contacts($userid);
		$data = array("contacts" => $contacts);
		echo json_encode($data);
	}




}