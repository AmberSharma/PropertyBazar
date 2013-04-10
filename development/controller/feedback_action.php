<?php
require_once "../model/constant.php"; 
require_once SITEPATH."model/Feedback_class.php";
require_once SITEPATH."model/classes.validation.php";
if(isset($_REQUEST) && count($_REQUEST) > 0)
	{
		$strMessages = array();
		$obj1 = new Validate();
		$obj = new Feedback();
		$a=$obj1->is_validText($_REQUEST['subject']);
		
		list($iFlag, $msgValue) = explode("|",$a);   
		if($iFlag=="false")
		{
			$strMessages['subject']=$msgValue;
		}
		else 
		{
			$obj->setSubject($msgValue);
		}
		
		$b=$obj1->is_validText($_REQUEST['content']);
		list($iFlag, $msgValue) = explode("|",$b);
		if($iFlag=="false")
		{
			$strMessages['content']=$msgValue;
		}
		else
		{
			$obj->setContent($msgValue);
		}
		

		$obj->setStatus($_REQUEST['status']);

		$s = serialize($obj);
		if(empty($strMessages))
		{
			$result = $obj->send($s);
			if($result)
			{
				$strMessages['success'] = "Your feedback successfully send";
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
?>
