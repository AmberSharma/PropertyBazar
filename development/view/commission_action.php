<?php
if(isset($_REQUEST) && count($_REQUEST) > 0)
{
require_once 'commission_class.php';
require_once '../model/model.php';
$obj=new MyModel();
$obj1=new commission();
//echo $_REQUEST['broker'];
if(isset($_REQUEST['broker']))
	{
		$obj1->setBroker_name($_REQUEST['broker']);
		$broker_name=$obj1->getBroker_name();
	$result1=$obj->findCommission($broker_name);
	$result2=$obj->findCommisiontotal($broker_name);
	//print_r($result2);die;
}elseif (isset($_REQUEST['property'])){
	$obj1->setProperty_id($_REQUEST['property']);
	$property_id=$obj1->getProperty_id();
	$result1=$obj->findCommissionById($property_id);
	$result2=$obj->findCommisiontotalById($property_id);
	//print_r($result2);die;
	}else {
		
		$obj1->setFrom($_REQUEST['from']);
		$obj1->setTo($_REQUEST['to']);
		$from=$obj1->getFrom();
		$to=$obj1->getTo();
		//echo $from;
		//echo $to;
		$result1=$obj->findCommissionByDate($from, $to);
		if(count($result1)==0)
		{
			echo "<h1>".'invalid query'."</h1>";
			die;
		}
		$result2=$obj->findCommissionByDateTotal($from, $to);
	}
		


$count=count($result1);
$str = "";
$str.="<table height=100 width=500 border='1'><tr><th>property_id</th><th>commision</th><th>total_commission</th><tr>";
if(isset($_REQUEST['broker']))
{
	$str .="<tr><td></td><td></td><td rowspan='6' align='center'>".$result2[0]['total']."</td></tr>";
}else if(isset($_REQUEST['property']))
{
	$str .="<tr><td></td><td></td><td rowspan='6' align='center'>".$result2[0]['total']."</td></tr>";
}
else{
	$str .="<tr><td></td><td></td><td rowspan='6' align='center'>".$result2[0]['total']."</td></tr>";
}
foreach ($result1 as $key=>$value) {
	$str .="<tr><td align='center'>" . $value["property_id"]."</td><td align='center'>".$value["total"]."</td><td></td>";
	//print_r($value);
}

$str.="</tr><table>";
echo $str;

die;
for($i=0;$i<$count;$i++)
{
	echo $result1[$i]['broker_name']."<br>";
}

/*while($row=mysql_fetch_assoc($result1))
{
	echo $row['broker_name'];//$result[$i]['broker_name']
}
 foreach ($result as $keys=>$values)
{


	foreach ($values as $keys1=>$values1)
	{
		
	echo $keys1 .":::" ;
echo $values1."<br/>";
	
	}
}   */


}