<?php
/*****************************************
 * 共通機能クラス
 ****************************************/
class ViewFunc {
	public $datas = array(
	);
	public $inc_files = array(
		'before' => array(
			'fileHeader' => '/common/header.tpl',
			'bodyHeader' => '/common/body_header.tpl'
		),
		'after' => array(
			'bodyFooter' => '/common/body_footer.tpl',
			'fileFooter' => '/common/footer.tpl'
		)
	);

	public $staticFilePublishSignature = 'shakaTest';
	public $publishdFileDir = 'pub';
	public $jsFiles = array(
	);
	public $cssFiles = array(
	);

// DBのカラム名を変換するための配列
	public $convert_col_name = array(
	  'id' => '会員ID',
	  'name' => '会員氏名',
	  'updated_date' => '更新日',
	  'address' => '住所',
	  'tel' => '電話番号',
	  'sex' => '性別',
	  'nickname' => 'ニックネーム',
	  'work' => '仕事',
	  'hobby' => '趣味'
	);


	function __construct(){
	}

	function js($file_name){
		$this->jsFiles[] = $file_name;
	}

	function css($file_name){
		$this->cssFiles[] = $file_name;
	}

	public function show(){
		$test = '_title';
		foreach($this->datas as $key => $value) {
			${$key} = $value;
		}
		$trace = debug_backtrace();
		$access_file_path = str_replace(DOC_ROOT_DIR,'',$trace[0]['file']);
		$view_file_name = str_replace('.php', '.tpl', $access_file_path);
		$jsFiles = array('/js' . str_replace('.php', '.js', $access_file_path));
		$cssFiles = array('/css' . str_replace('.php', '.css', $access_file_path));
		$jsFiles = $this->publishStaticFiles($jsFiles, 'js');
		$cssFiles = $this->publishStaticFiles($cssFiles, 'css');
		$viewFunc = $this;
		foreach ($this->inc_files['before'] as $file_path) {
			include_once(VIEW_DIR . $file_path);
		}

		include_once(VIEW_DIR . $view_file_name);
		foreach ($this->inc_files['after'] as $file_path) {
			include_once(VIEW_DIR . $file_path);
		}
		exit;
	}

	function set($key, $value){
		$this->datas[$key] = $value;
	}

	public function publishStaticFiles($files, $kind = ''){
		return $files;
		// 常に静的ファイルをリフレッシュする場合
		$allWaysPublishStatic = ShakaConf::getViewSetting('allWaysPublishStatic');
		if (!$allWaysPublishStatic || !$kind || false) {
			return $files;
		}
		$publishdFileDir = WEB_ROOT_DIR . DS . $kind . DS . $this->publishdFileDir;
		$signature = $this->getOneTimesignature();
		if (file_exists($publishdFileDir) && is_array($files)){
			CommonFunc::rmdirR($publishdFileDir);
			mkdir($publishdFileDir, 0777);
			chmod($publishdFileDir, 0777);
		}
		if (is_array($files)){
			foreach ($files as $key => $file){
				$files[$key] = $this->filePublish($file, $kind, $signature);
			}
		} else {
			$files = $this->filePublish($files, $kind, $signature);
		}
		return $files;
	}

	public function filePublish($file, $kind, $signature){
		$paths = explode(DS, $file); // ファイルパス(ドキュメントルートから)取得
		if ($paths[0] != '' ) { // 相対パスは処理スルー
			continue;
		}
		$file_names = explode('.', array_pop($paths)); // ファイル名分解 && ファイル名除去
		$ext = array_pop($file_names); // 拡張子取得 && 拡張子除去
		$paths[] = implode('.', $file_names); // ファイル名を元に戻す
		$publishd_file_path = implode(DS, $paths) . '.' . $signature .  '.' . $ext; // ファイル名を元に戻して、名前を変更
		$publishd_file_path = str_replace(DS . $kind . DS, DS . $kind . DS . $this->publishdFileDir . DS , $publishd_file_path);
		var_dump($publishd_file_path);

		copy(WEB_ROOT_DIR . $file, WEB_ROOT_DIR . $publishd_file_path);
		return $publishd_file_path;
	}

	function getOneTimesignature(){
		return sha1($this->staticFilePublishSignature . microtime());
	}

	function createLink($msg, $link, $param = array()) {
		$stmt = $link;
		foreach($param as $key => $value) {
			$stmt .=	'?' . $key . '=' . $value . '&';
		}
		// param がある場合は最後の & が余計なので消す
		if ($param !== array()) {
			$stmt = substr($stmt, 0, -1);
		}

		return $stmt;
	}

	function createLinkText($msg, $link, $param = array()) {
		$stmt = $this->createLink($msg, $link, $param);
		return '<a href="'. $stmt . '">' . $msg . '</a>';
	}

	function createLinkButton($msg, $link, $param = array()) {
		$stmt = $this->createLink($msg, $link, $param);
		return '<input type="button" onclick="location.href="' . $stmt . '" value="' . $msg . '">';
	}

}
