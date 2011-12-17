<?php

require_once 'Reporter.php';

class NoReporter implements Reporter {

    public function reportFailure($approvedFilename, $receivedFilename) {
        
    }

}
