<?php
interface Reporter {
	public function reportFailure($approvedFilename, $receivedFilename);
}