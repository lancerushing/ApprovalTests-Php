<?php
require_once 'PHPUnit/Framework/Assert.php';
require_once 'Reporter.php';

class PHPUnitReporter implements Reporter {
	public function reportFailure($approvedFilename, $receivedFilename) {
		if (!file_exists($approvedFilename)) {
			$approvedFileContents = null;
		} else {
			$approvedFileContents = file_get_contents($approvedFilename);
		}
		$receivedFileContents = file_get_contents($receivedFilename);
		PHPUnit_Framework_Assert::assertEquals($approvedFileContents, $receivedFileContents);
	}
}
