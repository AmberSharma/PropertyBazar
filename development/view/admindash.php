<link rel="stylesheet" href="http://localhost/PropertyBazar/trunk/development/css/vendor-jquery_uisbase-html5mod-b-modalmod-b-icon-legacymod-b.css">
<link rel="stylesheet" href="http://localhost/PropertyBazar/trunk/development/css/adminstyle.css">
<script type="text/javascript">
function viewshow(str)
{  
		$('#searchresult').load(str, function() {
	               //alert('Load was performed.');
			});
}

	
	</script>
	
<style>
#rightContent
{
	
	height: 16%;
	width: 65%;
}
.shortcutHome a
{
	
}
</style>


	<div id="wrapper">
		<div id="rightContent">
			

			<div id="badd" class="shortcutHome">
				<a href="javascript:void(0)" onclick=viewshow("brokerregister.php")><img src="<?php echo IMAGEPATH; ?>addbroker.png"><br>
				<?php echo $lang->ADD." ".$lang->BROKER;?></a>
			</div>

			<div id="bdelete" class="shortcutHome" >
				<a href="javascript:void(0)" onclick=viewshow("brokerdelete.php")><img src="<?php echo IMAGEPATH; ?>deletebroker.png"><br>
				<?php echo $lang->DELETE." ".$lang->BROKER;?></a>
			</div>
			
			
			<div id="message" class="shortcutHome">
				<a href="javascript:void(0)" onclick=viewshow("area.php")><img src="<?php echo IMAGEPATH; ?>assignproperty.png"><br>
				<?php echo $lang->ASSIGN." ".$lang->PROPERTY;?></a>
				
				
			</div>
			

			<div id="badd" class="shortcutHome">
				<a href="javascript:void(0)" onclick=viewshow("viewfeedback.php")><img src="<?php echo IMAGEPATH; ?>feedback.png"><br>
				<?php echo $lang->VIEW." <br/>".$lang->FEEDBACK;?></a>
			</div>

			<div class="shortcutHome">
				<a href="javascript:void(0)" onclick=viewshow("viewProfile.php")><img src="<?php echo IMAGEPATH; ?>viewprofile.png"><br>
				<?php echo $lang->VIEW."<br/>".$lang->PROFILE;?></a>
			</div>

			<div id="bdelete" class="shortcutHome" >
				<a href="javascript:void(0)" onclick=viewshow("change_password.php")><img src="<?php echo IMAGEPATH; ?>changepassword.png"><br>
				<?php echo $lang->CHANGE."<br/>".$lang->PASSWORD;?></a>
			</div>

			<div class="shortcutHome">
				<a href="javascript:void(0)" onclick=viewshow("updateProfile.php")><img src="<?php echo IMAGEPATH; ?>updateprofile.png"><br>
				<?php echo $lang->UPDATE."<br/>".$lang->PROFILE;?></a>
			</div>
			<div class="shortcutHome">
				<a href="javascript:void(0)" onclick=viewshow("message.php")><img src="<?php echo IMAGEPATH; ?>sendmessage.png"><br>
				<?php echo $lang->SEND."<br/>".$lang->MESSAGE?></a>
			</div>
			<div class="shortcutHome">
				<a href="javascript:void(0)" onclick=viewshow("viewquestion.php")><img src="<?php echo IMAGEPATH; ?>question.png"><br>
				<?php echo $lang->VIEW."<br/>".$lang->QUESTION?></a>
			</div>
			
			

			<div class="clear"></div>
		</div>

		<div class="clear"></div>
	</div>
		
