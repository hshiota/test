<?php
$link = mysql_connect('localhost', 'shaka', 'testuser');

if (!$link) {
  die(mysql_error());
}

$db_selected = mysql_select_db('gigei', $link);
if (!$db_selected) {
  die('失敗');
}

//更新処理するぜ
$query = 'UPDATE users set ';
foreach ($_POST as $key => $value) {
  $query .= $key.'="'.$value.'", ';
} //最後の, が邪魔

$query .= 'where id='.$_GET['id'];

// echo $query;
// echo "<br>";

$result = mysql_query($query);

if(!$result) {
  echo mysql_error();
  exit;
}

// 詳細画面にリダイレクト
http_redirect("/detail.php", array("id" => $_GET['id']));
