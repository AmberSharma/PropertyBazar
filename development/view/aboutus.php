<meta http-equiv="Content-type" content="text/html; charset=utf-8" />

<?php
require_once "../model/constant.php";
require_once "/var/www/PropertyBazar/trunk/development/model/constant1.php";?>
<script>
function back(str)
{ 
	alert(str); 
	$('#searchresult').load("<?php echo NEWPATH?>"+str, function() {
	 });
}
</script>

    <div class="posters">
	<div class="poster double_wide no_max_height" style="width: 620px; height: 600px">
		<h2 style="width: 620px" class="do_not_shorten"><?php echo $lang->ABOUTUS; ?></h2>
		<div class="row benefit" style="overflow: auto">
    
    
    PropertyBazar is the next generation of free online classifieds</br>

 <p>PropertyBazarprovides a simple solution to the complications involved in selling, buying, trading, discussing, organizing,
 and meeting people near you, wherever you may reside.</p>
<b>
 On PropertyBazaryou can:
</b><br/></br>
Easily design rich ads with pictures.</br></br>
Control your selling, buying, and community activity in my propertybazar</br></br>
Display your ads on your social networking profile (Facebook, Myspace, ...)</br></br>
Access the site from your mobile phone</br></br>
View PropertyBazarin your local language</br></br>
</br></br>

 <h5>PropertyBazar is used in over 12 cities in INDIA. The company was founded in March 2013</h5>

<input type="button" onclick="back('left.php')" value="Back" />
</div>
</div>
</div>
