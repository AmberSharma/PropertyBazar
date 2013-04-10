<?php
session_start ();
if (isset ( $_REQUEST ['lang'] )) 
{
	$_SESSION['lang']=$_REQUEST ['lang'];
}
require_once "model/constant.php";
require_once "/var/www/PropertyBazar/trunk/development/model/constant1.php";
?>
<html>
<head><title>Property Bazar</title>
<noscript><?php include SITEPATH.'view/enablejs.php';?></noscript>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="http://localhost/PropertyBazar/trunk/development/css/vendor-jquery_uisbase-html5mod-b-modalmod-b-icon-legacymod-b.css">
<link rel="stylesheet" href="http://localhost/PropertyBazar/trunk/development/css/style.css">
<link rel="stylesheet" href="http://localhost/PropertyBazar/trunk/development/css/error.css">
<link rel="shortcut icon" href="http://localhost/PropertyBazar/trunk/development/images/favicon.ico" type="image/x-icon">
<link rel="icon" href="http://localhost/PropertyBazar/trunk/development/images/favicon.ico" type="image/x-icon">

<script	src='http://localhost/PropertyBazar/trunk/development/javascript/beacon.js'></script>
<script	src='http://localhost/PropertyBazar/trunk/development/javascript/br-trk-5103.js'></script>
<script	src='http://localhost/PropertyBazar/trunk/development/javascript/jquery-1.3.2.js'></script>
<script	src='http://localhost/PropertyBazar/trunk/development/javascript/rta.js'></script>
<script	src='http://localhost/PropertyBazar/trunk/development/javascript/jquery.tools.min.js'></script>
<script	src='http://localhost/PropertyBazar/trunk/development/javascript/jquery.validate.js'></script>

<style>
    
   
   
    input.error { border: 1px solid red; width: auto; }
    label.error {
       
        padding-left: 16px;
        margin-left: .3em;
    }
    label.valid {
       
        display: block;
        width: 16px;
        height: 16px;
    }
input
{
	background-color: #F8F8F8;
    border: 1px solid #52951A;
	border-radius: 8px 8px 8px 8px;
    box-shadow: 0 0 4px 2px rgba(0, 0, 0, 0.2) inset, 1px 1px 0 rgba(255, 255, 255, 0.3);
    font-size: 0.9em;
    padding: 0;
    text-indent: 5px;
    transition: all 0.2s ease-in-out 0s;
}
</style>
</head>

<?php
if (isset ( $_SESSION ['user_name'] )) {
	if ($_SESSION ['user_type'] == 'a') {
		header ( "Location:" . NEWPATH1 . "view/admin.php" );
		break;
	} else if ($_SESSION ['user_type'] == 'b') {
		header ( "Location:" . NEWPATH1 . "view/broker.php" );
		break;
	} else if ($_SESSION ['user_type'] == 'u') {
		header ( "Location:" . NEWPATH1 . "view/user.php" );
		break;
	}
}
?>

<script type="text/javascript">

function refresh()
{
	location.reload()
}
function done()
{
	$("div:#tab4").hide();
}

function userLogin()
{	
      $.ajax({ 
      type: "POST",
      url: "controller/login_action.php",
      data: $('#firstphp').serialize(),
      success: function(data){
     if($.trim(data)=="0") {
        	window.location.href ="view/admin.php";
        }
	else if($.trim(data)=="1") {
        	window.location.href ="view/broker.php";
        }
else if($.trim(data)=="2") {

        	window.location.href ="view/user.php";
        }
else{
     $("div:#tab4").show();
    	$("#tab4").html(data);
} }
   });
  }
function userRegister()
{	
	$.ajax({ 
    type: "POST",
    url: '<?php echo NEWPATH1 ?>controller/registration_action.php',
    data: $('#firstphp1').serialize(),
    success: function(data){

	var resp=jQuery.parseJSON(data);
 		$("#tab3").show();
    	$("#tab3").html("");
    	$.each(resp, function(key, val) {
        	if(key=="success")
        	{
        		$("#tab3").append(val);
        		$("#tab4").hide();
            }
        	else if(key=="fail")
    	    $("#tab3").append(val);
        	else
        	{
        		$("#tab3").append(key + ": " + val);
            }
    	});
       }
   });
  }
  
</script>





<body>

<?php

include SITEPATH . 'view/head.php';
?>
	<div>
		<br /> <br /> <br /> <br />
    <?php include SITEPATH.'view/searchpanel.php'; ?>
  </div>


	<div id="searchresult"
		style="width: 53%; margin-left: 10%; padding-left: 1%; float: left;">
    <?php
				include SITEPATH . 'view/left.php';
				?>
  </div>

	<div style="width: 25%; float: right; margin: 5% 10% 0% 0%;">
    <?php include SITEPATH.'view/right.php'; ?>
  </div>

	<div style="clear: both;">
    <?php include SITEPATH.'view/below.php'; ?>
  </div>
  <center>
  <?php include SITEPATH.'view/footer.php'; ?>
