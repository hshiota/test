<?php
// $link = mysql_connect('localhost', 'shaka', 'testuser');
//
// if (!$link) {
//   die(mysql_error());
// }
//
// $db_selected = mysql_select_db('gigei', $link);
// if (!$db_selected) {
//   die('失敗');
// }
//
// //更新処理するぜ
// $query = 'UPDATE users set ';
// foreach ($_POST as $key => $value) {
//   $query .= $key.'="'.$value.'", ';
// } //最後の, が邪魔
//
// $query .= 'where id='.$_GET['id'];
//
// // echo $query;
// // echo "<br>";
//
// $result = mysql_query($query);
//
// if(!$result) {
//   echo mysql_error();
//   exit;
// }
//
// // 詳細画面にリダイレクト
// http_redirect("/detail.php", array("id" => $_GET['id']));


if (empty($_POST)) {
  header('location: index.php');
}

$stmt = 'UPDATE users set ';
foreach ($_POST as $key => $value) {
  if ($key == 'id') {
    continue;
  }
  $stmt .= $key.'="'.$value.'", ';
}
$stmt = substr($stmt, 0, -2); //最後のコンマを消す
$stmt .= ' where id='.$_POST['id'];

// 更新処理
$db = new Database();
$db->update($stmt);

header("location: detail.php?id=" . $_POST['id']);
