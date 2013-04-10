<?PHP
require_once "constant.php"; 
require_once SITEPATH.'model/model.php';
class Feedback 
{
	private $subject;
	private $content;
	private $feedback_by;
	private $status;
	private $feedback_to;
	
	
	
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
	public function setFeedback_to($feedback_to) {
		$this->feedback_to = $feedback_to;
	}
	public function getSubject() {
		return $this->subject;
	}

public function setStatus($Status) {
		$this->Status = $Status;
	}
	public function getStatus() {
		return $this->Status;
	}

	public function getContent() {
		return $this->content;
	}
	
	public function getFeedback_by() {
		return $this->feedback_by;
	}
	public function getFeedback_to() {
		return $this->feedback_to;
	}

	public function send($value)
	{
		$obj1 = new MyModel();
		$result = $obj1->SendFeedback($value);
		return $result;
		
	
	}

	public function View($value)
	{
		$obj1 = new MyModel();
		$result = $obj1->ViewFeedback($value);
		return $result;
	}
}
?>
