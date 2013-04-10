<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<?php require_once "/var/www/PropertyBazar/trunk/development/model/constant1.php";
require_once '../model/model.php';
//echo "hi";
 ?>

<head>
<script src="../javascript/jquery.tools.min.js"></script>
<script>
function time_change(){
	// If #broker is changed, then call update_broker()
	$('#to').change(update_time);
}
function update_time(){
	var from=$('#from').attr('value');
	var to=$('#to').attr('value');
	// Call get_subbroker.php and when retrieved,
	
	//call show_broker() with the result.
	$.get('commission_action.php?from='+from+'&to='+to, show_broker);
}
function broker_change(){
	// If #broker is changed, then call update_broker()
	$('#broker').change(update_broker);
}
function update_broker(){
	var broker=$('#broker').attr('value');
	// Call get_subbroker.php and when retrieved,
	
	//call show_broker() with the result.
	$.get('commission_action.php?broker='+broker, show_broker);
}
function property_change(){
	// If #broker is changed, then call update_broker()
	$('#property').change(update_property);
}
function update_property(){
	var property=$('#property').attr('value');
	// Call get_subbroker.php and when retrieved,
	
	//call show_broker() with the result.
	$.get('commission_action.php?property='+property, show_broker);
}
function show_broker(res){
	// Replace contents of #subbroker with retrieved result
$('#subbroker').html(res);
}
// Run broker_change() when the document is ready
$(document).ready(broker_change);
$(document).ready(property_change);
$(document).ready(time_change);
</script>
</head>
<body>
<div class="posters">
	<div class="poster double_wide no_max_height" style="width: 620px; height: 600px">
		<h2 style="width: 620px" class="do_not_shorten"><?php echo $lang->COMMISSSION; ?></h2>
		<div class="row benefit" style="overflow: auto">
<div id="brokeradd" style="min-width: 500px;">
    <div>
<table>
<tr>
<th><?php echo $lang->BROKER; ?></th>
<td>
<?php  
//echo "hi";



$obj=new MyModel();
$result=$obj->findBroker();

?>
<select name="broker" id="broker">
<option value=""> -- please choose broker -- </option>
<?php foreach ($result as $key=>$value)
 {
	
 	?>




<option value="<?php echo $value["broker_name"]?>"><?php echo $value["broker_name"]?></option>

<?php }?>
</select>
</td>
<th></th><th align="center">property_id</th>
<td>
<?php 
$result1=$obj->findPropert();
?>
<select name="property" id="property">
<option value=""> -- please choose property -- </option>
<?php
foreach ($result1 as $key=>$value)
 {
	
 	?>




<option value="<?php echo $value["property_id"]?>"><?php echo $value["property_id"]?></option>

<?php }?>
</select></td></table>
<br/><b><?php echo $lang->FINAL." ".$lang->TIME; ?>:::</b>&nbsp;&nbsp;&nbsp;<b><?php echo $lang->FROM; ?></b>

<select name="from" id="from">
<option value=""> -- <?php echo $lang->FROM; ?> -- </option>
<option value="2011">2011</option>
<option value="2012">2012</option>
<option value="2013">2013</option>
<option value="2014">2014</option>
<option value="2015">2015</option>
<option value="2015">2015</option>
<option value="2016">2016</option>
</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><?php echo $lang->TO; ?></strong>

<select name="to" id="to">
<option value=""> -- <?php echo $lang->TO; ?> -- </option>

<option value="2011">2011</option>
<option value="2012">2012</option>
<option value="2013">2013</option>
<option value="2014">2014</option>
<option value="2015">2015</option>
<option value="2016">2016</option>
</select>
<br/>
<br/>
<div style="height: 1000px;width: 700px;" id="subbroker"><center> <?php echo $lang->COMMISSION; ?></center></div>
</div>
</div>
</div>
</div>
</div>

</body>


