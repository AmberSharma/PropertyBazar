<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<?php 
session_start();
require_once "/var/www/PropertyBazar/trunk/development/model/constant1.php";
require_once "../model/constant.php"; 
require SITEPATH."model/history_class.php";

?>
	<script >
	function del(str)
	{	
		$.ajax({ 
	    type: "POST",
	    url: '../controller/deleteproperty_action.php',
	    data: "property_id=" + str,
	    success: function(data){
	   // $("#tab5").html(data);
	    	 //$("#rel1").refresh();
	    	$("#rel1").reload();
		       }
	   });
		onchange_action1();
	  }
</script>
				<center>
				<?php if($_REQUEST['history']=='Buy')
                 {

                   ?>
				
					<table style="border: solid;" width="85%" height="25%"
						cellpadding="5" cellspacing="25" id="rel1"> 

						<tr><b><?php echo $lang->PROPERTY." ".$lang->FOR." ".$lang->BUY;?></b>
							<td style="text-align: center;">
						<?php
						$obj=new History();
						$obj->setUsername($_SESSION['user_name']); 
						$obj->setUserid($_SESSION['user_id']);
						$result=$obj->viewBuyHistory($obj->getUserid());
						//echo "<pre>";
						//print_r($result);
						?>
						<tr>
						<td><?php echo $lang->PROPERTY;?></td><td><?php echo $lang->ADDRESS;?></td><td><?php echo $lang->PROPERTY." ".$lang->STATUS;?></td>
						</tr>
						<?php 
						for($i = 0 ; $i < count($result) ; $i ++)
						{
							$result1=$obj->propbuy($result[$i]['property_id']);
							//echo "<pre>";
							//print_r($result1);
							if($result1[0]['property_status'] <>'delete')
							{
							?>
							
							<tr>
							
							<td><?php echo $result1[0]['price'] ?> </td>
							<td><?php echo $result1[0]['address'] ?> </td>
							<td><?php echo $result1[0]['property_status'] ?> </td>
							<td><a href="javascript:void(0)" onclick="del(<?php echo $result[$i]['property_id']; ?>)"><?php echo $lang->DELETE;?></a></td>
							</tr>
							<?php 
							}
						}
						
						?>
                        </td>
						
						
					</table>
                  <?php   }   
             
                  
                   elseif ($_REQUEST['history']=='Sell')
                   {
                  
                   ?>
                    <table style="border: solid;" width="85%" height="25%"
						cellpadding="5" cellspacing="25">

						<tr ><b><?php echo $lang->PROPERTY." ".$lang->FOR." ".$lang->SELL;?></b>
							<td style="text-align: center;">
							
							
							<?php
						$obj=new History();
						$obj->setUsername($_SESSION['user_name']); 
						$obj->setUserid($_SESSION['user_id']);
						$result=$obj->viewSellHistory($obj->getUserid());
						
						?>
						<tr>
						<td><?php echo $lang->PRICE;?></td><td><?php echo $lang->ADDRESS;?></td><td><?php echo $lang->PROPERTY." ".$lang->STATUS;?></td>
						</tr>
						<?php 
						for($i = 0 ; $i < count($result) ; $i ++)
						{
							$result2=$obj->propbuy($result[$i]['property_id']);
							//echo "<pre>";
							//print_r($result1);
							if($result2[0]['property_status'] <>'delete')
							{
							?>
							<tr>
						
							<td><?php echo $result2[0]['price'] ?> </td>
							<td><?php echo $result2[0]['address'] ?> </td>
							<td><?php echo $result2[0]['property_status'] ?> </td>
							<td><a  href="javascript:void(0)" onclick="del(<?php echo $result[$i]['property_id']; ?>)">Delete</a></td>
							</tr>
							<?php 
							}
						}
						
						?>
                        </td>
						
					</table>
					
					<?php 
                   }
             
				else
				{
					?>
					 <table style="border: solid;" width="85%" height="25%"
						cellpadding="5" cellspacing="25">

						<tr ><b><?php echo $lang->PROPERTY." ".$lang->FOR." ".$lang->RENT;?></b>
							<td style="text-align: center;">
						<?php
						$obj=new History();
						$obj->setUsername($_SESSION['user_name']); 
						$obj->setUserid($_SESSION['user_id']);
						$result=$obj->viewRentHistory($obj->getUserid());
						//echo "<pre>";
						//print_r($result);
						?>
						<tr>
					<td><?php echo $lang->PRICE;?></td><td><?php echo $lang->ADDRESS;?></td><td><?php echo $lang->PROPERTY." ".$lang->STATUS;?></td>
						</tr>
						<?php 
						for($i = 0 ; $i < count($result) ; $i ++)
						{
							$result1=$obj->propbuy($result[$i]['property_id']);
							//echo "<pre>";
							//print_r($result1);
							if($result1[0]['property_status'] <>'delete')
							{
							?>
							<tr>
							
							<td><?php echo $result1[0]['price'] ?> </td>
							<td><?php echo $result1[0]['address'] ?> </td>
							<td><?php echo $result1[0]['property_status'] ?> </td>
							<td><a href="javascript:void(0)" onclick="del(<?php echo $result[$i]['property_id']; ?>)">Delete</a></td>
							</tr>
							<?php 
							}
						}
						
						?>
                        </td>
						
						
					</table>
                   
                   <?php   }
                   ?>
				</center>
			</form>
			<div id="tab5"></div>
		




