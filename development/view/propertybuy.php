<?php
require_once "../model/constant.php";
require  SITEPATH.'model/model.php';
require  SITEPATH.'model/propertybuy_class.php';
//echo "<pre>";
//print_r($_SESSION);
//print_r($_REQUEST);
?>


<div class="posters">
	<div class="poster double_wide no_max_height" style="width: 620px; min-height:600px;">
		<h2 style="width: 620px" class="do_not_shorten">Property Buy</h2>
		<div class="row benefit" style="overflow: auto">

		
<?php 
$matchfield['property_id'] =$_REQUEST['property_id']; 
$matchfield['price'] =$_REQUEST['price'];
$matchfield['user_id'] =$_SESSION['user_id']; 
	$obj = new Propertybuy();
	$result=$obj->Buyproperty($matchfield);
	if($result)
	{
		echo "Your Request have been received... Thank u for dealing with us.";
	}
?>
</div>
</div>
</div>
 

 


