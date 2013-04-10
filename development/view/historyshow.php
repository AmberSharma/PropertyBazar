<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<?php 
session_start();
require_once "/var/www/PropertyBazar/trunk/development/model/constant1.php"; 
?>
<script type="text/javascript">

function onchange_action1() {
	
var strUser = $("#city2 option:selected").val();

$.ajax({
type: "POST", // Post / Get method
url: "myhistory.php", //Where form data is sent on submission
dataType:"text", // Data type, HTML, json etc.

data:"history=" + strUser,
//data:$('#frm').serialize(),

beforeSend: function() {
	
        },
	        success: function(data){
	        	$("#output2").html('');
	                 $("#output2").append(data);
        },
	        complete: function () {
	            
	        },
	        error: function(){
	            
	        }
});

 
}



</script>
<div class="posters">
	<div class="poster double_wide no_max_height" style="width: 620px; height: 600px">
		<h2 style="width: 620px" class="do_not_shorten"><?php echo ucfirst($_SESSION['user_name']) ."'s ".$lang->HISTORY;?></h2>
		<div class="row benefit" style="overflow: auto">

	<select  name="city"  id="city2" onchange="javascript:onchange_action1()">
				    <option  value="-1"><?php echo $lang->SELECT." ".$lang->PROPERTY." ".$lang->TYPE;?></option>
				    <option  value="Buy"><?php echo $lang->BUY;?></option>
				    <option  value="Sell"><?php echo $lang->SELL;?></option>
				    <option  value="Rent"><?php echo $lang->RENT?></option>
				</select>
				<div id="output2"></div>
		
</div>
</div>
</div>


 







