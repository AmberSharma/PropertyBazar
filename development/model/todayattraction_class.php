<?PHP
require_once "constant.php"; 
require_once SITEPATH.'model/model.php';
class Attraction
{
	
	
	
	
	
	

	public function todayAttraction()
	{
		
		$obj1 = new MyModel();
		$result = $obj1->TodayAttraction();
		return $result;
	
	}
	public function Newlist()
	{
	
		$obj1 = new MyModel();
		$result = $obj1->NewList();
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
