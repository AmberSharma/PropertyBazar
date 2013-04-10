<?php
require_once "../model/constant.php"; 
require_once SITEPATH.'model/model.php';
class Profile {
	private $username;
	private $password;
	private $name;
	private $contact_no;
	private $email;
	public function getUsername() {
		return $this->username;
	}
	public function setUsername($username = "") {
		$this->username = $username;
	}
	public function getPassword() {
		return $this->password;
	}
	public function setPassword($password = "") {
		$this->password = $password;
	}
	public function getName() {
		return $this->name;
	}
	public function setName($name = "") {
		$this->name = $name;
	}
	public function getContact_no() {
		return $this->contact_no;
	}
	public function setContact_no($contact_no = "") {
		$this->contact_no = $contact_no;
	}
	public function getEmail() {
		return $this->email;
	}
	public function setEmail($email = "") {
		$this->email = $email;
	}
	public function viewProfile() {
		$obj1 = new MyModel ();
		$result = $obj1->FindUsers ( "1" );
		return $result;
	}
}
?>
