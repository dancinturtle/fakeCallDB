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

	public function update_user($updates) {
		$query = "UPDATE users SET first_name = ?, last_name = ?, username=?, password = ?, age = ?, updated_at = NOW() where id = ?;";
		$values = array($updates['firstname'], $updates['lastname'], $updates['username'], $updates['password'], $updates['age'], $updates['id']);
		return $this->db->query($query, $values);

	}

	public function get_user_by_id($id) {
		$query = "SELECT * FROM users WHERE id = ?;";
		$values = array($id);
		return $this->db->query($query, $values) -> row_array();
	}

	public function get_user_by_username($user){
		$query = "SELECT * FROM users WHERE username = ? AND password = ?;";
		$values = array($user['username'], $user['password']);
		return $this->db->query($query, $values) -> row_array();
	}

	public function add_contact($newcontact) {
		$query = "INSERT INTO contacts (user_id, first_name, last_name, phone_number, email, created_at, updated_at) values (?,?,?, ?,?,NOW(),NOW());";
		$values = array($newcontact['userid'], $newcontact['firstname'], $newcontact['lastname'], $newcontact['number'], $newcontact['email']);
		return $this->db->query($query, $values);
	}

}