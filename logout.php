<?php
session_start();
$_SESSION[] = '';
session_destroy();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>ログアウト画面</title>
</head>
<body>
    <p>ログアウトしました</p>
    <a href="./index.php">戻る</a>
</body>

</html>