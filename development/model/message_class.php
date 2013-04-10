<?PHP
require_once "constant.php"; 
require_once SITEPATH.'model/model.php';
class Message
{
	private $subject;
	private $content;
	private $message_To;
	private $time;
	private $message_From;
	
	
	
	public function setMessage_From($message_From) {
		$this->message_From = $message_From;
	}
	public function setSubject($subject) {
		$this->subject = $subject;
		//echo $this->subject;
	}

	public function setContent($content) {
		$this->content = $content;
	}

	
	public function setMessage_To($message_To) {
		$this->message_To = $message_To;
	}
	public function getSubject() {
		return $this->subject;
	}
	public function setTime($time= "") {
		$this->time = $time;
	}
	public function getTime() {
		return $this->time;
	}
	public function getContent() {
		return $this->content;
	}
	
	public function getMessage_To() {
		return $this->message_To;
	}
	public function getMessage_From() {
		return $this->message_From;
	}
	

	public function send($value)
	{
		
		$obj1 = new MyModel();
		$result = $obj1->SendMessage($value);
		return $result;
	}
	
	public function viewMessage($value)
	{
	
		$obj1 = new MyModel();
		$result = $obj1->viewMessage($value);
		return $result;
		
		
	}
}
?>