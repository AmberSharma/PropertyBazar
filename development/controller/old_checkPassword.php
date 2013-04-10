<?php

require_once "../model/constant.php"; 
require_once SITEPATH.'model/model.php';

$str = "";
if (isset ( $_REQUEST ['oldPassword'] ) && ($_REQUEST ['oldPassword'] != null)) {
	
	$obj1 = new MyModel ();
	$result = $obj1->oldPassword ();
	$count = count ( $result );
	for($i = 0; $i < $count; $i ++) {
		if (($result [$i] ['password'] == $_REQUEST ['oldPassword'])) {
			$str = "correct password";
			break;
		}
	}
	if ($i == $count)
		$str = "Please enter the correct password.";
}
echo $str;

?>


