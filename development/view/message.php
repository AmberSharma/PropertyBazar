<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<?php 
session_start();
require_once "/var/www/PropertyBazar/trunk/development/model/constant1.php";
require_once "../model/constant.php";
include_once SITEPATH.'includefile.php';
require_once  SITEPATH.'model/model.php';
$obj1 = new MyModel();
$result = $obj1->FetchUserList();
?>
<script type="text/javascript">


$(document).ready(function() {
	$('#btnSubmit').click(function() {
		var p=$('#frmid1').valid()
		    rules: { 
		    	subject: "required"
				content: "required"
				}
		messages: {
		     subject: "Please specify your name"

		   }
		//document.write(p);
			 if(p)
			{
				sendMessage();
			} 

		});//form validate



});
  function make_blank()
  {
  document.form1.subject.value ="";
  }

 function remove()
{
	$("#tab3").hide();	
}

function sendMessage()
{	
	$.ajax({ 
      type: "POST",
      url: '../controller/message_action.php',
      data: $('#frmid1').serialize(),
      
       
       success: function(data){
	var resp=jQuery.parseJSON(data);
 		$("#tab3").show();
    	$("#tab3").html("");
    	$.each(resp, function(key, val) {
        	if(key=="success")
        	{
        		$("#tab3").append(val);
        		$("#rel").hide();
            }
        	else if(key=="fail")
    	    $("#tab3").append(val);
        	else
        	{
        		$("#tab3").append(key + ": " + val);
            }
    	});
    	
    	//$("#rel").html(data);
       }
   });
  }
  
</script>
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
<div class="posters">
	<div class="poster double_wide no_max_height" style="width: 620px; min-height:650px;">
		<h2 style="width: 620px" class="do_not_shorten">Send Message</h2>
		<div class="row benefit" style="overflow: auto">
<div id="tab3"></div>
<form id="frmid1" action="#" method="post" name="form1">

		
	<center id="rel">
			<table style=" border: solid;" width="85%"  height="90%" cellpadding="5"  cellspacing="25">
				<tbody>
				    <tr><td style="text-align: center;"><b><?php echo $lang->MESSAGE." ".$lang->TO ;?></b></td>
						<td><select  tabindex="1" style="height:30px; font-size:20px;border: 1px solid black;width: 300px;"  name="user">
				      <option value=""> -- <?php echo $lang->PLEASE." ".$lang->CHOOSE." ".$lang->BROKER ;?> -- </option>
				      <?php $count=count($result);
					  for($i=0;$i<$count;$i++)
					  {
				    	  ?>
					  <option value="<?php echo $result[$i]["user_id"]?>"><?php echo ucfirst($result[$i]["user_name"]);?></option>
				    <?php }?>
				    </select>
      					</td>
					  </tr>
				
					<tr>
						<td style="text-align: center;"><b><?php echo $lang->SUBJECT;?></b></td>
					<td><input id="subject" class="required" style="height:30px;font-size: 20px;" type="text" tabindex="5" name="subject" size="30" maxlength="20" value="" onclick="make_blank();" onfocus="remove()"></td>
			
					</tr>
					<tr>
					<td colspan="2">
				
			<fieldset>
				<legend ><?php echo $lang->CONTENT;?>..</legend>
<center>
				<textarea id="content" class="required , commentbox" rows="8" tabindex="6" cols="38" name="content" style="border:1 px solid black;" onfocus="remove()"><?php echo $lang->YOUR." ".$lang->FEEDBACK;?>........</textarea>
		</center>	</fieldset>
			</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
					<td  style="text-align: left;font-size: 18px;">&nbsp;&nbsp;&nbsp;&nbsp;<b>
					
					<input tabindex="7" type="button" id="btnSubmit"
								 value="<?php echo $lang->SUBMIT;?>">
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
