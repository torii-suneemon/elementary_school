<?php
session_start();
$err = $_SESSION;


?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>新規登録画面</title>
</head>
  <body>
    <h1>新規登録</h1>
    <div class="input-form">
        <form action="register.php" method="post">
          <label for="username">ユーザー名:</label>
          <input type="text" name="username" value="<?= $_SESSION['signup_data']['username'] ?? '' ?>">
          <?php if(isset($err['username'])) : ?>
            <p class="error"><?= $err['username']; ?></p>
          <?php endif; ?>


          <label for="email">メールアドレス:</label>
          <input type="email" name="email" value="<?= $_SESSION['signup_data']['email'] ?? '' ?>">
          <?php if(isset($err['email'])) : ?>
            <p class="error"><?= $err['email']; ?></p>
          <?php endif; ?>


          <label for="password">パスワード:</label>
          <input type="password" name="password" value="<?= $_SESSION['signup_data']['password'] ?? '' ?>">
          <?php if(isset($err['password'])) : ?>
            <p class="error"><?= $err['password']; ?></p>
          <?php endif; ?>


          <div><input type="submit" value="新規登録"></div>
        </form>
    </div>
  </body>
</html>

<?php
  $_SESSION = [];
  session_destroy();
?>

