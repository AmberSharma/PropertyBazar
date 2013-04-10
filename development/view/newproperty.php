<?php 

require_once "../model/constant.php"; 
require SITEPATH.'model/model.php';
require SITEPATH.'model/Paging_class.php';
require_once SITEPATH.'model/Search_class.php';
require_once SITEPATH.'model/todayattraction_class.php';
//echo "hi"; die;



if (isset($_REQUEST['page']))
	$page = $_REQUEST['page'];
else
	$page = 1;
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
 
    width:675px;
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
		<h2 style="width: 620px" class="do_not_shorten">New Arrivals</h2>
		<div class="row benefit" style="overflow: auto;">
<?php 
$path= NEWPATH . "newproperty.php"; 
$obj1 =new Attraction();
$obj_paging =new paging();
$obj_paging->set_page($page);
$obj_paging->set_page_length(2);
$page_length = $obj_paging->page_length;
$start_limit = $obj_paging->get_limit_start();
$limit = $start_limit . "," . $page_length;
$obj_paging->set_url($path);

$result = $obj1->Newlist();
$count=count($result);
for($i = 0 ; $i < $count ; $i++)
{
$val[]=$result[$i]['property_id'];
}
//echo "<pre>";
//print_r($val);die;
$obj=new SearchProperty();
?>
<table>
	
<tr>
<?php 

$responce=$obj->Fetchpropertypage($val,$limit);
//echo "<pre>";
//print_r($responce);die;
$total_records=$count;
$obj_paging->set_records($total_records);
$pages = $obj_paging->get_pages();
for($i = 0 ;$i < count($responce) ;$i ++)
{
?>
				
					
				<tr>		
					<td rowspan="4" style="border: 1px thick red;">
						
						<img src="<?php echo IMAGEPATH . $responce[$i]['image'] ;?>" rel="#mies<?PHP echo $i; ?>" height=175px; width="175px; style="border:1px solid red;"/>
					</td>



					<td>
						<b><span>$</span>&nbsp;<?php echo $responce[$i]['price']; ?></b>
					</td>
				</tr>
				<tr>
					<td>
						<span>Property Type:</span>&nbsp;<?php echo $responce[$i]['property_type']; ?>
					</td>
				</tr>
				<tr>
					<td >
						<span>Location:</span>&nbsp;<?php echo $responce[$i]['city']; ?>&nbsp;<?php echo $responce[$i]['sector']; ?>
					</td>
				</tr>
				<tr>
					<td>
						<?php echo $responce[$i]['property_type']; ?>&nbsp;<?php echo $responce[$i]['facility']; ?>
					</td>
				</tr>


				<tr>
					<td>
						<span>Description:</span><br/>	<?php echo $responce[$i]['description']; ?>
					</td>
					<td>
						<form id="frmVote" action="#" method="POST">
						 
						<input type="button" value="full details" onclick="callme1(<?php echo $responce[$i]['property_id'];?>)"/>
						</form>
						
					</td>
					
				</tr>
				<div class="simple_overlay" id="mies<?PHP echo $i; ?>">
  <!-- large image -->
  <img src="<?php echo IMAGEPATH . $responce[$i]['image'] ;?>" />
 
  
</div>
				<?php 
				
					}?>
					<tr >
					<td colspan="2"><p align="left" style="margin: 10px;"><a href="#"><?php echo $obj_paging -> get_link();?></a></p></td>
									</tr>
				</table>
			
				
				

			
				
				
</div>
</div>
</div>
