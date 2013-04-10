
<?php
session_start();
if (isset ( $_REQUEST ['lang'] )) 
{
	$_SESSION['lang']=$_REQUEST ['lang'];
}
include "../model/constant.php"; 

if(isset($_SESSION['user_name']))
{
?>
<html>
<head><title>Property Bazar</title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />

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
body {
	background: url(<?php echo IMAGEPATH;?>latar.jpg);
	margin: 0;
	padding: 0;
	font-family: Arial;
	font-size: 12px;
	color: #2e2e2e;
	text-align: center;
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


<body>
  <?php include SITEPATH.'view/head1.php'; ?>
<br/><br/><br/><br/><br/>
   

  <div style="">
  
   <?php include SITEPATH.'view/searchpanel.php'; ?>
  </div>
<?php include SITEPATH.'view/user_login.php'; ?>
  
  <div id="searchresult" style=" width: 53%; margin-left: 10%; padding-left: 1%;float: left;">
    <?php 
    	include SITEPATH.'view/left.php'; 
    ?>
  </div>

  <div style=" width:25%;float: right; margin: 5% 10% 0% 0%;">
    <?php include SITEPATH.'view/right.php'; ?>
  </div>

  <div style="clear: both;">
    <?php include SITEPATH.'view/below.php'; ?>
  </div>
  <?php include SITEPATH.'view/footer.php'; 

 
 
}
else
{
	
?>
	<script>window.location.href = "../index.php";</script>
	<?php 
} 
 ?> 

