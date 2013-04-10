<?PHP

require_once "../model/constant.php"; 
require_once SITEPATH.'model/jpgraph_antispam.php';
require_once SITEPATH.'model/addbroker_class.php';
require_once SITEPATH."model/classes.validation.php";
require_once SITEPATH.'controller/mail.php';
class MyClass
{
public function Addbroker()
	{		
			$strMessages = array();
			$obj1 = new Validate();
			$spam = new  AntiSpam();
			$chars = $spam-> Rand(6);
			$obj = new RegisterBroker();
			$a=$obj1->is_validName($_REQUEST['name']);

			list($iFlag, $msgValue) = explode("|",$a);
			if($iFlag=="false")
			{
				$strMessages['name']=$msgValue;
			}
			else 
			{
				$obj->setName($msgValue);
			}
			$b=$obj1->is_validEmail($_REQUEST['email']);
			list($iFlag, $msgValue) = explode("|",$b);
			if($iFlag=="false")
			{
				$strMessages['email']=$msgValue;
			}
			else
			{
				$obj->setEmail($msgValue);
			}
				
			$obj->setUser_name($_REQUEST['user_name']);
			$obj->setPassword($chars);

			$c=$obj1->is_validPhone($_REQUEST['contact_no']);
		
			list($iFlag, $msgValue) = explode("|",$c);
			if($iFlag=="false")
			{
				$strMessages['contact_no']=$msgValue;
			}
			else
			{
				$obj->setContact_no($msgValue);
			}
			
			$obj->setUser_type('b');
			$d=$obj1->is_validText($_REQUEST['area']);
			list($iFlag, $msgValue) = explode("|",$d);
			if($iFlag=="false")
			{
				$strMessages['area']=$msgValue;
			}
			else
			{
				$obj->setArea($msgValue);
			}			

			if(empty($strMessages))
			{
				$matchfield['user_id']="";
				$matchfield['name']=$obj->getName();
				$matchfield['email']=$obj->getEmail();
				$matchfield['contact_no']=$obj->getContact_no();
				$matchfield['user_name']=$obj->getUser_name();
				$matchfield['password']=$obj->getPassword();
				$matchfield['status']="t";
				$matchfield['user_type']=$obj->getUser_type();
				$val['id']="";
				$val['b_area']=$obj->getArea();
				$val['b_property_assign']="";
				$val['b_property_done']="";
				$val['status']="t";
				$val['b_name']=$obj->getUser_name();
				$result = $obj->Addbroker($matchfield , $val);
				sendMail($obj->getEmail(),$obj->getPassword(),$obj->getUser_name());
				if ($result)
               			{
					$strMessages['success'] = "You have successfully registered & check your password on given Email Address.";
                			echo json_encode($strMessages);
               			}
				else 
				{
					$strMessages['fail'] = "Due to some error,Your feedback not send.";
					echo json_encode($strMessages);
				}
			}
			else
			{
				echo json_encode($strMessages);
			}
             }
}


$obj = new MyClass();
$obj->Addbroker();


?>
