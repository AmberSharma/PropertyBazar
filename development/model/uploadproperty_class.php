<?PHP
require_once "constant.php"; 
require_once SITEPATH.'model/model.php';

class SellProperty 
{
	private $address;
	private $size;
	private $facility;
	private $transaction;
	private $direction;
	private $dealtype;
	private $propertytype;
	private $propertyfeature;
	private $price;
	private $description;
	private $lastprice;
	private $furnisheditem;
	private $sector;
	private $city;
	private $bhk;
	
	
	public function getAddress()
	{
		return $this->address;
	}
	public function setAddress($address = "")
	{
		$this->address = $address;
	}
	public function getTransaction()
	{
		return $this->transaction;
	}
	public function setTransaction($transaction = "")
	{
		$this->transaction = $transaction;
	}
	 public function getSize()
	{
		return $this->size;
	}
	public function setSize($size =  "")
	{
		$this->size = $size;
	}
	public function getFacility()
	{
		return $this->facility;
	}
	public function setFacility($facility =  "")
	{
		$this->facility = $facility;
	}
	public function getDirection()
	{
		return $this->direction;
	}
	public function setDirection($direction =  "")
	{
		$this->direction = $direction;
	}
	public function getDealtype()
	{
		return $this->dealtype;
	}
	public function setDealtype($dealtype =  "")
	{
		$this->dealtype = $dealtype;
	}
	public function getDescription()
	{
		return $this->description;
	}
	public function setDescription($description =  "")
	{
		$this->description = $description;
	}	
	public function getPropertytype()
	{
		return $this->propertytype;
	}
	public function getCity() {
		return $this->city;
	}
	public function getSector() {
		return $this->sector;
	}
	
	public function getBhk() {
		return $this->bhk;
	}
	public function setPropertytype($propertytype =  "")
	{
		$this->propertytype = $propertytype;
	}
	public function getPropertyfeature()
	{
		return $this->propertyfeature;
	}
	public function setPropertyfeature($propertyfeature =  "")
	{
		$this->propertyfeature = $propertyfeature;
	}
	public function getPrice()
	{
		return $this->price;
	}
	public function setPrice($price =  "")
	{
		$this->price = $price;
	}
	public function getLastprice()
	{
		return $this->lastprice;
	}
	public function setLastprice($lastprice =  "")
	{
		$this->lastprice = $lastprice;
	}
	public function getFurnisheditem()
	{
		return $this->furnisheditem;
	}
	public function setFurnisheditem($furnisheditem =  "")
	{
		$this->furnisheditem = $furnisheditem;
	}
	public function setCity($city) {
		$this->city = $city;
		//echo $this->subject;
	}

	public function setSector($sector) {
		$this->sector = $sector;
	}

	
	public function setBhk($bhk) {
		$this->bhk = $bhk;
	}	
	public function upload($val = "")
	{
		
		$obj1 = new MyModel();
		
		$obj1->uploadProperty($val);
		$result=$obj1->LastInsertedID() ;
		
		return $result;
	}
}
?>
