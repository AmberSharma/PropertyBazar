<?php
//session_start ();
//echo "hi";
require_once "../model/constant.php"; 
include SITEPATH.'model/Questionclass.php';
//echo "hi"; die;
//echo "htuyjuykuii";

//echo $_SESSION['user_id'];
//print_r($_REQUEST); 	
if(isset($_REQUEST) && count($_REQUEST) > 0)
	{
		$obj3 = new Question1();
 //echo "hello world";
		
		$obj3->setQues($_REQUEST['ques']);
		$obj3->setId($_SESSION['user_id']);
		$s = serialize($obj3);
		$result = $obj3->send($s);
		//echo $result;
		if($result)
		{
			
			echo "Your question successfully send.";
			
		}
	}
	
	
	
?>
