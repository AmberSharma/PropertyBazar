<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<?php 
session_start();
require_once "/var/www/PropertyBazar/trunk/development/model/constant1.php";
require_once "../model/constant.php";
require_once  SITEPATH.'model/model.php';
$obj1 = new MyModel();
$result = $obj1->FetchFeedbackuser($_REQUEST['user_id']);
?>
<script type="text/javascript">

$(document).ready(function() {
	$('#btnSubmit').click(function() {
		var p=$('#frmid').valid()
		    rules: { 
		    	subject: "required"
				content: "required"
				}
		
			 if(p)
			{
				sendFeedback();
			} 

		});//form validate



});
  function make_blank()
  {
  document.form1.subject.value ="";
  }
 

function sendFeedback()
{	
	
      $.ajax({ 
      type: "POST",
      url: '../controller/feedback_action.php',
      data: $('#frmid').serialize(),
      
       
       success: function(data){
    	
    	$("#rel").html(data);
       }
   });
  }
  
</script>
<div class="posters">
	<div class="poster double_wide no_max_height" style="width: 620px; min-height:650px;">
		<h2 style="width: 620px" class="do_not_shorten"><?php echo $lang->FEEDBACK?></h2>
		<div class="row benefit" style="overflow: auto">
<form id="frmid" action="#" method="post" name="form1">

		
	<center id="rel">
			<table style=" border: solid;" width="85%"  height="90%" cellpadding="5"  cellspacing="25">
				<tbody>
				    <tr><td style="text-align: center;"><b><?php echo $lang->REPLY." ".$lang->TO;?></b></td>
						<td><select  tabindex="1" style="height:30px; font-size:20px;border: 1px solid black;width: 300px;"  name="user_id">
				      <option value=""> -- <?php echo $lang->PLEASE." ".$lang->CHOOSE." ".$lang->BROKER; ?> -- </option>
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
						<td style="text-align: center;"><b>Subject</b></td>
					<td><input id="subject" class="required" style="height:30px;font-size: 20px;" type="text" tabindex="5" name="subject" size="30" maxlength="20" value="enter the subject here" onclick="make_blank();"></td>
			
					</tr>
					<tr>
					<td colspan="2">
				
			<fieldset>
				<legend ><?php echo  $lang->CONTENT;?></legend>
<center>
				<textarea id="content" class="required" rows="8" tabindex="6" cols="38" name="content" style="border:1 px solid black;">Your Feedback Here........</textarea>
		</center>	</fieldset>
			</td>
			</tr>
			<tr><input tabindex="7" type="hidden" name="status" value="reply">
				
				<td>&nbsp;</td>
					<td  style="text-align: left;font-size: 18px;">&nbsp;&nbsp;&nbsp;&nbsp;<b>
					
					<input tabindex="7" id="btnSubmit" type="button"
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
