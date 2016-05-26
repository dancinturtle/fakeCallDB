<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
	}

	public function add_user($newuser) {
		$query = "INSERT INTO users (first_name, last_name, username, password, age, created_at, updated_at) values (?,?,?,?,?, NOW(), NOW());";
		$values = array($newuser['firstname'], $newuser['lastname'], $newuser['username'], $newuser['password'], $newuser['age']);
		$this->db->query($query, $values);
		$id = $this->db->insert_id();
		return $id;
	}


}