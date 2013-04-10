<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<?php 
session_start();
require_once "/var/www/PropertyBazar/trunk/development/model/constant1.php";
require_once "../model/constant.php"; 
require_once SITEPATH.'model/model.php';
require SITEPATH."model/profile.php";

$obj = new Profile ();
$result = $obj->viewProfile ();
$count = count ( $result );
for($i = 0; $i < $count; $i++) {
	$obj->setUsername ( $result [$i] ['user_name'] );
	$obj->setContact_no ( $result [$i] ['contact_no'] );
	$obj->setEmail ( $result [$i] ['email'] );
	$obj->setName ( $result [$i] ['name'] );
	$obj->setPassword ( $result [$i] ['password'] );
}

?>

<div class="posters">
	<div class="poster double_wide no_max_height"
		style="width: 620px; min-height: 550px;">
		<h2 style="width: 620px" class="do_not_shorten"><?php echo $lang->UPDATE." ".$lang->YOUR." ".$lang->PROFILE; ?></h2>
		<div class="row benefit" style="overflow: auto">
<div id="tab3"></div>
			<form id="frmid1" action="#" method="post">


				<center id="tab1">
					<table style="border: solid;" width="85%" height="60%"
						cellpadding="5" cellspacing="25">

						<tr>
							<td style="text-align: center;"><b><?php echo $lang->NAME?></b></td>
							<td><input style="height: 30px; font-size: 20px;" type="text" id="name" class="required"
								tabindex="5" value="<?php echo $obj->getName();?>" name="name"
								size="20" maxlength="50" onfocus="remove()"></td>

						</tr>
						<tr>
							<td style="text-align: center;"><b><?php echo $lang->CONTACTNO?></b></td>
							<td><input style="height: 30px; font-size: 20px;" type="number"  id="contact" class="required"
								tabindex="5" value="<?php echo $obj->getContact_no(); ?>"
								name="contact_no" size="20" maxlength="10" onfocus="remove()"></td>

						</tr>
						<tr>
							<td style="text-align: center;"><b><?php echo $lang->EMAILID?></b></td>
							<td><input style="height: 30px; font-size: 20px;" type="email"  id="email1" class="required"
								tabindex="5" value="<?php echo $obj->getEmail(); ?>"
								name="email" size="20" maxlength="100" onfocus="remove()"></td>

						</tr>
						<tr>
							<td style="text-align: center;"><b><?php echo $lang->USERNAME?></b></td>
							<td><input style="height: 30px; font-size: 20px;" type="text"  id="username" class="required"
								tabindex="5" value="<?php echo  $obj->getUsername();?>"
								name="user_name"  size="20"
								maxlength="150" onfocus="remove()"></td>
							<td id="tab">
						
						</tr>
						<tr>
							<td style="text-align: center;"><b><?php echo $lang->PASSWORD?></b></td>
							<td><input style="height: 30px; font-size: 20px;" type="password"  id="password" class="required"
								tabindex="5" name="password"
								value="<?php echo $obj->getPassword(); ?>" size="20"
								maxlength="20" onfocus="remove()"></td>

						</tr>

						<tr>
							<td>&nbsp;</td>
							<td style="text-align: left; font-size: 18px;">&nbsp;<b><input
									tabindex="7" type="button" id="btnSubmit"
									value="<?php echo $lang->SUBMIT?>"> </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><input
									tabindex="8" type="reset" name="rsubmit" value="<?php echo $lang->CLEAR;?>"> </b></td>

						</tr>

					</table>


				</center>
			</form>
		</div>
	</div>
</div>

 <script type="text/javascript">

 function checkUsername()
 {	
       $.ajax({ 
       type: "POST",
       url: '../controller/checkUsername.php',
       data: $('#frmid1').serialize(),
       success: function(data){
     	$("#tab").html(data);
        }
    });
   }

 function updateProfile()
 {	
       $.ajax({ 
       type: "POST",
       url: '../controller/updateProfile_action.php',
       data: $('#frmid1').serialize(),
       
        
        success: function(data){
	var resp=jQuery.parseJSON(data);
 		$("#tab3").show();
    	$("#tab3").html("");
    	$.each(resp, function(key, val) {
        	if(key=="success")
        	{
        		$("#tab3").append(val);
        		$("#tab1").hide();
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
function remove()
{
	$("#tab3").hide();	
}

$(document).ready(function() {
       $('#btnSubmit').click(function() {
               var p=$('#frmid1').valid()
                   rules: {
                           name: "required"
                               contact:
                               { 
                                   required: true
                              number:true
                               }
                                       password: "required"
                                               uname: "required"
                                       email1: {
                                             required: true
                                             email: true
                                           }
                               username:"required"
                                       }
                       
               
                        if(p)
                       {
                               updateProfile();
                       }

               });
});
</script>

 






