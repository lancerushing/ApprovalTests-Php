<?php
class FileUtil {
	public static function createFileIfNotExists($filename) {
		if (!file_exists($filename)) {
			touch($filename);
		}
	}
}