<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta http-equiv="name" content="content">
	<meta charset="utf-8" lang="ja">
	<link rel="icon" href="/favicon.ico">
	<title><?php echo $_title; ?></title>
	<link href="<?php echo $viewFunc->publishStaticFiles('/css/normalize.css', 'css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo $viewFunc->publishStaticFiles('/css/common.css', 'css'); ?>" rel="stylesheet" type="text/css" />
	<?php
		if (isset($cssFiles)) {
			foreach ($cssFiles as $key => $value) {
				echo '<link href="' . $value . '" rel="stylesheet" type="text/css" />';
			}
		}
	?>
	<script src="<?php echo $viewFunc->publishStaticFiles('/js/jquery.js', 'js'); ?>" type="text/javascript"></script>
	<?php
		if (isset($jsFiles)) {
			foreach ($jsFiles as $key => $value) {
				echo '<script src="' . $value . '" type="text/javascript"></script>';
			}
		}
	?>
</head>
<body class="top <?php if (isset($body_class)){ echo $body_class; }  ; ?>">
	<div class="bodyWrapper">
