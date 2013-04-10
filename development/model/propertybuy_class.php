<?PHP
require_once "constant.php"; 
require_once SITEPATH.'model/model.php';

class Propertybuy
{
	private $subject;
	private $content;
	
	private $feedback_by;
	
	
	
	public function setSubject($subject) {
		$this->subject = $subject;
		//echo $this->subject;
	}

	public function setContent($content) {
		$this->content = $content;
	}

	
	public function setFeedback_by($feedback_by) {
		$this->feedback_by = $feedback_by;
	}
	public function getSubject() {
		return $this->subject;
	}
	public function getContent() {
		return $this->content;
	}
	
	public function getFeedback_by() {
		return $this->feedback_by;
	}
	

	public function buyProperty($matchfield)
	{
		$obj1 = new MyModel();
		$result = $obj1->BuyProperty($matchfield);
		return $result;
	
	}
	
}
?>
