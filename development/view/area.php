<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<?php 
session_start();
require_once "/var/www/PropertyBazar/trunk/development/model/constant1.php";?>
<script type="text/javascript">

function onchange_action() {
	
var strUser = $("#city1 option:selected").text();
$.ajax({
type: "POST", // Post / Get method
url: "assignproperty.php", //Where form data is sent on submission
dataType:"text", // Data type, HTML, json etc.

data:"b_area=" + strUser,
//data:$('#frm').serialize(),

beforeSend: function() {
	
        },
	        success: function(data){
	        	$("#output1").html('');
	                 $("#output1").append(data);
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
		<h2 style="width: 620px" class="do_not_shorten"><?php echo $lang->ASSIGN." ".$lang->PROPERTY;?></h2>
		<div class="row benefit" style="overflow: auto">

	<select  name="city"  id="city1" onchange="javascript:onchange_action()">
				    <option  value="-1"><?php echo $lang->SELECT." ".$lang->A."".$lang->CITY;?></option>
				    <option  value="noida"><?php echo $lang->NOIDA;?></option>
				    <option  value="ghaziabad"><?php echo $lang->GHAZIABAD;?></option>
				    <option  value="vasundhara"><?php echo $lang->VASUNDHARA;?></option>
				    <option  value="vaishali"><?php echo $lang->VAISHALI;?></option>
				    <option  value="sikandrabad"><?php echo $lang->SIKANDRABAD;?></option>
				    <option  value="bulanshr"><?php echo $lang->BULANDSHAHR;?></option>
				</select>
				<div id="output1"></div>
		
</div>
</div>
</div>


 







