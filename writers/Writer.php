<?php
interface Writer {
	public function getExtensionWithoutDot();
	
	public function write($receivedFilename);
}
?>