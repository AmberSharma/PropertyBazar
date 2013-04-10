<?PHP
require_once "constant.php"; 
require_once SITEPATH.'model/model.php';
class SearchProperty 
{
	private $propertyid;
	private $city;
	private $sector;
	private $bhk;
	private $min;
	private $max;
	private $area;
	private $propertytype;
	
	
	
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
	public function setMin($min) {
		$this->min = $min;
		//echo $this->subject;
	}

	public function setMax($max) {
		$this->max = $max;
	}

	
	public function setArea($area) {
		$this->area = $area;
	}
	
	public function setPropertytype($type) {
		$this->propertytype = $type;
	}
	
	public function setPropertyid($propertyid) {
		$this->propertyid = $propertyid;
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
	public function getMin() {
		return $this->min;
	}
	public function getMax() {
		return $this->max;
	}
	public function getArea() {
		return $this->area;
	}
	public function getPropertytype() {
		return $this->propertytype;
	}
	public function getPropertyid() {
		return $this->propertyid;
	}
	

	public function Findpropertyid($matchfield)
	{
		
		$obj1 = new MyModel();
		$result = $obj1->SearchContent($matchfield);
		return $result;
	
	}
	public function Fetchproperty($matchfield1)
	{
		
		$obj1 = new MyModel();
		$result = $obj1->SearchProperty($matchfield1);
		
		return $result;
	}
	public function Fetchpropertypage($val , $limit)
	{
//print_r($val);
	
		$obj1 = new MyModel();
		$result = $obj1->SearchPropertypage($val ,$limit);
	
		return $result;
	}
	public function Propertydetailed($matchfield)
	{
		
		$obj1 = new MyModel();
		$result = $obj1->PropertyDetailed($matchfield);
		
		return $result;
	}
	public function Propertyimage($matchfield)
	{
		
		$obj1 = new MyModel();
		$result = $obj1->PropertyImage($matchfield);
		
		return $result;
	}
	public function Admindetails($matchfield)
	{
		
		$obj1 = new MyModel();
		$result = $obj1->AdminDetails($matchfield);
	
		return $result;
	}
	
	
	
}
?>
