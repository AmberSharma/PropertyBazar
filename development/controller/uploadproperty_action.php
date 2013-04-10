<?PHP
require_once '../model/model.php';
require_once '../model/uploadproperty_class.php';
require_once SITEPATH."model/classes.validation.php";

	if(isset($_REQUEST) && count($_REQUEST) > 0)
	{
		$strMessages = array();
		$obj1 = new Validate();
		$obj = new SellProperty();
		$a=$obj1->is_validAddress($_REQUEST['address']);
		list($iFlag, $msgValue) = explode("|",$a);   
		if($iFlag=="false")
		{
			$strMessages['address']=$msgValue;
		}
		else 
		{
			$obj->setAddress($msgValue);
		}
		$b=$obj1->is_validNumber($_REQUEST['property_size']);
		list($iFlag, $msgValue) = explode("|",$b);   
		if($iFlag=="false")
		{
			$strMessages['property_size']=$msgValue;
		}
		else 
		{
			$c=$obj1->is_validLength($_REQUEST['property_size']);
			list($iFlag, $msgValue) = explode("|",$c);   
			if($iFlag=="false")
			{
				$strMessages['property_size']=$msgValue;
			}
			else 
			{
				$obj->setSize($msgValue);
			}
		}
		$d=$obj1->is_validText($_REQUEST['property_facility']);
		list($iFlag, $msgValue) = explode("|",$d);   
		if($iFlag=="false")
		{
			$strMessages['property_facility']=$msgValue;
		}
		else 
		{
			$obj->setFacility($msgValue);
		}
		$d=$obj1->is_validText($_REQUEST['property_description']);
		list($iFlag, $msgValue) = explode("|",$d);   
		if($iFlag=="false")
		{
			$strMessages['property_description']=$msgValue;
		}
		else 
		{
			$obj->setDirection($msgValue);
		}
		$e=$obj1->is_validNumber($_REQUEST['property_price']);
		list($iFlag, $msgValue) = explode("|",$e);   
		if($iFlag=="false")
		{
			$strMessages['property_price']=$msgValue;
		}
		else 
		{
			$obj->setNumber($msgValue);
		}
		
		$f=$obj1->is_validNumber($_REQUEST['bargain_amount']);
		list($iFlag, $msgValue) = explode("|",$f);   
		if($iFlag=="false")
		{
			$strMessages['bargain_amount']=$msgValue;
		}
		else 
		{
			$obj->setNumber($msgValue);
		}
		
		$obj->setDirection($_REQUEST['property_direction']);
		$obj->setDealtype($_REQUEST['deal']);
		$obj->setPropertytype($_REQUEST['property']);
		$obj->setPropertyfeature($_REQUEST['property_feature']);
		$obj->setFurnisheditem($_REQUEST['property_furnished_item']);
		$obj->setTransaction($_REQUEST['transaction']);
		$obj->setSector($_REQUEST['sector1']);
		$obj->setCity($_REQUEST['city1']);
		$obj->setBhk($_REQUEST['bhk']);
		$s = serialize($obj);
		if(empty($strMessages))
		{
		$result = $obj->upload($s);
		if($result)
		{
			$fileName = $_FILES["uploaded_file"]["name"]; // The file name
			$target_path = SITEPATH."images/";
			$target_path = $target_path . basename( $_FILES['uploaded_file']['name']);
			//echo $target_path;die;
				if (move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $target_path))
				{
					echo "<div id='filename'>$fileName</div>";
					include '../model/imageupload_class.php';
				
					$obj=new ImageUpload();
					$obj->ImageUploadProperty($fileName,$result);
				}
				$strMessages['success'] = "Your Property successfully uploaded on our website.";
				echo json_encode($strMessages);
			}
			else 
			{
				$strMessages['fail'] = "Due to some error,Your feedback not send.";
				echo json_encode($strMessages);
			}
		}
		else
		{
			echo json_encode($strMessages);
		}
	}
?>
