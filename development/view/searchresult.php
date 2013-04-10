<?php 
session_start();
require_once "../model/constant.php";
require SITEPATH.'model/model.php';
require SITEPATH.'model/Paging_class.php';
require_once SITEPATH.'model/Search_class.php';

if(isset($_REQUEST['r']))
{

unset($_SESSION['min']);
unset($_SESSION['max']);
unset($_SESSION['city']);
unset($_SESSION['sector']);
unset($_SESSION['bhk']);
unset($_SESSION['area']);

$_SESSION['city']=$_REQUEST['city'];
$_SESSION['sector']=$_REQUEST['sector'];
$_SESSION['bhk']=$_REQUEST['bhk'];

if(!is_numeric($_REQUEST['min'])||(!is_numeric($_REQUEST['max'])))
{
echo "INVALID QUERY !!!!Please enter a valid min-max range of Price.";
die;
}




if(($_REQUEST['min']<>0 || $_REQUEST['max']<>0))
{
	$_SESSION['min']=$_REQUEST['min'];
	$_SESSION['max']=$_REQUEST['max'];
}
else 
{
	$_SESSION['min']=0;
	$_SESSION['max']=0;
}
$_SESSION['area']=$_REQUEST['area'];
}
if (isset($_REQUEST['page']))
	$page = $_REQUEST['page'];
else
	$page = 1;
?>


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
<div class="posters">
	<div class="poster double_wide no_max_height" style="width: 620px; min-height:800px;">
		<h2 style="width: 620px; " class="do_not_shorten">Search Property</h2>
		<div class="row benefit" style="overflow: auto">
<div id="search"></div>
<?php


	if(isset($_REQUEST) && count($_REQUEST) > 0)
		{

			$min=0;
			$max=0;
			$matchfield=array();
			
			$obj = new SearchProperty();
			
			$obj->setCity($_SESSION['city']);
			$obj->setSector($_SESSION['sector']);
			$obj->setBhk($_SESSION['bhk']);
			$obj->setMin($_SESSION['min']);
			$obj->setMax($_SESSION['max']);
			$obj->setArea($_SESSION['area']);
			
			if($_SESSION['city'] <> -1)
			{
				$matchfield['city']=$obj->getCity();
			}
			if($_SESSION['sector'] <> -1 && is_numeric($_SESSION['sector']))
			{
				$matchfield['sector']=$obj->getSector();
			}
			if($_SESSION['bhk'] <> -1)
			{
				$matchfield['bhk']=$obj->getBhk();
			}
			
			if($_SESSION['area'] <> -1)
			{
				$matchfield['property_area']=$obj->getArea();
			}
			
				$path= NEWPATH . "searchresult.php";
				$obj_paging =new paging();
				$obj_paging->set_page($page);
				$obj_paging->set_page_length(2);
				$page_length = $obj_paging->page_length;
				$start_limit = $obj_paging->get_limit_start();
				$obj_paging->set_url($path);
				$limit = $start_limit . "," . $page_length;
				$result = $obj->Findpropertyid($matchfield);
				$count=count($result);
				
	?>
			<table>
				<form id="frmVote" action="#" method="get">
					
				
			<?php
			$a=0;
			$i=0;
			$newrecord=0;
			$obj1=new SearchProperty();
			$val=array();
			for($i =0 ;$i < $count ; $i ++)
			{
				$j=0;
				
				$a++;
				
				$matchfield1=array();
				if(($_SESSION['min']!=0) || ($_SESSION['max']!=0))
				{
					if(($_SESSION['min'] <= $result[$i]['price']) && ($_SESSION['max'] >= $result[$i]['price']))
					{
						
						$matchfield1['price']=$result[$i]['price'];
						$matchfield1['property_id']=$result[$i]['property_id'];
					}
					else {
							continue;
						}
				}
				else
				{
						
				$matchfield1['property_id']=$result[$i]['property_id'];
				}
				echo "<pre>";
				$responce=$obj1->Fetchproperty($matchfield1);
				if(count($responce)==0)
				{
					continue;
				}
				$val[] = $matchfield1['property_id'];
				$newrecord++;
			}

			$total_records=$newrecord;
			$obj_paging->set_records($total_records);
			$pages = $obj_paging->get_pages();
			$c=0;
			$i=0;
			$j=0;
			$responce=$obj1->Fetchpropertypage($val,$limit);
			for($i = 0 ;$i < count($responce) ;$i ++)
					{
				       ?>
				
					
				<tr>		
					<td rowspan="4" style="border: 1px thick red;">
						
						<img src="<?php echo IMAGEPATH . $responce[$j]['image'] ;?>" rel="#mies<?PHP echo $i; ?>" height=175px; width="175px; style="border:1px solid red;"/>
					</td>



					<td>
						<b><span>$</span>&nbsp;<?php echo $responce[$j]['price']; ?></b>
					</td>
				</tr>
				<tr>
					<td>
						<span>Property Type:</span>&nbsp;<?php echo $responce[$j]['property_type']; ?>
					</td>
				</tr>
				<tr>
					<td >
						<span>Location:</span>&nbsp;<?php echo $responce[$j]['city']; ?>&nbsp;<?php echo $responce[$j]['sector']; ?>
					</td>
				</tr>
				<tr>
					<td>
						<?php echo $responce[$j]['property_type']; ?>&nbsp;<?php echo $responce[$j]['facility']; ?>
					</td>
				</tr>


				<tr>
					<td>
						<span>Description:</span><br/>	<?php echo $responce[$j]['description']; ?>
					</td>
					<td>
						<form id="frmVote" action="#" method="POST">
						 
						<input type="button" value="full details" onclick="callme1(<?php echo $responce[$j]['property_id'];?>)"/>
						</form>
						
					</td>
					
				</tr>
				<div class="simple_overlay" id="mies<?PHP echo $i; ?>">
  <!-- large image -->
  <img src="<?php echo IMAGEPATH . $responce[$j]['image'] ;?>" />
 
  
</div>
				<?php 
				$j++;
					}?>
					<tr >
					<td colspan="2"><p align="left" style="margin: 10px;"><a href="#"><?php echo $obj_paging -> get_link();?></a></p></td>
									</tr>
				</table>
			
				
				<?php
		      }
		
		else
		{
			echo "no results found!!!";
		}


?>


</div>
</div>
</div>
<script>
 $("img[rel]").overlay();	
 function callme()
 {
  
$.ajax({ 
     type: "POST",
     url: 'http://localhost/PropertyBazar/trunk/development/view/searchresult.php',                                    
     data: $('#frmVote').serialize(),
      success: function(data){
   	   //$('#searchresult').load('http://localhost/PropertyBazar/trunk/development/view/searchresult.php', function() {
   		   $('#searchresult').html(data);
			//});
             
       }
   });
 }
		function callme1(pid)
		  {
		   
		 $.ajax({ 
		      type: "POST",
		      url: 'http://localhost/PropertyBazar/trunk/development/view/searchdetailed.php',                                    
		      data: "property_id=" + pid ,
		       success: function(data){
		    	   //$('#searchresult').load('http://localhost/PropertyBazar/trunk/development/view/searchdetailed.php', function() {
		    		   $('#searchresult').html(data);
					//});
		        }
		    });
		  }
			
		
</script>
