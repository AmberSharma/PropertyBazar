<?PHP
require_once "constant.php"; 
require_once SITEPATH.'model/model.php';

class Propertyfeature
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
	

	public function countProperty()
	{
		$obj1 = new MyModel();
		$result = $obj1->CountProperty();
		return $result;
	
	}
	public function houseCount()
	{
		$obj1 = new MyModel();
		$result = $obj1->HouseCount();
		return $result;
	}
	public function bestProperty()
	{
		$obj1 = new MyModel();
		$result = $obj1->BestProperty();

		return $result;
	}
}
?>
