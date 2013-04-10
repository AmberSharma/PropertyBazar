<?PHP
//session_start();
require_once "constant.php"; 
require_once SITEPATH.'model/model.php';
require_once SITEPATH.'model/login_interface.php';

class Login implements Login_action
{
	private $username;
	private $password;
	private $usertype;

	
	public function getUsername()
	{
		return $this->username;
	}
	public function setUsername($username = "")
	{
           $this->username = $username;
	}
	 public function getPassword()
	{
		return $this->password;
	}
	public function setPassword($password =  "")
	{
		$this->password = $password;
	}
	public function getUsertype()
	{
		return $this->usertype;
	}
	public function setUsertype($usertype =  "")
	{
		$this->usertype = $usertype;
	}
		
	
	

	
	public function login()
	{
		
		$obj1 = new MyModel();
		$result = $obj1->FindUsers();
		$count=count($result);
		for($i=0;$i<$count;$i++)
		{
			
			if(($result[$i]['user_name']==$_REQUEST['user_name'])&&($result[$i]['password']==$_REQUEST['password']))
			{
				$_SESSION['user_id']=$result[$i]['user_id'];
				$_SESSION['user_type']=$result[$i]['user_type'];
				$_SESSION['user_name']=$_REQUEST['user_name'];
				$_SESSION['password']=$_REQUEST['password'];
				if($result[$i]['user_type']=='a')
				{
					return 0;
				}
				else if($result[$i]['user_type']=='b')
				{
					return 1;
				}
				else{
					return 2;
				}
			}
			
		}	
		
		if($i==$count)
			return 4;
	}
	public function Logout()
	{
		
		if(isset($_SESSION['user_name']))
			session_unset();
		
		
	}
}
?>
