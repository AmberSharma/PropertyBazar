<?php
session_start();
require_once "/var/www/PropertyBazar/trunk/development/model/constant1.php";?>
<div class="posters">
	<div class="poster double_wide no_max_height" style="width: 620px; min-height:630px;">
		<h2 style="width: 620px" class="do_not_shorten"><?php echo $lang->FEEDBACK?></h2>
		<div class="row benefit" style="overflow: auto">
<form id="myform1" action="#" method="post" name="form1">

	<div id="tab3"></div>
	<center id="tab4">
			<table style=" border: solid;" width="85%"  height="85%" cellpadding="5"  cellspacing="25">
				<tbody>
				
					<tr>
						<td style="text-align: center;"><b><?php echo $lang->SUBJECT?></b></td>
					<td><input id="subject" class="required" style="height:30px;font-size: 20px;" type="text" tabindex="5" name="subject" size="30" maxlength="50" minlength="10" value="" onfocus="remove()">
						</td> 
			
					</tr>
					<tr>
					<td colspan="2">
				
			<fieldset>
				<legend ><?php echo $lang->CONTENT?></legend>

				<textarea class="required , commentbox" id="content" rows="8" tabindex="6" cols="38" name="content" onfocus="remove()" ><?php echo $lang->YOUR." ".$lang->FEEDBACK;?>.......</textarea>
			</fieldset>
			</td>
			</tr>
			<tr><input tabindex="7" type="hidden" name="status" value="new">
				<td>&nbsp;</td>
					<td  style="text-align: left;font-size: 18px;">&nbsp;&nbsp;&nbsp;&nbsp;<b><input id="btnSubmit" tabindex="7" type="button"  value="<?php echo $lang->SUBMIT;?>">
						</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<b><input tabindex="8" type="reset"
								name="rsubmit" value="<?php echo $lang->CLEAR;?>">
						</b></td>
					
				</tr>
			
			</tbody>
			</table>
				

		</center>
</form>
</div>
</div>
</div>
<style>
.commentBox {
     display: block;
     width: 400px;
     height: 120px;
     padding: 8px;
     border: 1px solid #cccccc;
     line-height: 130%;
     font-size: 13px;
border-radius:10px;
}
</style>
<script type="text/javascript">


$(document).ready(function() {
	$('#btnSubmit').click(function() {
		var p=$('#myform1').valid()
		    rules: { 
		    	subject: "required"
				content: "required"
				}
		messages: {
		     subject: "Please specify your name"

		   }
		
			 if(p)
			{
				sendFeedback();
			} 

		});
});
function remove()
{
	$("#tab3").hide();	
}

function sendFeedback()
{
 $.ajax({ 
      type: "POST",
      url: '../controller/feedback_action.php',
      data: $('#myform1').serialize(),
      
       
       success: function(data){
    	 
	var resp=jQuery.parseJSON(data);
 		$("#tab3").show();
    	$("#tab3").html("");
    	$.each(resp, function(key, val) {
        	if(key=="success")
        	{
        		$("#tab3").append(val);
        		$("#tab4").hide();
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


