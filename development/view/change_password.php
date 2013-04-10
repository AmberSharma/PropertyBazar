
<?php
session_start();
require_once "/var/www/PropertyBazar/trunk/development/model/constant1.php"; 
?>





<div class="posters">
	<div class="poster double_wide no_max_height" style="width: 620px; height: 600px">
		<h2 style="width: 620px" class="do_not_shorten"><?php echo $lang->CHANGE." ".$lang->PASSWORD;?></h2>
		<div class="row benefit" style="overflow: auto">
<div id="tab3"></div>
<form  id="myform1" action="#" method="post" name="frmid">

		
	<center id="tab1">
			<table style=" border: solid;" width="85%"  height="50%" cellpadding="5"  cellspacing="25">
				<tbody>
				
					<tr>
						<td style="text-align: center;"><b><?php echo $lang->OLD." ".$lang->PASSWORD;?></b></td>
						<td><input class="required" id="oldpassword" style="height:30px;font-size: 20px;" type="password" tabindex="5" name="oldPassword" size="20" maxlength="20" onKeyup="checkPassword(this.value)" onfocus="remove()" ></td>
						<td id="tab7"></td>
					</tr>
					<tr>
						<td  style="text-align: center;"><b><?php echo $lang->NEW." ".$lang->PASSWORD;?></b></td>
						<td><input class="required" id="newpassword" style="height:30px;font-size: 20px;" type="password" tabindex="5" name="newpassword" size="20" maxlength="20" onfocus="remove()"></td>
					</tr>
					<tr>
						<td style="text-align: center;"><b><?php echo $lang->CONFIRM." ".$lang->PASSWORD;?></b></td>
						<td><input class="required" id="confirmpassword" style="height:30px;font-size: 20px;" type="password" tabindex="5" name="confirmpassword" size="20" maxlength="20" onfocus="remove()"></td>
					</tr>
					<tr>
						<td  colspan="2" style="text-align: left;font-size: 18px;"><b>&nbsp;&nbsp;&nbsp;&nbsp;<input id="btnSubmit" tabindex="7" type="button" value="<?php echo $lang->SUBMIT;?>" />
						</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<b><input tabindex="8" type="reset" value="<?php echo $lang->CLEAR;?>"></b></td>
					</tr>
				</tbody>
			</table>
				

	</center>
</form>
</div>
</div>
</div>
<script type="text/javascript">


$(document).ready(function() {
	$('#btnSubmit').click(function() {
		var p=$('#myform1').valid()
		    rules: { 
		    	oldpassword: "required"
				newpassword: "required"
				confirmpassword: 
				{
				required: true
				equalTo: "#newpassword"
				}
				}
		messages: {
		     subject: "Please specify your name"

		   }
		//document.write(p);
			 if(p)
			{
				changePassword();
			} 

		});//form validate



});

function checkPassword(str)
{	
      $.ajax({ 
      type: "POST",
      url: '../controller/old_checkPassword.php',
     
      data: "oldPassword="+str,
       
       success: function(data){
    	$("#tab7").html(data);
       }
   });
  }
function remove()
{
	$("#tab3").hide();	
}

function changePassword()
{

      $.ajax({ 
      type: "POST",
      url: '../controller/change_password_action.php',
      data: $('#myform1').serialize(),
success: function(data){
    	var resp=jQuery.parseJSON(data);
 		$("#tab3").show();
    	$("#tab3").html("");
    	$.each(resp, function(key, val) {
        	if(key=="success")
        	{
        		$("#tab3").append(val);
        		$("#tab1").hide();
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


 


