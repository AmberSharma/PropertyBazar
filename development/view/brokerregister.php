<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<?php
session_start();
 require_once "/var/www/PropertyBazar/trunk/development/model/constant1.php";?>
<script>


function remove()
{
	$("#tab3").hide();	
}
function addbroker() {
	
//var strUser = $("#city1 option:selected").text();
$.ajax({
type: "POST", // Post / Get method
url: "../controller/addbroker_action.php", //Where form data is sent on submission
dataType:"text", // Data type, HTML, json etc.

//data:"b_area=" + strUser,
data:$('#myform').serialize(),
success: function(data){
	
	var resp=jQuery.parseJSON(data);
 		$("#tab3").show();
    	$("#tab3").html("");
    	$.each(resp, function(key, val) {
        	if(key=="success")
        	{
        		$("#tab3").append(val);
        		$("#brokeradd").hide();
            }
        	else if(key=="fail")
    	    $("#tab3").append(val);
        	else
        	{
        		$("#tab3").append(key + ": " + val);
            }
    	});
	
	        	
        }
});

 
}
</script>
<style>
input
{
	border:1px solid green;
	border-radius:10px;
}
</style>
<div class="posters">
	<div class="poster double_wide no_max_height" style="width: 620px; height: 600px">
		<h2 style="width: 620px" class="do_not_shorten"><?php echo $lang->ADD." ".$lang->BROKER; ?></h2>
		<div class="row benefit" style="overflow: auto">
<div id="tab3"></div>
<div id="brokeradd" style="min-width: 500px;">
    <div>
    <br />
    <br />
    <br />
      <form id="myform" class="cols" action="#" method="post" name="myform">
	
	<table style="margin-left: 50px;">
	  <tr>
	    <td></td>
	  </tr>

	  <tr>
	    <td><?php echo $lang->NAME; ?> *</td>

	    <td><input type="text" id="name" name="name" class="required"  minlength="5" onfocus="remove()"></td>
	  </tr>

	  <tr>
	    <td><?php echo $lang->EMAIL; ?> *</td>

	    <td><input type="email" id="email1" name="email" class="required" ></td>
	  </tr>

	  <tr>
	    <td><?php echo $lang->CONTACTNO; ?> *</td>

	    <td><input type="number" id="contact" name="contact_no"  class="required" minlength="10" onfocus="remove()"></td>
	  </tr>

	  <tr>
	    <td><?php echo $lang->USERNAME; ?> *</td>

	    <td><input type="text" id="username" name="user_name" class="required"   minlength="5" onfocus="remove()"></td>
	  </tr>

	  <tr>
	    <td><?php echo $lang->AREA; ?> *</td>

	    <td><input type="text" id="area" name="area" class="required" minlength="4" onfocus="remove()"></td>
	  </tr>

	  
	  <tr>
            
          </tr>

	  <tr>
	    <td><input type="button" id="btnSubmit" value="<?php echo $lang->ADD; ?>" onfocus="remove()"></input></td>

	    <td><input type="reset" value="<?php echo $lang->RESET; ?>"></input></td>
	  </tr>
	</table>
      </form>
    </div>
  </div>
  </div>
  </div>
  </div>
<script type="text/javascript">


$(document).ready(function() {
	$('#btnSubmit').click(function() {
		var p=$('#myform').valid()
		    rules: { 
		    	name: "required"
			contact:{
			 	required:true
				number:true
			}
			area:
			{
		 		required:true
				
			}
			username: "required"
			email1:
			{
				required:true
				email:true
			}
				}
		
			 if(p)
			{
				addbroker();
			} 

		});//form validate



});
</script>
  
