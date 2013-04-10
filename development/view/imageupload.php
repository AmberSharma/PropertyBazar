<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<?php
session_start();
require_once "/var/www/PropertyBazar/trunk/development/model/constant1.php";
require_once "../model/constant.php";
?>
<script	src='http://localhost/PropertyBazar/trunk/development/javascript/jquery.tools.min.js'></script>
</head>
 <body>
 <div class="posters">
	<div class="poster double_wide no_max_height" style="width: 620px; height: 600px">
		<h2 style="width: 620px" class="do_not_shorten">IMAGE UPLOAD</h2>
		<div class="row benefit" style="overflow: auto">
<div id="image_upload" style="min-width: 500px;">
    <div>
  <?php if($_SESSION)
 {?>
 <div class=div1></div>
<iframe name="process" id="id2"></iframe>
<div id="tab2">
<form method="post" action="imageuploadcheck.php" target="process" enctype="multipart/form-data">
    <h3><?php echo $lang->SCHEME; ?></h3>
<input type="radio" name="radio" value="" id="radio00"><?php echo $lang->WEEKLY; ?></input></br>
<input type="radio" name="radio" value="" id="radio01"><?php echo $lang->MONTHLY; ?></input></br>
<input type="radio" name="radio" value="" id="radio02"><?php echo $lang->YEARLY; ?></input>

<div  id="weekly">
<input type="text" name="monthly" readonly="readonly" value="<?php echo $lang->RS; ?> 1000"  style="width: 20%;"></input>
</div>

<div  id="monthly">
<input type="text" name="monthly" readonly="readonly" value="<?php echo $lang->RS; ?> 5000" style="width: 20%;"></input>
</div>

<div id="yearly">
<input type="text" name="monthly" readonly="readonly" value="<?php echo $lang->RS; ?> 8000" style="width: 20%;">
</div>
<p id="file1"><?php echo $lang->UPLOADIMAGE; ?>:<input type="file" name="myfile"</p>
   <p id="url1"><?php echo $lang->URLPATH; ?>:<input type="url" name="url1" require="required"/></p>
    <input type="submit" value="<?php echo $lang->UPLOAD; ?>" id="submit1"/>
</form>
</div>
<script>
$(document).ready(function(){
	$('#id2').hide();
	$('#weekly').hide();
	$('#monthly').hide();
	$('#yearly').hide();
	$('#submit1').hide();
	$('#url1').hide();
$('#file1').hide();
	$("#radio00").click(function() {
		if ($(this).is(':checked')) { $('#mothly').hide(); $('#yearly').hide();  $('#weekly').show();
		$('#file1').show();$('#url1').show(); $('#submit1').show(); }
		});

	$("#radio01").click(function() {
	if ($(this).is(':checked')) { $('#weekly').hide(); $('#yearly').hide(); $('#monthly').show();
	 $('#file1').show(); $('#url1').show(); $('#submit1').show(); }
	});

	$("#radio02").click(function() {
	if ($(this).is(':checked')) { $('#monthly').hide(); $('#weekly').hide(); $('#yearly').show();
	$('#file1').show(); $('#url1').show(); $('#submit1').show();  }
	});

	});

    var Upload = function() {

        $(function() {
            $('iframe[name=process]').load(function() {
            	$('#tab2').hide();
            	$('#id2').show();
            	$('.loading-div').hide('slow', function() {
                	//$('#id2').show();
                    alert('Your file has been successfully uploaded.');
                });
            });
        });

        return {
            start: function() {
            	
                $('.loading-div').show();
                
            }
        }
    }();  
</script>


    
</div>
</div>
</div>
</div>
</div>
<?php }else {
	?>
	<script type="text/javascript">

if(t==true)
{
}else
{
	window.location.assign("");
}
</script>
<?php }?>
