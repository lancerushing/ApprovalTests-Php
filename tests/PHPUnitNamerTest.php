<?php
require_once 'PHPUnit/Framework/TestCase.php';
require_once dirname(__DIR__) . '/namers/PHPUnitNamer.php';

class PHPUnitNamerTest extends PHPUnit_Framework_TestCase {
	public function testTheClassParts() {
		$namer = new PHPUnitNamer();
		$this->assertEquals('PHPUnitNamerTest', $namer->getCallingTestClassName());
		$this->assertEquals('testTheClassParts', $namer->getCallingTestMethodName());
		$this->assertEquals(dirname(__FILE__), $namer->getCallingTestDirectory());
	}
	
	public function testIsPHPUnitTest() {
		$this->assertFalse(self::isPHPUnitTest('/Users/username/Documents/workspace/intranet_lib/qa/tests/CAshfordCryptoTest.php'));
		$this->assertFalse(self::isPHPUnitTest('/usr/local/test'));
		$this->assertFalse(self::isPHPUnitTest('/usr/local/PEAR/BPEPHPUnit/Framework/TestCase.php'));
		$this->assertTrue(self::isPHPUnitTest('/usr/local/PEAR/PHPUnit/Framework/TestCase.php'));
	}	
	
	public static function isPHPUnitTest($path) {
		$localized = str_replace('/', DIRECTORY_SEPARATOR, $path);
		return PHPUnitNamer::isPHPUnitTest($localized);
	}
}
