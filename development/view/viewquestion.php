<?php
require_once "../model/constant.php";
require_once SITEPATH."model/Questionclass.php";
require_once SITEPATH."model/Paging_class.php";

$obj = new  Question1();
$result1 = $obj->viewcount();
$obj_paging = new paging();

if (isset($_REQUEST['page']))
	$page = $_REQUEST['page'];
else
	$page = 1;
$path= NEWPATH . "viewquestion.php";
$obj_paging->set_page($page);
$obj_paging->set_page_length("2");
$page_length = $obj_paging->page_length;
$start_limit = $obj_paging->get_limit_start();
$obj_paging->set_url($path);
$limit = $start_limit . "," . $page_length;
$obj_paging->set_records($result1);
$pages = $obj_paging->get_pages();
//echo $pages;die;
$result = $obj->view($limit);
//echo "<pre>";
//print_r($result);


?>

<script type="text/javascript">

function act_perform(str1)
{  
		$('#searchresult').load(str1, function() {
	              
			});
} 

</script>
<div class="posters">
	<div class="poster double_wide no_max_height" style="width: 620px; min-height:720px;">
		<h2 style="width: 620px" class="do_not_shorten">Question by User</h2>
		<div class="row benefit" style="overflow: auto">
		  		    <?php 
		  		   
		  		    $count=count($result);
		  		//  echo $count;
					  for($i=0;$i<$count;$i++)
					  {
					  	
						?>
			<center>		
		  <table style=" border:1px  solid black;" width="85%"  min-height="5%" cellpadding="5"  cellspacing="25">
				<tbody>
		
				    <tr><td style="text-align:left;"><b><span>Status</span></b>&nbsp;&nbsp;&nbsp;<?php echo $result[$i]["status"]?></td>
				    </tr>
				   
					<tr>
					<td >
					  <fieldset>
					  <legend ><b><span>Question:</span></b></legend>
					  <?php echo $result[$i]["ques"]?>
					       <?php echo $result[$i]["user_id"]?>
					  </fieldset>
					  </td>
					  </tr>
					 
					  <tr>
					<td style="text-align: right;" colspan="2">
<?php if($_SESSION['user_type']=='a')
{?>
					 <input type="button" value="Reply" onclick="act_perform('questionreply.php?id=<?php echo $result[$i]['id']; ?>')">
<?php }?>
					  </td>
					  </tr>
					  </tbody>
					  </table>
				    	<?php } 
				    	
					  
					 
			?>
			<p><?php echo $obj_paging -> get_link();?></p>
			</center>
</div>
</div>
</div>
