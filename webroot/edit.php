<?php
$link = mysql_connect('localhost', 'shaka', 'testuser');

if (!$link) {
  die(mysql_error());
}

$db_selected = mysql_select_db('gigei', $link);
if (!$db_selected) {
  die('失敗');
}

$query = 'SELECT * FROM users WHERE id = '.$_GET['id'];
$result = mysql_query($query);
$data = mysql_fetch_assoc($result);

// DBのカラム名を変換するための配列
$col_arr = array(
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

// idだけテキストで表示
print <<<EOD
<form action="/update.php?id={$data['id']}" method=post>
<table>
<tr><th>{$col_arr['id']}</th><td>{$data['id']}</td>
EOD;

foreach ($data as $key => $value) {
  // idや更新日を自由に変更できてはまずいのでinputから除外
  if ($key == 'id') {
    continue;
  }
  if ($key == 'updated_date') {
    continue;
  }

  $str = '<tr><th>'.$col_arr[$key].'</th>';
  $str .= '<td><input type="text" name='.$key.' value='.$value.'></td>';
  $str .='</tr>';
  print($str);
}

print <<<EOD
</table>
<br>
<input type="submit" value="更新" />
<input type="reset" value="編集しなおす">
</form>

EOD;
