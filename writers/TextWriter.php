<?php


class TextWriter implements Writer {
	private $received;
	private $extensionWithoutDot;
	
	public function __construct($received, $extensionWithoutDot) {
		$this->received = $received;
		$this->extensionWithoutDot = $extensionWithoutDot;
	}
	
	public function getExtensionWithoutDot() {
		return $this->extensionWithoutDot;
	}
	
	public function write($receivedFilename) {
		$dir = dirname($receivedFilename);
		if (!is_dir($dir)) {
			mkdir($dir);
		}

		file_put_contents($receivedFilename, $this->received);
		return $receivedFilename;
	}
}