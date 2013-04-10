<?php 
require_once "../model/constant.php"; 
require SITEPATH.'model/model.php';
require_once SITEPATH.'model/assignproperty_class.php';
require SITEPATH.'model/message_class.php';

$arr=explode(",",$_REQUEST['p_id']);
$obj =new AssignProperty();
$name=$obj->Assignproperties($arr,$_REQUEST['b_id']);
$name1=$obj->UpdateBroker($_REQUEST['b_id']);
//echo "hi";
$value="Your Property successfully assigned to a Broker.They will meet u soon.";
$obj1 = new Message();
$obj1->setContent($value);
$obj1->setSubject("New Property Assigned");
$obj1->setMessage_To($_REQUEST['b_id']);
$value1 = serialize($obj1);
if($obj1->send($value1))
{
$count=count($arr);
for($i=0;$i<$count;$i++)
{
	$result=$obj->FetchSendList($arr[$i],"seller_table");
	$counter=count($result);
	for($j=0;$j<$counter;$j++)
	{ 
		$obj1->setMessage_To($result[$j]['user_id']);
		$value = serialize($obj1);
		$obj1->send($value);
	}
	$result1=$obj->FetchSendList($arr[$i],"property_buy");
	
	$counter=count($result1);
	for($j=0;$j<$counter;$j++)
	{
		
	$obj1->setMessage_To($result1[$j]['user_id']);
	$value2 = serialize($obj1);
	$obj1->send($value2);
	}
}

echo "Your message successfully delievered";
}

?>
