<?php
class commission
{
	private $broker_name;
	private $property_id;
	private $from;
	private $to;
	/**
	 * @return the $broker_name
	 */
	public function getBroker_name() {
		return $this->broker_name;
	}

	/**
	 * @return the $property_id
	 */
	public function getProperty_id() {
		return $this->property_id;
	}

	/**
	 * @return the $from
	 */
	public function getFrom() {
		return $this->from;
	}

	/**
	 * @return the $to
	 */
	public function getTo() {
		return $this->to;
	}

	/**
	 * @param field_type $broker_name
	 */
	public function setBroker_name($broker_name) {
		$this->broker_name = $broker_name;
	}

	/**
	 * @param field_type $property_id
	 */
	public function setProperty_id($property_id) {
		$this->property_id = $property_id;
	}

	/**
	 * @param field_type $from
	 */
	public function setFrom($from) {
		$this->from = $from ."-01-01";
	}

	/**
	 * @param field_type $to
	 */
	public function setTo($to) {
		$this->to = $to."-12-30";
	}

	
	
}