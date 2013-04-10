<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<?php require_once "/var/www/PropertyBazar/trunk/development/model/constant1.php";
//echo"hi";
require_once "../model/constant.php";
//echo SITEPATH;
require SITEPATH."model/model.php";


?>
<div class="posters">
	<div class="poster double_wide no_max_height" style="width: 620px; height: 600px">
		<h2 style="width: 620px" class="do_not_shorten">Contact Us</h2>
		<div class="row benefit" style="overflow: auto">
<table style="border:1px solid black; height:120px; width:310px;">


<?php 
$obj1 = new MyModel();
$result1 = $obj1->Brokercontact1();
$result2= $obj1->Admincontact1();
//echo "hi";
//print_r (result1);
//print ($result1);
?>
<h3><?php echo $lang->ADMINISTRATOR." ".$lang->DETAIL; ?>:</h3>
<table style="border:1px solid black; height:160px; width:550px;">
<tr>
<td><h4><?php echo $lang->NAME; ?>:</h4></td>
<td><h4><?php echo $lang->CONTACTNO; ?>:</h4></td>
<td><h4><?php echo $lang->EMAIL; ?>:</h4></td>
</tr>

<tr>
<td><?php echo $result2[0]['name']; ?> </td>
<td><?php echo $result2[0]['contact_no']; ?></td>
<td><?php echo $result2[0]['email']; ?></td></tr>
<tr>

</table>
<br/>
<table style="border:1px solid black; height:160px; width:550px;">
<h3><?php echo $lang->BROKER." ".$lang->DETAIL; ?></h3><tr>
<td><h4><?php echo $lang->NAME; ?></h4></td>
<td><h4><?php echo $lang->AREA; ?></h4></td>
<td><h4><?php echo $lang->PROPERTYHANDLE; ?></h4></td>
</tr>
<?php for($i= 0 ; $i < count($result1) ; $i++)
{
	?>
<tr>

<td><?php echo $result1[$i]['b_name']; ?> </td>
<td><?php echo $result1[$i]['b_area']; ?></td>
<td><?php echo $result1[$i]['b_property_done']; ?> </td></tr>
<tr>
<?php 
}?>

</table>
</div>
</div>
</div>






