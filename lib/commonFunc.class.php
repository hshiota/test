<?php
/*****************************************
 * 共通機能クラス
 ****************************************/
class CommonFunc {
	public $datas = array(
	);
	function __construct(){
	}

	/**
	 * 再帰的にディレクトリを削除する。
	 * @param string $dir ディレクトリ名（フルパス）
	 */
	static function rmdirR($dir) {
		$cnt = 0;
		$handle = opendir($dir);
		if (!$handle) {
			return ;
		}

		while (false !== ($item = readdir($handle))) {
			if ($item === "." || $item === "..") {
				continue;
			}

			$path = $dir . DIRECTORY_SEPARATOR . $item;

			if (is_dir($path)) {
				// 再帰的に削除
				$cnt = $cnt + removeDir($path);
			}
			else {
				// ファイルを削除
				unlink($path);
			}
		}
		closedir($handle);

		// ディレクトリを削除
		if (!rmdir($dir)) {
			return ;
		}
	}
}
