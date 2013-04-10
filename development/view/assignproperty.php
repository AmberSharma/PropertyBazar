<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<?php
session_start();
 require_once "/var/www/PropertyBazar/trunk/development/model/constant1.php"; 
require_once "../model/constant.php"; 
require SITEPATH.'model/model.php';
require_once SITEPATH.'model/assignproperty_class.php';
//echo "<pre>";
//print_r($_REQUEST);
?>
<script type="text/javascript">

function brokerarea() {
	var p1 =<?php  echo "'".$_REQUEST['b_area']."'";?>;

var p=[];
      $('input.ch').each( function() {
              if($(this).attr('checked')) {
                        p.push($(this).attr('rel'));
                      }
                        } );
$.ajax({
type: "POST", // Post / Get method
url: "../controller/brokersearch_action.php", //Where form data is sent on submission
dataType:"text", 
data:"checked=" + p+"&b_area="+p1,
//data:$('#frmid1').serialize(),

beforeSend: function() {
	
        },
	        success: function(data){
	        	$("#output").html('');
	                 $("#output").append(data);
        },
	        complete: function () {
	            
	        },
	        error: function(){
	            
	        }
});

 
}



</script>
<style>
table
{
	border-spacing: 20px;
	
	
}
table td
{
	text-align:center;
}
</style>


		<?php 
			$area=$_REQUEST['b_area'];
			$obj = new AssignProperty();
			$result=$obj->Findcommonproperty($area);
			
?>

			<table>
<tr>
	<td><?php echo $lang->PID; ?></td>&nbsp; &nbsp; &nbsp;<td><?php echo $lang->PRICE;?></td>&nbsp;&nbsp;&nbsp;<td><?php echo $lang->BARGAIN;?></td>&nbsp;&nbsp;&nbsp;<td><?php echo $lang->SELECT;?></td>
</tr>
<?php

			for($i= 0 ; $i < count($result) ; $i ++)
			{ ?>
				<tr>
					<td>
						<u><a href="javascript:void(0)"><?php printf("%04d" ,$result[$i]['property_id']); ?></a></u>
					</td>
					<td>
						<h6><?php echo $result[$i]['price'] ?></h6>
					</td>
					<td>
						<h6><?php echo $result[$i]['bargain_amount'] ?></h6>
					</td>
					<td>
					
						<input type="checkbox" class="ch" rel="<?php echo $result[$i]['property_id']; ?>" onclick="brokerarea()"/>
					
					</td>
				</tr>
			<?php }
		?>

</table>

<div id="output">
</div>
<div id="responce">
</div>
		




