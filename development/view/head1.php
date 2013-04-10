<?php
require_once "../model/constant.php"; 
require_once "/var/www/PropertyBazar/trunk/development/model/constant1.php";
?> 

<script type="text/javascript">
function myaction(str)
{  
	$('#searchresult').load(str, function() {
	});
}

function home()
{
<?php
if(isset($_SESSION['user_name'])) {
if($_SESSION['user_type']=='a')
{
?>
window.location.href ="admin.php";
<?php }
else if($_SESSION['user_type']=='b')
{
?>
window.location.href ="broker.php";
<?php }
if($_SESSION['user_type']=='u')
{
?>
window.location.href ="user.php";
<?php }}?>


}
function language(str)
{
<?php
if(isset($_SESSION['user_name'])) {
if($_SESSION['user_type']=='a')
{
?>
window.location.href ="admin.php?lang="+str;
<?php }
else if($_SESSION['user_type']=='b')
{
?>
window.location.href ="broker.php?lang="+str;
<?php }
if($_SESSION['user_type']=='u')
{
?>
window.location.href ="user.php?lang="+str;
<?php }}?>


}

</script>
<header>
<img src="<?php echo IMAGEPATH; ?>propertybazarlogo.png" /> 
<nav class="no_login">
<a rel="nofollow" href="#" onclick="home()"><?php echo $lang->HOME?></a>
<a rel="nofollow" href="#" onclick=myaction("aboutus.php")><?php echo $lang->ABOUTUS?></a>
<a rel="nofollow" href="#" onclick=myaction("contactus.php")><?php echo $lang->CONTACTUS?></a>
<a rel="nofollow" href="#" onclick=myaction("sitemap.php")><?php echo $lang->SITEMAP?></a>
<a rel="nofollow" href="javascript:void(0)" onclick=language("hin")><?php echo $lang->HINDI; ?></a>
<a rel="nofollow" href="javascript:void(0)" onclick=language("en")><?php echo $lang->ENGLISH; ?></a>

<a class="my_trulia login"  href="../controller/logout_action.php"><?php echo $lang->LOGOUT?></a> 
<a class="my_trulia login"  href="admin.php"><?php echo $lang->WELCOME; ?> <?php echo strtoupper( $_SESSION['user_name']); ?></a>
</nav>
</header>

