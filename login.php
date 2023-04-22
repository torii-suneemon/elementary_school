<?php

session_start();

require_once 'model/user.php';


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $email = '';
    $password = '';
    $err = [];

    if(isset($_POST['email']) && $_POST['email'] !== ''){
        $email = htmlspecialchars($_POST['email'],ENT_QUOTES,'UTF-8');
    }else{
        $err['email'] = 'メールアドレスを入力してください。';
    }

    if(isset($_POST['password']) && $_POST['password'] !== ''){
        if(mb_strlen($_POST['password']) >= 8){
            $password = htmlspecialchars($_POST['password'],ENT_QUOTES,'UTF-8');
        }else{
            $err['password'] = '正しいパスワードを入力してください。';
    }
}else{
    $err['password'] = 'パスワードを入力してください。';
}

}

if(count($err) === 0){
    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?');
    // bindValue(1つ目のプレースホルダに, $emailを, 文字列型のデータ);
    $stmt->bindValue(1, $email, PDO::PARAM_STR);
	$stmt->execute();
    // PDO::FETCH_ASSOC(データベースから該当した条件のデータを1件だけ取る)
	$res = $stmt->fetch(PDO::FETCH_ASSOC);

	if($res && password_verify($password, $res['password'])){
        $_SESSION['data'] = [
            'id' => $res['id'],
            'username' => $res['username'],
            'email' => $res['email'],
            'password' => $res['password']
        ];
    }else{
        $_SESSION = $err;
        $_SESSION['login_data']['email'] = $_POST['email'];
        $_SESSION['login_data']['password'] = $_POST['password'];

        header('Location: login_form.php');
        return;
    }
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>ログイン完了画面</title>
</head>
<body>
    

<?php if(count($err) > 0) : ?>
        <?php foreach($err as $e) : ?>
            <p><?php echo $e ?></p>
        <?php endforeach ?>
        <?= '<a href="login_form.php">戻る</a>' ?>
        <!-- errがなかった場合は完了文言を出力 -->
<?php else : ?>
    <p>ログインしました。</p>
    <p><a href="./index.php">TOPへ戻る</a></p>
    <?php endif ?>

</body>

</html>
