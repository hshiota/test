<?php
/* しゃかコード
$link = mysql_connect('localhost', 'shaka', 'testuser');

if (!$link) {
  die(mysql_error());
}

$db_selected = mysql_select_db('gigei', $link);
if (!$db_selected) {
  die('失敗');
}

$result = mysql_query('SELECT * from users');


print <<<EOD
<table>
  <tr>
    <th>会員ID</th>
    <th>会員氏名</th>
    <th>更新日</th>
  </tr>
EOD;

while ($row = mysql_fetch_assoc($result)) {
  // 日付をフォーマット
  $date = strtotime($row['updated_date']);
  $date = date('Y/m/d', $date);

  print('<tr>');
  print('<td>'.$row['id'].'</td>');
  print('<td>');
    print('<a href="/detail.php?id='.$row['id'].'">');
    print($row['name'].'</a>');
  print('</td>');
  print('<td>'.$date.'</td>');
  print('</tr>');
}

print('</table>');
*/
// ↓ 塩田コード
$db = new Database();
$res = $db->select('select id, name, updated_date from users;');
$viewFunc->set('user_list', $res);
$viewFunc->show();
exit;
