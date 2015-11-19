<?php
/*****************************************
 * 共通設定機能クラス
 ****************************************/
class ShakaConf {

	const _SESSION_SIGNATURE__COMMON = 'shaka';
	const _SESSION_SIGNATURE__CONFIG = 'Conf';

	public static function setViewSetting($key, $value){
		ShakaConf::set('viewSetting', array($key => $value));
	}

	public static function getViewSetting($key){
		$res = ShakaConf::get('viewSetting');
		return $res[$key];
	}

	public static function set($key, $value){
		$_SESSION[ShakaConf::_SESSION_SIGNATURE__COMMON . ShakaConf::_SESSION_SIGNATURE__CONFIG . $key] = $value;
	}

	public static function get($key){
		return $_SESSION[ShakaConf::_SESSION_SIGNATURE__COMMON . ShakaConf::_SESSION_SIGNATURE__CONFIG . $key];
	}

}
