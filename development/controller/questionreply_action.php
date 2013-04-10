<?php
require_once "../model/constant.php";
require  SITEPATH.'model/model.php';

//print_r($_REQUEST); 
$m = $_REQUEST['txt1'];
$k = $_REQUEST['val'];

//print_r($_REQUEST);
$obj1 = new MyModel();
$result = $obj1->InsertAnswer($m,$k);
if($result)
{
	echo "you have send the answer";
}
?>
