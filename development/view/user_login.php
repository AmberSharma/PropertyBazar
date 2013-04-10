<?php
require_once "/var/www/PropertyBazar/trunk/development/model/constant1.php";
?>
<link rel="stylesheet" href="http://localhost/PropertyBazar/trunk/development/css/vendor-jquery_uisbase-html5mod-b-modalmod-b-icon-legacymod-b.css">
<link rel="stylesheet" href="http://localhost/PropertyBazar/trunk/development/css/userstyle.css">
<style>
<?php include "../css/adminstyle.css"; ?>
</style>
<script type="text/javascript">
function action_me(str1)
{  
		$('#searchresult').load(str1, function() {
	               //alert('Load was performed.');
			});
		 }
</script>
<style>
#rightContent
{
	
	height: 16%;
	width:55%;
}

.shortcutHome a
{
	
}
</style>

<div id="wrapper">
		<div id="rightContent" class="left">
			<center>

			<div id="badd" class="shortcutHome">
				<a href="javascript:void(0)" onclick=action_me("feedback.php")><img src="<?php echo IMAGEPATH; ?>feedback.png"><br>
				<?php echo $lang->FEEDBACK;?></a>
			</div>

			<div id="bdelete" class="shortcutHome" >
				<a href="javascript:void(0)" onclick=action_me("change_password.php")><img src="<?php echo IMAGEPATH; ?>changepassword.png"><br>
				<?php echo $lang->CHANGE."<br/>".$lang->PASSWORD;?></a>
			</div>
			
			
			<div id="message" class="shortcutHome">
				<a href="javascript:void(0)" onclick=action_me("uploadproperty.php")><img src="<?php echo IMAGEPATH; ?>uploadproperty.png"><br>
				<?php echo $lang->UPLOAD." ".$lang->PROPERTY;?></a>
				
				
			</div>
			

			<div class="shortcutHome">
				<a href="javascript:void(0)" onclick=action_me("updateProfile.php")><img src="<?php echo IMAGEPATH; ?>updateprofile.png"><br>
				<?php echo $lang->UPDATE."<br/>".$lang->PROFILE;?></a>
			</div>

			<div class="shortcutHome">
				<a href="javascript:void(0)" onclick=action_me("viewProfile.php")><img src="<?php echo IMAGEPATH; ?>viewprofile.png"><br>
				<?php echo $lang->VIEW."<br/>".$lang->PROFILE;?></a>
			</div>

			
			
			<div class="shortcutHome">
				<a href="javascript:void(0)" onclick=action_me("historyshow.php")><img src="<?php echo IMAGEPATH; ?>mywork.png"><br>
				<?php echo $lang->MY."<br/>".$lang->HISTORY;?></a>
			</div>
<div id="badd" class="shortcutHome">
				<a href="javascript:void(0)" onclick=action_me("viewfeedback.php")><img src="<?php echo IMAGEPATH; ?>feedback.png"><br>
				<?php echo $lang->VIEW."<br/>".$lang->FEEDBACK;?></a>
			</div>

			<div class="clear"></div>
			</center>		
	</div>

		<div class="clear"></div>
	</div>
 


