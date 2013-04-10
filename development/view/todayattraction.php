<?php 

require_once "../model/constant.php"; 
require SITEPATH.'model/model.php';
require_once SITEPATH."model/Search_class.php";
require_once SITEPATH.'model/todayattraction_class.php';

?>
<style>
	table td
{
padding-right: 20px;
max-width:300px;
}
</style>
<style>


	/* the overlayed element */
.simple_overlay {
 
    /* must be initially hidden */
    display:none;
 
    /* place overlay on top of other elements */
    z-index:10000;
 
    /* styling */
    background-color:#333;
 
    min-width:600px;
    min-height:200px;
    border:1px solid #666;
 
    /* CSS3 styling for latest browsers */
    -moz-box-shadow:0 0 90px 5px #000;
    -webkit-box-shadow: 0 0 90px #000;
}
 
/* close button positioned on upper right corner */
.simple_overlay .close {
    background-image:url(http://localhost/PropertyBazar/trunk/development/images/close.png);
    position:absolute;
    right:-15px;
    top:-15px;
    cursor:pointer;
    height:35px;
    width:35px;
}


</style>
<script>
$("img[rel]").overlay();
function back(str)
{  
		$('#searchresult').load("<?php echo NEWPATH ;?>" + str, function() {
	               //alert('Load was performed.');
			});
}
</script>

<div class="posters">
	<div class="poster double_wide no_max_height" style="width: 620px; min-height: 600px;">
		<h2 style="width: 620px" class="do_not_shorten">Todays Attraction</h2>
		<div class="row benefit" style="overflow: auto;">
<?php
$obj =new Attraction();
$responce=$obj->todayAttraction();
//echo "<pre>";
//print_r($responce);

?>

				<table>
					
				<tr>		
					<td rowspan="4" style="border: 1px thick red;">
						
						<img src="<?php echo IMAGEPATH . $responce[0]['image'] ;?>" rel="#mies1" height=200px; width="300px;" style="border:2px solid red;" />&nbsp;&nbsp;&nbsp;
					</td>



					<td>
						<b><span>Rs.</span>&nbsp;<?php echo $responce[0]['price']; ?></b>
					</td>
				</tr>
				<tr>
					<td>
						<span><b>Property Type:</b></span>&nbsp;<?php echo $responce[0]['property_type']; ?>
					</td>
				</tr>
				<tr>
					<td>
						<span><b>Location:</b></span>&nbsp;<?php echo $responce[0]['city']; ?>&nbsp;<?php echo $responce[0]['sector']; ?>
					</td>
				</tr>
				<tr>
					<td>
						<span><b>Property-Type:</b></span>&nbsp;<?php echo ucfirst($responce[0]['property_type']); ?>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<span><b>Facility:</b></span>&nbsp;<?php echo $responce[0]['facility']; ?>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<span><b>Description:</b></span><br/>	<?php echo $responce[0]['description']; ?>
					</td>
					
					
				</tr>
 				<?php
                                    $obj2=new SearchProperty();
                                    $matchfield1['user_type']="a";
                                    $adminresult=$obj2-> AdminDetails($matchfield1);
                                   //print_r($adminresult);die;
                            ?>
                        <tr>
			<td><span><b>Contact Details:</b></span><br/></td><td  rowspan="4">
						<form id="frmVote" action="javascript:void(0)" method="POST">
						 
						<input type="button" class="open" value="Buy" onclick="action_open('propertybuy.php?property_id=<?php echo $responce[0]['property_id']?>&price=<?php echo $responce[0]['price']?>')"/>
						</form>
						
					</td></tr>
                        <tr><td><span >Name:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $adminresult[0]['name'] ?></span></td></tr>
                        <tr><td><span >Phone:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $adminresult[0]['contact_no'] ?></span></td></tr>
                        <tr><td><span >Email:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $adminresult[0]['email'] ?></span></td>
			</tr>	
			
			<tr>
				<td  rowspan="4">
					<form id="frmVote" action="javascript:void(0)" method="POST">
						 <input type="button" onclick="back('left.php')" value="Back" />
					</form>
				</td>
			</tr>
			</table>
  			<div class="simple_overlay" id="mies1">
  				<!-- large image -->
  			<img src="<?php echo IMAGEPATH . $responce[0]['image']  ;?>" />
 
  
</div>
			
				
				
</div>
</div>
</div>
