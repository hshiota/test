<?php
/*****************************************
 * データベース操作共通クラス
 * database.conf.phpの設定に従い、接続する
 ****************************************/
class Database {
	private $_db = null;
	function __construct($env = 'test'){
		// mysql_connect は PHP 5.5.0 で非推奨
		// $link = mysql_connect('localhost', 'shaka', 'testuser');
		$dbConf = new DatabaseConfig();
		$settingConf = $dbConf->$env;
		try {
			$this->_db = new PDO(
				'mysql:host=' . $settingConf['host'] . ';dbname=' . $settingConf['database'],
				$settingConf['login'],
				$settingConf['password']
			);
		} catch (PDOException $pe) {
			echo 'DB接続失敗！！'.$pe->getMessage();
			throw $pe;
		}
	}

	// データ取得
	function select($sql){
		$result = array();
		$stmt = $this->_db->query($sql);
		$count = 0;
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$result[$count] = $row;
			$count++;
		}
		return $result;
	}

// データ更新
	function update($stmt){
		$this->_db->query($stmt);
	}

}
