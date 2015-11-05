
<?php

$link = mysql_connect('localhost', 'shaka', 'testuser');

if (!$link) {
  print(mysql_error());
} else {
print("接続成功！");
}
