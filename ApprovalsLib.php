<?php

class RequireHelper{
	public static function GetApprovalLib($dir, $getFolders, $getFiles, $includes = array()){

		foreach ($getFiles($dir) as $filename) {
			if ($filename != __FILE__) {
				$cnt = sizeof($includes);
				$includes[$cnt] = $filename;
			}
		}

		$subs = $getFolders($dir);
		foreach ($subs as $subDir) {
			$pos = strpos("{$subDir}", "tests");
			if ($pos === false){
				$includes = RequireHelper::GetApprovalLib($subDir, $getFolders, $getFiles, $includes);
			}
		}

		asort($includes);
		return $includes;
	}

	public static function RequireApprovals($dir = __DIR__){
		$getFolders = function ($dir1) { return glob("$dir1/*", GLOB_ONLYDIR); };
		$getFiles = function ($dir2) { return glob("$dir2/*.php"); };
		$libs = RequireHelper::GetApprovalLib($dir, $getFolders, $getFiles);
		foreach ($libs as $filename) {
			require_once($filename);
		}
	}
}

/*//*/

RequireHelper::RequireApprovals();

?>