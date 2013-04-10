<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<?php
session_start();
 require_once "/var/www/PropertyBazar/trunk/development/model/constant1.php";?>
 <div class="posters">
	<div class="poster double_wide no_max_height" style="width: 620px; height: 600px">
		<h2 style="width: 620px" class="do_not_shorten"><?php echo $lang->DELETE." ".$lang->BROKER; ?></h2>
		<div class="row benefit" style="overflow: auto">
<div id="brokerdelete" style="min-width: 500px;">
    <div>
      <form id="myform1" class="cols" action="http://localhost/PropertyBazar/trunk/development/addbroker.php/Delete-broker" method="post" name="myform">
	

	<table style="margin-left: 50px;">
	  <tr>
	    <td></td>
	  </tr>

	  <tr>
	    <td><?php echo $lang->NAME; ?> *</td>

	    <td><input type="text" name="name" pattern="[a-zA-Z ]{5,}" maxlength="30"></td>
	  </tr>

	  

	  <tr>
	    <td><button type="submit"><?php echo $lang->DELETE; ?></button></td>

	    <td><button type="reset"><?php echo $lang->RESET; ?></button></td>
	  </tr>
	</table>
      </form>
</div>
  </div>
</div>
</div>
</div>