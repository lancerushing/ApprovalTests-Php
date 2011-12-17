<?php
require_once 'Reporter.php';
require_once 'FileUtil.php';

class OpenDiffReporter implements Reporter {
	public function reportFailure($approvedFilename, $receivedFilename) {
		FileUtil::createFileIfNotExists($approvedFilename);
		system(escapeshellcmd('opendiff') . ' ' . escapeshellarg($receivedFilename) . " " . escapeshellarg($approvedFilename));
	}
}
?>