<?PHP

require_once "constant.php"; 
require_once SITEPATH.'model/model.php';
class Question1
{
	
	
	private $ques;
	private $id;
	
	
	public function setQues($ques) {
		$this->ques = $ques;
	}

	public function setId($id) {
		$this->id = $id;
	}
	public function getId() {
		return $this->id;
	}

	public function getQues() {
		return $this->ques;
	}
	
	
	

	public function send($value)
	{
		$obj1 = new MyModel();
		$result = $obj1->SendQuestion($value);
		return $result;
	
	}

	public function view($value)
	{
		$obj1 = new MyModel();
		$result = $obj1->ViewQuestion($value);
		return $result;
	}
	public function viewcount()
	{
		$obj1 = new MyModel();
		$result = $obj1->ViewCount();
		return $result;
	}
	public function Faqcount()
	{
		$obj1 = new MyModel();
		$result = $obj1->FaqCount();
		return $result;
	}
}
?>
