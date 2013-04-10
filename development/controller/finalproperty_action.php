<?PHP
require_once "../model/constant.php"; 
require_once SITEPATH.'model/model.php';
require_once SITEPATH.'model/commission_class.php';
require SITEPATH.'model/message_class.php';
if(isset($_REQUEST) && count($_REQUEST) > 0)
	{
		$obj = new Commission();
		$obj->setBroker_id($_SESSION['user_id']);
		$obj->setBuyer_id($_REQUEST['user_id']);
		$obj->setProperty_id($_REQUEST['pid']);
		$obj->setB_amt($_REQUEST['b_commission']);
		$obj->setS_amt($_REQUEST['s_commission']);
		$s = serialize($obj);
		$result = $obj->finalproperty($s);
		if($result)
		{
			/*message send to all admin*/
			$obj = new MyModel();
			$name = $obj->FetchAdminList();
			
			$counter=count($name);
			$total_commission=$_REQUEST['b_commission']+$_REQUEST['s_commission'];
			$content1="property sold by ".$_SESSION['user_name']." with commission of ".$total_commission;
			for($j=0;$j<$counter;$j++)
			{
			$obj1 = new Message();
			$obj1->setMessage_To($name[$j]['user_id']);
			$obj1->setContent($content1);
			$obj1->setSubject("Property Sold");
			$val = serialize($obj1);
			$obj1->send($val);
			}
			/*message send to all requested buyers of that property*/
			
			$names = $obj->FetchBuyerList($_REQUEST['pid']);
			
			$counter=count($names);
			$content2="Property Sold successfully by ".$_SESSION['user_name'];
			for($j=0;$j<$counter;$j++)
			{
			$obj2 = new Message();
			$obj2->setContent($content2);
			$obj2->setSubject("Property Sold Successfully");
			$obj2->setMessage_To($names[$j]['user_id']);
			$val1 = serialize($obj2);
			$obj2->send($val1);
			}
			/*message send to the seller of that property*/
			
			$seller = $obj->FetchSeller($_REQUEST['pid']);
			$counter=count($seller);
			for($j=0;$j<$counter;$j++)
			{
			$obj3 = new Message();
			$obj3->setContent("Your Property Sold successfully");
			$obj3->setSubject("Property Sold");
			$obj3->setMessage_To($seller[$j]['user_id']);
			$val2 = serialize($obj3);
			$obj3->send($val2);
			}
			
			/*message send to the buyer of that property*/
				
			$buyer = $obj->FetchBuyer($_REQUEST['pid']);
			
			$counter=count($buyer);
			for($j=0;$j<$counter;$j++)
			{
			$obj3 = new Message();
			$obj3->setContent("You have successfully purchased a Property from Property Bazar.");
			$obj3->setSubject("Property Purchased");
			$obj3->setMessage_To($buyer[$j]['buyer_id']);
			$val2 = serialize($obj3);
			$obj3->send($val2);
			}
			
			echo "<h2>Property sold & uploaded successfully.</h2>";
			
		}
	}
?>
