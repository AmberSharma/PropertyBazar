<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<?php 
session_start();
require_once "/var/www/PropertyBazar/trunk/development/model/constant1.php";
require_once "../model/constant.php";
require_once SITEPATH."model/Feedback_class.php";
require_once SITEPATH."model/paging_class1.php";
define('PROJECTTITLE', "Pagination");
define('VIEWUSER', "View Users");
define('USERNAME', "User Name");
define('FIRSTNAME', "First Name");
define('LASTNAME', "Last Name");
define('EMAIL', "Email");
define('PHONE', "Phone");
define('SEARCH', "Search");
define('SNO', "S. No.");
define('NORECORDSFOUND', "No Records Founds.");
define('PAGINATIONPAGES', "Pages");
define('PAGINATIONPAGE', "Page");
define('PAGINATIONNEXT', "Next");
define('PAGINATIONPREV', "Previous");
define('PAGINATIONLAST', "Last");
define('PAGINATIONFIRST', "First");
$obj = new Feedback();
$result1 = $obj->view("0");


$obj_paging = new paging();

if (isset($_REQUEST['page']))
	$page = $_REQUEST['page'];
else
	$page = 1;
$obj_paging->set_page($page);
$obj_paging->set_page_length("2");
$page_length = $obj_paging->page_length;
$start_limit = $obj_paging->get_limit_start();

$limit = $start_limit . "," . $page_length;

$result = $obj->view($limit);

$obj_paging->set_records(count($result1));
$pages = $obj_paging->get_pages();
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
		<h2 style="width: 620px" class="do_not_shorten"><?php echo $lang->FEEDBACK." " .$lang->BY." ".$lang->USER; ?></h2>
		<div class="row benefit" style="overflow: auto">
		  		    <?php $count=count($result);
					  for($i=0;$i<$count;$i++)
					  {
						?>
			<center>		
		  <table style=" border:1px  solid black;" width="85%"  min-height="5%" cellpadding="5"  cellspacing="25">
				<tbody>
		
				    <tr><td style="text-align:left;"><b><span><?php echo $lang->SENDBY; ?>:</span></b>&nbsp;&nbsp;&nbsp;<?php echo ucfirst($result[$i]["feedback_by"])?>&nbsp;&nbsp;&nbsp;<span>On</span>&nbsp;&nbsp;&nbsp;<?php echo $result[$i]["feedback_time"]?></td>
				    </tr>
				    <tr>
					<td style="text-align: center;" colspan="2"><b><span><?php echo $lang->SUBJECT; ?>:</span></b>&nbsp;&nbsp;&nbsp;<?php echo $result[$i]["feedback_subject"]?></td>
					</tr>
					<tr>
					<td >
					  <fieldset>
					  <legend ><b><span><?php echo $lang->CONTENT; ?>:</span></b></legend>
					  <?php echo $result[$i]["feedback_content"]?>
					  </fieldset>
					  </td>
					  </tr>
					  <tr>
					<td style="text-align: right;" colspan="2">
<?php if($_SESSION['user_type']=='a')
{?>
					 <input type="button" value="<?php echo $lang->REPLY; ?>" onclick="act_perform('feedbackreply.php?user_id=<?php echo $result[$i]['user_id']; ?>')">
<?php }?>
					  </td>
					  </tr>
					  </tbody>
					  </table>
				    	<?php } ?>
			
			<p><?php echo $obj_paging -> get_link();?></p>
			</center>
</div>
</div>
</div>
