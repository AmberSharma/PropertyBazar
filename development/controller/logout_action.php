<?php
session_start();
$lang=$_SESSION['lang'];

include "../model/constant.php"; 
require_once SITEPATH.'model/login.php';
$obj = new Login();
if(isset($_SESSION['user_name'])) {
	$obj->logout();
	header('location:../index.php?lang='.$lang);
} 
?>
