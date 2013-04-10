<?php
require_once "../model/constant.php"; 
require_once SITEPATH.'model/model.php';
class History {
	private $username;
    private $userid;
	
    public function setUsername($username) {
    	
    	$this->username = $username;
    }
    public function setUserid($userid) {
    	
    	$this->userid = $userid;
    }
	public function getUsername() {
		return $this->username;
	}
	public function getUserid() {
		return $this->userid;
	}
	
	
	public function viewBuyHistory($userid1) {
		
		$obj1 = new MyModel ();
		$result = $obj1->MyBuyHistory ($userid1);
		return $result;
	}
	
	
	
	public function viewSellHistory($userid1) {
	
		$obj1 = new MyModel ();
		$result = $obj1->MySellHistory($userid1);
		return $result;
	}
	
	
	
	public function viewRentHistory($userid1) {
	
		$obj1 = new MyModel ();
		$result = $obj1->MyRentHistory ($userid1);
		return $result;
	}
	public function propbuy($pid1) {
	
		$obj1 = new MyModel ();
		$result = $obj1->PropBuy($pid1);
		return $result;
	}
	public function deleteProperty($val) {
	
		$obj1 = new MyModel ();
		$result = $obj1->DeleteProperty($val);
		return $result;
	}
}
?>
