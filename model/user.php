<?php

$dsn = 'mysql:dbname=zpj4u_u6354678;host=localhost;charset=utf8';
$user = 'zpj4u_torii_suneemon';
$password = '7njSs_G-zfVk&_H';

try{
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
echo '接続できませんでした。:'. $e->getMessage();
}

