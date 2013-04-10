<script>
function ask(str)
{
	
	<?php 
	session_start ();
	if(!isset($_SESSION['user_name'])) {?>
	 $(".open").click(function() {
	      $("#facebox").overlay().load();
	     // alert("hello");
	  });
	 $("#facebox").overlay({

		    // custom top position
		    top: 260,

		    // some mask tweaks suitable for facebox-looking dialogs
		    mask: {

		    // you might also consider a "transparent" color for the mask
		    color: '#fff',

		    // load mask a little faster
		    loadSpeed: 200,

		    // very transparent
		    opacity: 0.5
		    }

		    // disable this for modal dialog-type of overlays
		   // closeOnClick: false,

		    // load it immediately after the construction
		    

		    });  
	
	<?php 
}
	else {


?>
	
	$('#searchresult').load(str, function() {
		
	});


<?php 
}
?>
}

</script>
<style>
table {
    border-collapse: collapse;
}

td {
    padding-top: .5em;
    padding-bottom: .5em;
}
</style>
<?php
//echo"hi";
require_once "../model/constant.php";
//echo SITEPATH;
require SITEPATH."model/model.php";
require SITEPATH.'model/Paging_class.php';
require SITEPATH.'model/Questionclass.php';
if (isset($_REQUEST['page']))
	$page = $_REQUEST['page'];
else
	$page = 1;

				$obj = new Question1();
				$path= NEWPATH . "question.php";
				$obj_paging =new paging();
				$obj_paging->set_page($page);
				$obj_paging->set_page_length(4);
				$page_length = $obj_paging->page_length;
				$start_limit = $obj_paging->get_limit_start();
				$obj_paging->set_url($path);
				$limit = $start_limit . "," . $page_length;
				$result = $obj->Faqcount();
				$total_records=$result;
				$obj_paging->set_records($total_records);
				$pages = $obj_paging->get_pages();
?>

<div class="posters">
	<div class="poster double_wide no_max_height" style="width: 620px; height: 700px">
		<h2 style="width: 620px" class="do_not_shorten">FAQ's</h2>
		<div class="row benefit" style="overflow: auto">
<table style="border:1px solid black; height:120px; width:310px;">


<?php 
$obj1 = new MyModel();
$result1 = $obj1->Askquestion($limit);
?>

<table style="height:160px; width:550px;">

<?php for($i= 0 ; $i < count($result1) ; $i++)
{
?>
<tr><td style="color:red;">Ques.&nbsp;&nbsp;&nbsp;<?php echo $result1[$i]['ques']; ?></td>
</tr><tr>
<td style="color:green;">Ans.&nbsp;&nbsp;&nbsp; <?php echo $result1[$i]['answer']; ?> </td></tr>
<?php 
}?>
<tr >
<td colspan="2"><p align="left" style="margin: 10px;"><a href="#"><?php echo $obj_paging -> get_link();?></a></p></td>
</tr>

</div>
</div>
</div></table>
<input type="button" onclick="ask('askmore1.php')" value="Ask More" class="open">