</center>

 <div id="facebox">
		<div>
			<h2><?php echo $lang->LOGIN.$lang->PANEL; ?></h2>

			<p><?php echo $lang->PLEASE.$lang->ENTER.$lang->USERNAME; ?> &amp;<?php echo $lang->PASSWORD.$lang->FOR.$lang->ENTER.$lang->IN.$lang->YOUR.$lang->DOMAIN."."; ?>
 </p>
			<div id="tab3">
			<div id="tab4"></div>
			<form name="firstphp" method="post" action="#" id="firstphp">
				
					<p>
						<?php echo $lang->USERNAME; ?>:<input type="text" name="user_name" onclick="done()">
					</p>

					<p>
						<?php echo $lang->PASSWORD; ?>:<input type="password" name="password">
					</p>
					<input type="button" value="<?php echo $lang->LOGIN;?>" onclick="userLogin()">
				
			</form>
		</div>
			<p style="color: #666">
			<?php echo $lang->TO.$lang->CLOSE." , ".$lang->CLICK.$lang->THE.$lang->CLOSE.$lang->BUTTON.$lang->OR.$lang->HIT.$lang->THE.$lang->ESC.$lang->KEY."."; ?>
			 </p>
			<p>
				<button class="close" onclick="refresh()"><?php echo $lang->CLOSE;?></button>
			</p>
		</div>
	</div>



	<div id="registration" style="min-width: 500px;">
		<div>
			<h2><?php echo $lang->REGISTRATION;?>&nbsp;<?php echo $lang->PANEL;?></h2>
			<form id="firstphp1" class="cols" action="#" method="post"
				name="firstphp1">

				<div id="tab4">
					<table style="margin-left: 50px;">
						<tr>
							<td></td>
						</tr>

						<tr>
							<td><?php echo $lang->NAME;?> *</td>

							<td><input id="name1" class="required" type="text" name="name1" size="28" maxlength="30"></td>
						</tr>

						<tr>
							<td><?php echo $lang->EMAIL;?> *</td>

							<td><input id="email2" class="required" type="email" size="28" name="email" ></td>
						</tr>

						<tr>
							<td><?php echo $lang->CONTACTNO;?>*</td>

							<td><input id="contact" class="required" type="number" size="28" name="contact_no" minlength="10"></td>
						</tr>

						<tr>
							<td><?php echo $lang->USERNAME;?> *</td>

							<td><input id="username" class="required" type="text" size="28" name="user_name" 
								maxlength="30"></td>
						</tr>

						<tr>
							<td><label><?php echo $lang->USERTYPE;?></label></td>
							<td><select name="user_type" style="height:20px; font-size:13px;border: 1px solid black;width: 220px;" >
									<option>---<?php echo $lang->SELECT;?>---</option>

									<option value="u"><?php echo $lang->USER;?></option>

									<option value="b"><?php echo $lang->BROKER;?></option>
							</select></td>
						</tr>

						<tr>
							<td id="terms"><label><?php echo $lang->ACCEPT;?></label></td><td> <input 
								type="checkbox" ></td>
						</tr>

						<tr>
							<td><input type="button" value="submit" id="btnSubmit"  /></td>

							<td><button type="reset"><?php echo $lang->RESET;?></button></td>
						</tr>
					</table>
				</div>
			</form>
			<center>

				<p style="color: #666">
			<?php echo $lang->TO.$lang->CLOSE." , ".$lang->CLICK.$lang->THE.$lang->CLOSE.$lang->BUTTON.$lang->OR.$lang->HIT.$lang->THE.$lang->ESC.$lang->KEY."."; ?>
			 </p>
			<p>
				<button class="close" onclick="refresh()"><?php echo $lang->CLOSE;?></button>
			</p>
			</center>
		</div>
	</div>
</body>
</html>
	<script type="text/javascript">
$(document).ready(function() {
  $("#open_now").click(function() {
      $("#facebox").overlay().load();
      $("div:#tab4").hide();  
     
  });
  $("#open_now1").click(function() {
	   $("#registration").overlay().load();
  });

    // select the overlay element - and "make it an overlay"
  $("#facebox").overlay({

    // custom top position
    top: 260,

    // some mask tweaks suitable for facebox-looking dialogs
    mask: {

    // you might also consider a "transparent" color for the mask
    color: '#fff',

    // load mask a little faster
    loadSpeed: 200,

    // very transparent
    opacity: 0.5
    }

    // disable this for modal dialog-type of overlays
   // closeOnClick: false,

    // load it immediately after the construction
    

    });
  $("#registration").overlay({

	    // custom top position
	    top: 260,

	    // some mask tweaks suitable for facebox-looking dialogs
	    mask: {

	    // you might also consider a "transparent" color for the mask
	    color: '#fff',

	    // load mask a little faster
	    loadSpeed: 200,

	    // very transparent
	    opacity: 0.5
	    }

	    // disable this for modal dialog-type of overlays
	   // closeOnClick: false,

	    // load it immediately after the construction
	    

	    });
	  
	$('#btnSubmit').click(function() {
		var p=$('#firstphp1').valid()
		    rules: { 
		    	contact: "required"
			    	name1:"required"
					email2:
						{
						required:true
						email:true
						}
				username:"required"
			}
		
			 if(p)
			{
				userRegister();
			} 

		});//form validate



});
  </script>
