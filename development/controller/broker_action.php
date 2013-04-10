<?PHP
include "../model/constant.php"; 
require_once SITEPATH.'model/model.php';
class MyClass
{

	public function Addbroker()
	{
		if(isset($_REQUEST) && count($_REQUEST) > 0)
		{
			
			$obj1 = new MyModel();
			$result = $obj1->AddBroker();
                        if ($result)
                        {
                            echo "You have registered successfully.";
                        }
                       
			
		}
		else
		{
			//require_once("admin.php");
		}
                
	}
        
        public function Deletebroker()
        {
            if(isset($_REQUEST) && count($_REQUEST) > 0)
            {
                $obj1=new MyModel();
                $result = $obj1->DeleteBroker();
                if ($result)
                        {
                           // require_once ("view/registered.php");
                        }
            }
            else{
                //require_once("admin.php");
            }
        }
}




$obj = new MyClass();
$obj->Login();


?>
