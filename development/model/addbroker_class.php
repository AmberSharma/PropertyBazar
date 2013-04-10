<?PHP

require_once "constant.php"; 
require_once SITEPATH.'model/model.php';
class RegisterBroker 
{
	private $name;
	private $email;
	private $contact_no;
	private $user_name;
	private $password;
	private $user_type;
	private $area;
	
	
	
	
	public function setName($name) {
		$this->name = $name;
	}

	public function setEmail($email) {
		$this->email = $email;
	}

	
	public function setContact_no($contact_no) {
		$this->contact_no = $contact_no;
	}
	public function setUser_name($user_name) {
		$this->user_name = $user_name;
	}

	
    public function setUser_type($user_type) {
		$this->user_type = $user_type;
	}
	public function setPassword($password) {
		$this->password = $password;
	}
	
	public function setArea($area) {
		$this->area = $area;
	}
	
	
	
	public function getPassword() {
		return $this->password;
	}
	public function getName() {
		return $this->name;
	}
	public function getEmail() {
		return $this->email;
	}
	
	public function getContact_no() {
		return $this->contact_no;
	}
	public function getUser_name() {
		return $this->user_name;
	}
	
        public function getUser_type() {
		return $this->user_type;
	}
	
	public function getArea() {
		return $this->area;
	}

	public function Addbroker($matchfield , $val)
	{
		$obj1 = new MyModel();
		$result = $obj1->AddBroker($matchfield , $val);
		return $result;
	
	}
	
	
}
?>
