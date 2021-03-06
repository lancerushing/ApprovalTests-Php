<?php

class PHPUnitNamer {
	private $caller;
	private $testDirectory;
	
	public function __construct() {
		$stackTraceLines = debug_backtrace(false);
		$this->caller = null;
		$this->testDirectory = null;
		foreach($stackTraceLines as $stackTraceLine) {
			if (array_key_exists('file', $stackTraceLine)) {
				if (self::isPHPUnitTest($stackTraceLine['file'])) {
					break;
				}
				$this->testDirectory = dirname($stackTraceLine['file']);
			}
			$this->caller = $stackTraceLine;
		}
	}
	
	public static function isPHPUnitTest($path) {

		$expectedPath = DIRECTORY_SEPARATOR . 'Framework' . DIRECTORY_SEPARATOR . 'TestCase.php';
		$pathPart = substr($path, -strlen($expectedPath));
		return $pathPart === $expectedPath;
	}
	
	public function getApprovedFile($extensionWithoutDot) {
		return $this->getFile('approved', $extensionWithoutDot);
	}
	
	public function getReceivedFile($extensionWithoutDot) {
		return $this->getFile('received', $extensionWithoutDot);
	}

	private function getFile($status, $extensionWithoutDot) {
		return $this->getCallingTestDirectory() . DIRECTORY_SEPARATOR . 'approvals' . DIRECTORY_SEPARATOR . $this->getCallingTestClassName() . '.' . $this->getCallingTestMethodName() . '.' . $status . '.' . $extensionWithoutDot; 
	}
	
	public function getCallingTestClassName() {
		$class = $this->caller['class'];
		if (stristr($class, '\\')) {
			list(,$class) = explode('\\', $class);
		}
		return $class;
	}
	
	public function getCallingTestMethodName() {
		return $this->caller['function'];
	}
	
	public function getCallingTestDirectory() {
		return $this->testDirectory;
	}
}