<?php
require_once 'PHPUnit/Framework/TestCase.php';
require_once dirname(__DIR__) . '/Approvals.php';
require_once dirname(__DIR__) . '/reporters/OpenDiffReporter.php';

class ApprovalTest extends PHPUnit_Framework_TestCase {
	public function testApproveArray() {
		Approvals::useReporter(new OpenDiffReporter());
		$list = array('zero', 'one', 'two', 'three', 'four', 'five');
		Approvals::approveList($list);
	}

	public function testApproveMap() {
		Approvals::useReporter(new OpenDiffReporter());
		$list = array(
			'zero' => 'Lance',
			'one' => 'Jim',
			'two' => 'James',
			'three' => 'LLewellyn',
			'four' => 'Asaph',
			'five' => 'Dana'
		);
		Approvals::approveList($list);
	}
}
?>
