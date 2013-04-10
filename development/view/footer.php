<style type="text/css">
.css3-shadow1 {
	position: relative;
	-webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.3);
	box-shadow: 0 1px 4px rgba(0, 0, 0, 0.3);
}
table td
{
	padding-left:10px;
	padding-right:10px;
}
.box1 {
	width: 80%;
	height: 3%;
	min-height: 3%;
	padding: 10px;
	
	background: #5EAB1F;
	margin: 10px auto 60px;
	border-radius: 10px;
	text-color:white; 
}


</style>
<script type="text/javascript">
function action_perform(str1)
{  
		$('#searchresult').load("<?php echo NEWPATH1;?>"+ str1, function() {
	               //alert('Load was performed.');
			});
		 }
</script>

<footer>
<div  class="box1 css3-shadow1">
<center>
<table>
<tr>
<td><?php echo $lang->ALLRIGHTRESEVRVED;?>To Property Bazar,Noida</td>
<td><a href="javascript:void(0)" onclick="action_perform('view/termsandcondition.php')"><?php echo $lang->TERMSANDPRIVACY;?></a></td>
<td><a href="javascript:void(0)" onclick="action_perform('view/ourpartners.php')"><?php echo $lang->OURPARTNERS;?></a> </td>
</tr>
</table>
</center>
</div>
</footer>
