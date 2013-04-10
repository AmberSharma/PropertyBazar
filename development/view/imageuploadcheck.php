<?php
require_once "../model/constant.php";
require_once '../model/model.php';
include '../model/imageupload_class.php';
$image='image';
$valid_file=true;

$obj=new ImageUpload();
$value=explode(" ",$_REQUEST['monthly']);
//echo $value[1];
if($value[1]==1000)
{
	$type="weekly";
	$uploadtime=date('Y-m-d', strtotime("+7 days"));
	
}else if($value[1]==5000)
{
	$type="monthly";
	$uploadtime=date('Y-m-d', strtotime("+1 month"));
}else{
	$type="yearly";
	$uploadtime=date('Y-m-d', strtotime("+1 year"));
}

$filecheck = basename($_FILES['myfile']['name']);
$obj->setImage('image');
$obj->setUrl($_REQUEST['url1']);

//echo $obj->getUrl();die;
$check = substr($filecheck, strrpos($filecheck, '.') + 1);
if ($check == "jpg" || $check == "jpeg" || $check == "png")
{
if($_FILES['myfile']['name'])
{
  
  if(!$_FILES['myfile']['error'])
  {

    
    $new_file_name = strtolower($_FILES['myfile']['tmp_name']); 
    if($_FILES['myfile']['size'] > (1024000)) 
    {
      $valid_file = false;
      $message = 'Your file\'s size is to large.';
    } 
    if($valid_file)
    {

	$target_path = SITEPATH."images/advertisement/";
	$id=$obj->upload($obj->getImage(),$obj->getUrl(),$type,$uploadtime);
	$target_path = $target_path . 'image'.$id; 

	if(move_uploaded_file($_FILES['myfile']['tmp_name'], $target_path)) {
		
		echo "The file has been uploaded <br/>";
	   
	   
	    
	} else
	{
	    echo "There was an error uploading the file, please try again!";
	}
    } 
  }
  
  else
  {

   
    $message = 'Your upload triggered the following error:  '.$_FILES['myfile']['error'];
  }
}
}else 
{
	echo "<h5>invalid format</h5>";
}
