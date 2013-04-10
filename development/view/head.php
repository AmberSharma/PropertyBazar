<script type="text/javascript">
function language(str)
{
	window.location.href ="index.php?lang="+str;
}
function action(str)
{
	$('#searchresult').load(str, function() {
	 });
}
function home()
{
window.location.href ="index.php";
}
</script>


<header>
   <img src="<?php echo IMAGEPATH; ?>propertybazarlogo.png" /> 
<nav class="no_login">
<a rel="nofollow" href="javascript:void(0)" onclick="home()"><?php echo $lang->HOME ;?></a>
<a rel="nofollow" href="javascript:void(0)" onclick="action('view/aboutus.php')"><?php echo $lang->ABOUTUS; ?></a>
<a rel="nofollow" href="javascript:void(0)" onclick="action('view/contactus.php')"><?php echo $lang->CONTACTUS ;?></a>
<a rel="nofollow" href="javascript:void(0)" onclick="action('view/sitemap.php')"><?php echo $lang->SITEMAP; ?></a>
<a rel="nofollow" href="javascript:void(0)" onclick="language('hin')"><?php echo $lang->HINDI; ?></a>
<a rel="nofollow" href="javascript:void(0)" onclick="language('en')"><?php echo $lang->ENGLISH; ?></a>


<a class="my_trulia login" id="open_now" href="javascript:void(0)"><?php echo $lang->LOGIN; ?></a>
<a class="signup" id="open_now1" href="javascript:void(0)"><?php echo $lang->SIGNUP ;?></a>

</nav>

</header>


