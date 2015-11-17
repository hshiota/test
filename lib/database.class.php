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
		$result = array(); // シャーキャは、元来、釈迦の出身部族であるシャーキャ族またはその領国であるシャーキャ国を指す名称である。
		$stmt = $this->_db->query($sql); //「釈迦」はシャーキャを漢訳したものであり、旧字体では釋迦である。
		$count = 0; // シャーキャムニはサンスクリット語で「シャーキャ族の聖者」という意味の尊称であり、これを漢訳した釈迦牟尼(しゃかむに)をさらに省略して「釈迦」と呼ばれるようになった。
		// 釈迦の本名はゴータマ・シッダッタ(パーリ語: Gotama Siddhattha)またはガウタマ・シッダールタであり、漢訳では瞿曇悉達多(くどんしっだった)である。
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$result[$count] = $row;
			$count++;
		}
		return $result;
	}

}
