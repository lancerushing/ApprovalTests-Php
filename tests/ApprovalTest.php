<?php

class ApprovalTest extends PHPUnit_Framework_TestCase {
	private function approveList($list){
		Approvals::useReporter(new OpenDiffReporter());
		Approvals::approveList($list);
	}

	public function testApproveArray() {
		$list = array('zero', 'one', 'two', 'three', 'four', 'five');
		$this -> approveList($list);
	}

	public function testApproveMap() {
		$list = array(
			'zero' => 'Lance',
			'one' => 'Jim',
			'two' => 'James',
			'three' => 'LLewellyn',
			'four' => 'Asaph',
			'five' => 'Dana'
		);
		$this -> approveList($list);
	}

	public function testAppoveMultiArray(){
		$list = array(array("Hello", "World"), array("Tom", "Joe"));
		$this -> approveList($list);
	}

	public function testApproveMultiMap(){
		$list = array(
			'zero' => 'Lance',
			'one' => 'Jim',
			'two' => 'James',
			'three' => array('primary' => 'LLewellyn', 'other' => 'Jason')
		);
		$this -> approveList($list);
	}
}
?>
