<?php

class MeldDiffReporter implements Reporter {

    public function reportFailure($approvedFilename, $receivedFilename) {
        FileUtil::createFileIfNotExists($approvedFilename);
        system(escapeshellcmd('meld') . ' ' . escapeshellarg($receivedFilename) . " " . escapeshellarg($approvedFilename));
    }

}
