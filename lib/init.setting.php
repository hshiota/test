<?php
// エラー出力する場合
ini_set( 'display_errors', 1 );

define('BASE_DIR', '/vagrant');
define('DOC_ROOT_DIR', '/var/www/html');
include_once BASE_DIR . '/' . 'conf' . '/' . 'database.conf.php';
include_once BASE_DIR . '/' . 'lib' . '/' . 'database.class.php';
