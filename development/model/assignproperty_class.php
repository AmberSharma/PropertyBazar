<?PHP
require_once "constant.php"; 
require_once SITEPATH.'model/model.php';
class AssignProperty 
{
	
	private $passign_total;
	
	
	
	
	
	public function setPassign_total($passign_total) {
		$this->passign_total = $passign_total;
	}
	
	
	
	
	
	
	public function getPassign_total() {
		return $this->passign_total;
	}
	
	

	public function Findcommonproperty($area)
	{
		
		$obj1 = new MyModel();
		$result = $obj1->FindCommonProperty($area);
		
		return $result;
	
	}
	public function Findareabroker($matchfield)
	{
		
		$obj1 = new MyModel();
		$result = $obj1->FindAreaBroker($matchfield);
		return $result;
	
	}
	public function Assignproperties($pid,$bid)
	{
	
		$obj1 = new MyModel();
		$result = $obj1->AssignProperties($pid,$bid);
		return $result;
	
	}
	public function FetchSendList($pid,$tablename)
	{
	
		$obj1 = new MyModel();
		$result = $obj1->FetchSendList($pid,$tablename);
		return $result;
	
	}
	
	public function UpdateBroker($bid)
	{
	
		$obj1 = new MyModel();
		$result = $obj1->UpdateBroker($bid);
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
