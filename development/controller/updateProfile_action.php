<?php
require_once "../model/constant.php"; 
require_once SITEPATH.'model/model.php';
require SITEPATH.'model/profile.php';
require_once SITEPATH."model/classes.validation.php";

if (isset ( $_REQUEST ) && count ( $_REQUEST ) > 0)
{
	$strMessages = array();
	$obj1 = new Validate();
	$obj = new Profile ();
	$a=$obj1->is_validPhone($_REQUEST['contact_no']);
	list($iFlag, $msgValue) = explode("|",$a);
	if($iFlag=="false")
	{
		$strMessages['contact_no']=$msgValue;
	}
	else
	{
		$obj->setContact_no($msgValue);
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
	$c=$obj1->is_validName($_REQUEST['name']);
	list($iFlag, $msgValue) = explode("|",$c);
	if($iFlag=="false")
	{
		$strMessages['name']=$msgValue;
	}
	else 
	{
		$obj->setName($msgValue);
	}
	
	$d=$obj1->is_validPassword($_REQUEST['password']);
	list($iFlag, $msgValue) = explode("|",$d);   
	if($iFlag=="false")
	{
		$strMessages['Password']=$msgValue;
	}
	else 
	{
		$obj->setPassword($msgValue);
	}
	$obj->setUsername ( $_REQUEST ['user_name'] );
	$s = serialize ( $obj );
	if(empty($strMessages))
	{
		$obj1 = new MyModel ();
		$result = $obj1->changePassword ( $s, "1" );
		if ($result)
		{
			$strMessages['success'] = "Your profile changed successfully.";
			echo json_encode($strMessages);
		}
		else 
		{
			$strMessages['fail'] = "Due to some error,Your Profile could not be Changed.";
			echo json_encode($strMessages);
		}
	}
	else
	{
		echo json_encode($strMessages);
	}
}

?>
