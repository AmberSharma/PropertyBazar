<?php
require_once "../model/constant.php";
require_once '../model/model.php';
$obj=new MyModel();
$result=$obj->FetchImage();

?>
<script src="../javascript/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="../javascript/jquery.cycle.lite.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#myslides').cycle({
		fit: 1, pause: 1, timeout: 4000
	});
});
</script>
<link rel="stylesheet" href="../css/dynamicslides.css" type="text/css" media="screen" />
<br><br>
<?php
//$directory = '../images/partners'; 	
try {
	echo '<div id="myslides">';
		for($i= 0 ;$i< count($result) ;$i ++)
		{
			$path = IMAGEPATH . 'advertisement/' . $result[$i]['image'] ;
	
			echo '<a href="' . $result[$i]['url'] .'" target="_blank"><img src="' . $path . '"/></a>';
		}
	echo '</div>';
}	
catch(Exception $e) {
	echo 'No images found for this slideshow.<br />';	
}
?>


