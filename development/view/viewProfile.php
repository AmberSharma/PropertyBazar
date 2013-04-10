<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<?php 
session_start();

require_once "/var/www/PropertyBazar/trunk/development/model/constant1.php";
include "../model/constant.php"; 
require SITEPATH."model/profile.php";

$obj = new Profile ();
$result = $obj->viewProfile ();
$count = count ( $result );
for($i = 0; $i < $count; $i ++) {
	$obj->setUsername ( $result [$i] ['user_name'] );
	$obj->setContact_no ( $result [$i] ['contact_no'] );
	$obj->setEmail ( $result [$i] ['email'] );
	$obj->setName ( $result [$i] ['name'] );
	$obj->setPassword ( $result [$i] ['password'] );
}

?>
<div class="posters">
	<div class="poster double_wide no_max_height"
		style="width: 620px; min-height: 900px;">
		<h2 style="width: 620px" class="do_not_shorten"><?php echo $obj->getName();?>'s <?php echo $lang->PROFILE; ?></h2>
		<div class="row benefit" style="overflow: auto">
			<form id="frmid1" action="#" method="post">


				<center>
					<table style="border: solid;" width="85%" height="45%"
						cellpadding="5" cellspacing="25">

						<tr>
							<td style="text-align: center;"><b><?php echo $lang->NAME; ?></b></td>
							<td><?php echo $obj->getName();?></td>

						</tr>
						<tr>
							<td style="text-align: center;"><b><?php echo $lang->CONTACTNO; ?></b></td>
							<td><?php echo $obj->getContact_no(); ?></td>

						</tr>
						<tr>
							<td style="text-align: center;"><b><?php echo $lang->EMAILID; ?></b></td>
							<td><?php echo $obj->getEmail(); ?></td>

						</tr>
						<tr>
							<td style="text-align: center;"><b><?php echo $lang->USERNAME; ?></b></td>
							<td><?php echo  $obj->getUsername();?></td>

						</tr>
						<tr>
							<td style="text-align: center;"><b><?php echo $lang->PASSWORD; ?></b></td>
							<td><?php echo preg_replace("/[A-Za-z0-9]/","*",$obj->getPassword()); ?></td>

						</tr>
					</table>


				</center>
			</form>
		</div>
	</div>
</div>





