<?php
session_start();
define('BASE_DIR', '/vagrant');
define('DOC_ROOT_DIR', '/var/www/html');
define('VIEW_DIR', '/vagrant/view');
define('WEB_ROOT_DIR', '/vagrant/webroot');
define('DS', DIRECTORY_SEPARATOR);

// 共通設定機能読み込み
include_once BASE_DIR . '/' . 'lib' . '/' . 'shakaConf.class.php';
// 共通設定読み込み
include_once BASE_DIR . '/' . 'conf' . '/' . 'setting.conf.php';
// エラー出力する場合
if (ENV_MODE == 'test') { 
	ini_set( 'display_errors', 1 );
}
// DB設定読み込み
include_once BASE_DIR . '/' . 'conf' . '/' . 'database.conf.php';
// DBモジュール読み込み
include_once BASE_DIR . '/' . 'lib' . '/' . 'database.class.php';
// 共通機能読み込み
include_once BASE_DIR . '/' . 'lib' . '/' . 'commonFunc.class.php';
// 共通表示機能読み込み
include_once BASE_DIR . '/' . 'lib' . '/' . 'viewFunc.class.php';

$commonFunc = new CommonFunc();
$viewFunc = new ViewFunc();
$viewFunc->set('_title', 'shakashaka site!!');
