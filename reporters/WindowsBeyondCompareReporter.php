<?php
 
class WindowsBeyondCompareReporter implements Reporter {
	public function reportFailure($approvedFilename, $receivedFilename) {
		FileUtil::createFileIfNotExists($approvedFilename);
		system("\"C:/Program Files (x86)/Beyond Compare 3/BCompare.exe\" \"$receivedFilename\" \"$approvedFilename\"");
	}
}
?>