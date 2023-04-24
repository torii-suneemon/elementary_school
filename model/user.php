<?php

$dsn = 'mysql:dbname=zpj4u_u6354678;host=localhost;charset=utf8';
$user = 'ユーザー名';
$password = 'パスワード';

try{
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
echo '接続できませんでした。:'. $e->getMessage();
}

