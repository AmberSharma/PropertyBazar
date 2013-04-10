<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<?php 
session_start();
require_once "/var/www/PropertyBazar/trunk/development/model/constant1.php";
require_once "../model/constant.php";
require  SITEPATH.'model/model.php';
$obj1 = new MyModel();
$result = $obj1->FetchUserList();
?>


<div class="posters">
	<div class="poster double_wide no_max_height" style="width: 620px; min-height:600px;">
		<h2 style="width: 620px" class="do_not_shorten"><?php echo $lang->PROPERTY." ".$lang->SOLD;?></h2>
		<div class="row benefit" style="overflow: auto">
<form  id="frmid" action="#" method="post" name="form1">

		
	<center id="out">
			<table style=" border: solid;" width="85%"  height="90%" cellpadding="5"  cellspacing="25">
			
			<tr>
						<td style="text-align: center;"><b><?php echo $lang->PROPERTY." ".$lang->ID;?></b></td>
					<td><input id="pid" class="required" style="height:30px;font-size: 20px;" type="text" tabindex="5" name="pid" size="30" maxlength="50" onkeyup="fetchbuyerlist(this.value)"></td>
			
					</tr>
					<tr id="rel">
						
					</tr>
			<tr>
						<td style="text-align: center;"><b><?php echo $lang->BUYER." ".$lang->COMMISSION;?></b></td>
					<td><input id="b_commission" class="required" style="height:30px;font-size: 20px;" type="text" tabindex="5" name="b_commission" size="30" maxlength="10"></td>
			
					</tr>
			<tr>
						<td style="text-align: center;"><b><?php echo $lang->SELLER." ".$lang->SOLD?></b></td>
					<td><input id="s_commission" class="required" style="height:30px;font-size: 20px;" type="text" tabindex="5" name="s_commission" size="30" maxlength="100"></td>
			
					</tr>
			
						<tr>
				<td>&nbsp;</td>
					<td  style="text-align: left;font-size: 18px;">&nbsp;&nbsp;&nbsp;&nbsp;<b><input id="btnSubmit" tabindex="7" type="button"
								 value="<?php echo $lang->SUBMIT;?>">
						</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<b><input tabindex="8" type="reset"
								name="rsubmit" value="<?php echo $lang->CLEAR;?>">
						</b></td>
					
				</tr>

			</table>
				

		</center>
</form>
</div>
</div>
</div>
 <script type="text/javascript">
$(document).ready(function() {
	$('#btnSubmit').click(function() {
		var p=$('#frmid').valid()
		    rules: { 
			pid:"required"
		    	b_commission: "required"
				s_commission: "required"
				}
		messages: {
		     subject: "Please specify your name"

		   }
		//document.write(p);
			 if(p)
			{
				finalProperty();
			} 

		});//form validate



});
function finalProperty()
{	
      $.ajax({ 
      type: "POST",
      url: '../controller/finalproperty_action.php',
      data: $('#frmid').serialize(),
      
       
       success: function(data){
    	
    	$("#out").html(data);
       }
   });
}

function fetchbuyerlist(str)
{	
      $.ajax({ 
      type: "POST",
      url: '../controller/fetchbrokerlist.php',
     
       data:"val="+str,
       success: function(data){
    	
    	$("#rel").html(data);
       }
   });
  }
  
</script>

 


