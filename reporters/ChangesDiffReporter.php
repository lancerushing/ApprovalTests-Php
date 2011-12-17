<?php

require_once 'Reporter.php';

class ChangesDiffReporter implements Reporter {

    public function reportFailure($approvedFilename, $receivedFilename) {
        FileUtil::createFileIfNotExists($approvedFilename);
        system(escapeshellcmd('chdiff') . ' ' . escapeshellarg($receivedFilename) . " " . escapeshellarg($approvedFilename));
    }

}
