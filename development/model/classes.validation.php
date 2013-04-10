<?php 

class Validate{
	
	protected $errName;

	public function is_validText($text){
		$error="";
			$text = filter_var($text, FILTER_SANITIZE_STRING);
			if((preg_match("/^[a-zA-Z .']+$/", $text) === 0)||($text==""))
				$error="error";
		
		if(!empty($error)){
			$errName = 'false|Value must be from letters, spaces and must not start with dash<br/>';
			return $errName;
		}
		else 
		{
			$text="true|".$text;
			return $text;
		}
	}
	
	
	
	public function is_validName($name){
		$error="";
		$name = filter_var($name, FILTER_SANITIZE_STRING);
		if((preg_match("/^[a-zA-Z ' ' ]+$/", $name) === 0)||($name==""))
			$error="error";
	
		if(!empty($error)){
			$errName = 'false|Name must be from letters, spaces and must not start with dash<br/>';
			return $errName;
		}
		else
		{
			$name="true|".$name;
			return $name;
		}
	}
	
	public function is_validNumber($number){
		$error="";
		
			
		$number = filter_var($number, FILTER_SANITIZE_STRING);
		if((preg_match("/^[0-9]+$/", $number) === 0)||($number==""))
			$error="error";
		
	if(!empty($error)){
			$errName = 'false|Number must be from digits. <br/>';
			return $errName;
		}
		else 
		{
			$number="true|".$number;
			return $number;
		}
		
	}
	public function is_validLength($number){
		$error="";
		
			
		$number = filter_var($number, FILTER_SANITIZE_STRING);
		if((preg_match("/^[0-9]{3}$/", $number) === 0)||($number==""))
			$error="error";
		
		if(!empty($error)){
			$errName = 'false|Maximum 3 letter number. <br/>';
			return $errName;
		}
		else 
		{
			$number="true|".$number;
			return $number;
		}
		
	}
	
	public function is_validPassword($password){
		$error="";
		
			
		$password = filter_var($password, FILTER_SANITIZE_STRING);
		if((preg_match("/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{4,10}$/", $password) === 0)||($password==""))
			$error="error";
		
		if(!empty($error)){
			$errName = 'false|There has to be a number, a letter or one of the following: !@#$% and should have be 4-10 characters<br/>';
			return $errName;
		}
		else 
		{
			$password="true|".$password;
			return $password;
		}
		
	}
	
	public function is_validConfirmPassword($p1,$p2){
		$error="";
	
			
		$p1 = filter_var($p1, FILTER_SANITIZE_STRING);
		$p2 = filter_var($p2, FILTER_SANITIZE_STRING);
		if(($p1!=$p2)||($p1=="")||($p2==""))
			$error="error";
	
		if(!empty($error)){
			$errName = 'false|'.$p1.'|Passwords do not Match.|<br />';
			return $errName;
		}
		else
		{
			$number="true|".$p1."|".$p2;
			return $number;
		}
	
	}
	
	public function is_validAddress($address){
		
		$error="";
		
			
		$address=filter_var($address, FILTER_SANITIZE_STRING);
		if((preg_match("/^[a-zA-Z]+\ +[0-9]+$/",$address) === 0)||($address==""))
			$error="error";
		
		if(!empty($error)){
			$errName = 'false|Address is not valid<br/>';
			return $errName;
		}
		else 
		{
			$address="true|".$address;
			return $address;
		}
	}
		
	public function is_validEmail($email){
		
		$error="";
		
			
		$email=filter_var($email, FILTER_SANITIZE_STRING);
		
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){
		
		if((preg_match("/^([a-z0-9]+([_\.\-]{1}[a-z0-9]+)*){1}([@]){1}([a-z0-9]+([_\-]{1}[a-z0-9]+)*)+(([\.]{1}[a-z]{2,6}){0,3}){1}$/i", $email)=== 0)||($email==""))
			$error="error";
		}
		
		if(!empty($error)){
		$errName = 'false|Email must be valid<br/>';
			return $errName;
		}
		else 
		{
			$email="true|".$email;
			return $email;
		}
	}
	
	public function is_validPhone($phone){
		$phone=filter_var($phone, FILTER_SANITIZE_STRING);
		if((preg_match("/^[7-9][0-9]{9}$/", $phone) === 0)||($phone=="")){
			$errName = 'false|Phone Number must  comply with this mask: first digit greater than 6 and number must be 10 digits.<br/>';
			return $errName;
	}
	else 
		{
			$phone="true|".$phone;
			return $phone;
		}
		
		
		

}
}
?>
