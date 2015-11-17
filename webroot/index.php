<?php

$db = new Database();
$res = $db->select('select * from users;');
var_dump($res);exit;

