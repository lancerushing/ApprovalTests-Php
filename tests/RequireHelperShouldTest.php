<?php
class RequireHelperShouldTest extends PHPUnit_Framework_TestCase{
	public static $baseDir = 'C:\\base';
	public static function GetTestDataFiles(){
		$name = RequireHelperShouldTest::$baseDir;
		return array(
			"{$name}" => array("{$name}\\base01.php"),
			"{$name}\\SomeDrive"         => array(
					"{$name}\\SomeDrive\\sd01.php", 
					"{$name}\\SomeDrive\\sd02.php"
				), 
			"{$name}\\SomeDrive\\Apples" => array(
					"{$name}\\SomeDrive\\Apples\\a01.php", 
					"{$name}\\SomeDrive\\Apples\\a02.php", 
					"{$name}\\SomeDrive\\Apples\\a03.php"
				),
			"{$name}\\SomeDrive\\tests"  => array(
					"{$name}\\SomeDrive\\tests\\t01.php", 
					"{$name}\\SomeDrive\\tests\\t02.php"
				),
			"{$name}\\SomeDrive\\Zed"    => array("{$name}\\SomeDrive\\Zed\\z01.php")
		);
	}

	public static function GetTestDataFolders(){
		$name = RequireHelperShouldTest::$baseDir;
		return array(
			"{$name}"                    => array("{$name}\\SomeDrive"),
			"{$name}\\SomeDrive"         => array(
						"{$name}\\SomeDrive\\Apples",
						"{$name}\\SomeDrive\\tests" ,
						"{$name}\\SomeDrive\\Zed"),
			"{$name}\\SomeDrive\\Apples" => array(),
			"{$name}\\SomeDrive\\tests"  => array(),
			"{$name}\\SomeDrive\\Zed"    => array()
		);
	}

	public static function GetTestFlatFileNames(){
		$name = RequireHelperShouldTest::$baseDir;
		return [
"{$name}\\base01.php",
"{$name}\\SomeDrive\\sd01.php",
"{$name}\\SomeDrive\\sd02.php",
"{$name}\\SomeDrive\\Apples\\a01.php",
"{$name}\\SomeDrive\\Apples\\a02.php",
"{$name}\\SomeDrive\\Apples\\a03.php",
"{$name}\\SomeDrive\\Zed\\z01.php"];
	}

	public function testGetApprovalLib(){
		$dataFolders = RequireHelperShouldTest::GetTestDataFolders();
		$dataFiles = RequireHelperShouldTest::GetTestDataFiles();

		$getFolders = function ($dir) use ($dataFolders) { return $dataFolders[$dir]; };
		$getFiles = function ($dir) use ($dataFiles) { return $dataFiles[$dir]; };

		$expectedArr = RequireHelperShouldTest::GetTestFlatFileNames();
		$actualArr = RequireHelper::GetApprovalLib(RequireHelperShouldTest::$baseDir, $getFolders, $getFiles);

		$this -> assertEquals($expectedArr,$actualArr);
	}
}
?>