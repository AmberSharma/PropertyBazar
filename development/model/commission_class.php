<?php
require_once "constant.php"; 
require_once SITEPATH.'model/model.php';

class Commission
{
	private $broker_name;
	private $property_id;
	private $from;
	private $to;
	private $broker_id;
	private $b_amt;
	private $s_amt;
	private $buyer_id;

	
	public function getBroker_name() {
		return $this->broker_name;
	}
	public function getProperty_id() {
		return $this->property_id;
	}
	public function getFrom() {
		return $this->from;
	}
	public function getBroker_id() {
		return $this->broker_id;
	}
	public function getBuyer_id() {
		return $this->buyer_id;
	}
	public function getB_amt() {
		return $this->b_amt;
	}
	public function getS_amt() {
		return $this->s_amt;
	}
	public function setBroker_id($broker_id) {
		$this->broker_id = $broker_id;
	}
	public function setBuyer_id($buyer_id) {
		$this->buyer_id = $buyer_id;
	}
	public function setB_amt($b_amt) {
		$this->b_amt = $b_amt;
	}
public function setS_amt($s_amt) {
		$this->s_amt = $s_amt;
	}
	
	public function getTo() {
		return $this->to;
	}
	public function setBroker_name($broker_name) {
		$this->broker_name = $broker_name;
	}
	public function setProperty_id($property_id) {
		$this->property_id = $property_id;
	}
	public function setFrom($from) {
		$this->from = $from ."-01-01";
	}
	public function setTo($to) {
		$this->to = $to."-12-30";
	}
	public function brokerName()
	{
		$obj=new MyModel();
		$result=$obj->findBroker();
		return $result;
	}
	public function brokerPropertyid()
	{
		$obj=new MyModel();
		$result=$obj->findPropert();
		return $result;
	}
	public function finalProperty($val)
	{
		$obj=new MyModel();
		$result=$obj->FinalProperty($val);
		return $result;
	}

	
	
}