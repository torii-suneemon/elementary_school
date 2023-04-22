<?php

session_start();

require_once 'model/user.php';


if($_SERVER['REQUEST_METHOD'] === 'POST'){

  $username = '';
  $email = '';
  $password = '';
  $err = [];

  if(isset($_POST['username']) && $_POST['username'] !== ''){
    $username = htmlspecialchars($_POST['username'],ENT_QUOTES,'UTF-8');
  }else{
    $err['username'] = 'ユーザー名を入力してください。<br>';
  }

  if(isset($_POST['email']) && $_POST['email'] !== ''){
      $email = htmlspecialchars($_POST['email'],ENT_QUOTES,'UTF-8');
    }else{
      $err['email'] =  'メールアドレスを入力してください。<br>';
  }

  if(isset($_POST['password']) && $_POST['password'] !== ''){

    if(mb_strlen($_POST['password']) >= 8){
      $password = htmlspecialchars($_POST['password'],ENT_QUOTES,'UTF-8');

    }else{
      $err['password'] = 'パスワードは８文字以上にしてください。';
    }
      
  }else{
    $err['password'] =  'パスワードを入力してください。';
  }
// 登録するpasswordをハッシュ化
  $hashPassword = password_hash($password, PASSWORD_DEFAULT);

}

if(count($err) === 0){
    $sql = ('INSERT INTO users (username, email, password) VALUES (?,?,?)');
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username,$email,$hashPassword]);
    session_destroy();
}else{
  $_SESSION = $err;
  $_SESSION['signup_data']['username'] = $_POST['username'];
  $_SESSION['signup_data']['email'] = $_POST['email'];
  $_SESSION['signup_data']['password'] = $_POST['password'];

  header('Location: signup.php');
  return;
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>登録完了画面</title>
</head>

<body>
<?php if(count($err) > 0) : ?>
        <?php foreach($err as $e) : ?>
            <p><?php echo $e ?></p>
        <?php endforeach ?>
        <?= '<a href="signup.php">戻る</a>' ?>
        <!-- errがなかった場合は完了文言を出力 -->
<?php else : ?>
    <p>ユーザー登録が完了しました</p>
    <p><a href="./index.php">TOPへ戻る</a></p>
    <?php endif ?>
</body>

</html>
