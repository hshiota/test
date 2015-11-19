<?php
$db = new Database();
$res = $db->select('select * from users;');
$viewFunc->set('user_list', $res);
$viewFunc->show();
exit;
