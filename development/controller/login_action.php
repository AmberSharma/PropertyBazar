<?php
//session_start();
require_once "../model/constant.php"; 
require SITEPATH.'model/login.php';
if(isset($_REQUEST) && count($_REQUEST) > 0)
	{
		$obj = new Login();
		$obj->setUsername($_REQUEST['user_name']);
		$obj->setPassword($_REQUEST['password']);
		$result = $obj->login();
	
		if($result==0)
		{
			die("0");
		}
		elseif($result==1)
		{
			die("1");
		}
		elseif($result==2)
		{
			die("2");
		}
		elseif($result==4)
		{
			echo "Invalid Username or Password";
		}
	}
?>
