<?php
include "../model/constant.php"; 
require_once SITEPATH.'model/model.php';
require_once SITEPATH."model/profile.php";
require_once SITEPATH."model/classes.validation.php";
if (isset ( $_REQUEST ) && count ( $_REQUEST ) > 0) 
{
	$strMessages = array();
	$obj1 = new Validate();
	$obj = new Profile ();
	$a=$obj1->is_validPassword($_REQUEST['newpassword']);
	list($iFlag, $msgValue) = explode("|",$a);   
	if($iFlag=="false")
	{
		$strMessages['Password']=$msgValue;
	}
	else 
	{
		$b=$obj1->is_validConfirmPassword($_REQUEST['newpassword'] , $_REQUEST['confirmpassword']);
		list($iFlag, $msgValue1 , $msgValue2) = explode("|",$b);   
		if($iFlag=="false")
		{
			$strMessages['ConfirmPassword']=$msgValue2;
		}
		else 
		{
			$obj->setPassword($msgValue1);
		}
	}
	$s = serialize ( $obj );
	if(empty($strMessages))
	{
		$obj1 = new MyModel ();
		$result = $obj1->changePassword ( $s );
		if($result)
		{
			$strMessages['success'] = "Your password changed successfully.";
			echo json_encode($strMessages);
		}
		else 
		{
			$strMessages['fail'] = "Due to some error,Your Password Could not be changed.";
			echo json_encode($strMessages);
		}
		
	}
	else
	{
		echo json_encode($strMessages);
	}
}
?>
