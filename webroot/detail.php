<?php
//
// ini_set('display_errors', 1);
//
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
// $query = 'SELECT * FROM users WHERE id = '.$_GET['id'];
// $result = mysql_query($query);
// $data = mysql_fetch_assoc($result);
//
// // DBのカラム名を変換するための配列
// $col_arr = array(
//   'id' => '会員ID',
//   'name' => '会員氏名',
//   'updated_date' => '更新日',
//   'address' => '住所',
//   'tel' => '電話番号',
//   'sex' => '性別',
//   'nickname' => 'ニックネーム',
//   'work' => '仕事',
//   'hobby' => '趣味'
// );
//
// print('<table>');
//
// foreach ($data as $key => $value) {
//   // 日付のフォーマット
//   if ($key == 'updated_date') {
//     $value = date('Y/m/d', strtotime($value));
//   }
//
//   $str = '<tr><th>'.$col_arr[$key].'</th><td>'.$value.'</td></tr>';
//   print($str);
// }
// print('</table>');
//
// print <<<EOD
// <br>
// <a href="/edit.php?id={$data['id']}">編集</a>
// <br>
// <a href="index.php">一覧に戻る</a>
// EOD;
//

$db = new Database();
$res = $db->select('select * from users where id =' . $_GET['id'] . ';');
$viewFunc->set('user_detail', $res);
$viewFunc->show();
