<?php
session_start();

?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
    <link rel="stylesheet" href="css/style.css">
    <title>四角市立丸々小学校</title>
</head>
<body>

    <div class="header-nav">
        <nav class="gnav navbar-expand{-sm|md|-lg|-xl|-xxl} ">
            <ul>
                <li>
                    <?php if(isset($_SESSION['data']) == true) {
                         echo "<a href='logout.php' class='col-md-2 col-auto btn btn-signup'>ログアウト</a>"; 
                    }else{
                    echo "<a href='signup.php' class='col-md-2 col-auto btn btn-signup' name='signup'>
                        新規登録
                    </a>";
                    } ?>
                </li>
                <li>
                    <?php  if(isset($_SESSION['data']) == true) {
                         echo "<div class='col-md-2 col-auto login btn-signup'> <span class='login_span'>ログイン中：</span><br>{$_SESSION['data']['username']}</div>"; 
                    }else{
                    echo "<a href='login_form.php' class='col-md-2 col-auto btn btn-login' name='login'>
                        ログイン
                    </a>";
                    } ?>
                </li>
                <li><a href="index.php" class="col-md-2.5 col-auto btn lnav">四角市立丸々小学校</a></li>
                <li><a href="introduction.php" class="col-md-1.5 col-auto btn lnav">学校紹介</a></li>
                <li><a href="" class="col-md-1.5 col-auto btn lnav">学校行事</a></li>
                <li><a href="" class="col-md-1.5 col-auto btn lnav">学校だより</a></li>
                <?php if(isset($_SESSION['data']) == true) : ?>
                    <div class="dropdown">
                        <button class="col-md-1.5 col-auto btn btn-secondary dropdown-toggle lnav" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            児童登録
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a href='questionnaire_form.php' class= 'btn lnav'>新規児童登録</a></li>
                            <li><a href='questionnaire_view.php' class='btn lnav'>登録内容確認</a></li>
                        </ul>
                    </div>
                <?php endif; ?>
                
            </ul>
        </nav>
    </div>
    <div class="image-wrap">
        <img class="image" src="images/school.jpg" alt="丸々小学校">
        <div class="school-name">四角市立<br>丸々小学校</div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
