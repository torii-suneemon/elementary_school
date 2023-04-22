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
                         echo "<a href='logout.php' class='col-md-2 btn btn-signup'>ログアウト</a>"; 
                    }else{
                    echo "<a href='signup.php' class='col-md-2 btn btn-signup' name='signup'>
                        新規登録
                    </a>";
                    } ?>
                </li>
                <li>
                    <?php  if(isset($_SESSION['data']) == true) {
                         echo "<div class='col-md-2 login btn-signup'> <span class='login_span'>ログイン中：</span><br>{$_SESSION['data']['username']}</div>"; 
                    }else{
                    echo "<a href='login_form.php' class='col-md-2 btn btn-login' name='login'>
                        ログイン
                    </a>";
                    } ?>
                </li>
                <li><a href="index.php" class="col-md-2.5 btn lnav">四角市立丸々小学校</a></li>
                <li><a href="introduction.php" class="col-md-1.5 btn lnav">学校紹介</a></li>
                <li><a href="" class="col-md-1.5 btn lnav">学校行事</a></li>
                <li><a href="" class="col-md-1.5 btn lnav">学校だより</a></li>
                <?php if(isset($_SESSION['data']) == true) : ?>
                    <div class="dropdown">
                        <button class="col-md-1.5 col-auto btn btn-secondary dropdown-toggle lnav" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            児童登録
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a href='questionnaire_form.php' class= 'btn lnav'>新規児童登録</a></li>
                            <li><a href='questionnaire_form.php' class='btn lnav'>登録内容確認</a></li>
                        </ul>
                    </div>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
    <div class="image-wrap">
        <img class="image" src="images/hall.jpg" alt="丸々小学校">
        <!-- <div class="school-name">四角市立<br>丸々小学校</div> -->
    </div>
</div>

<section class="bg-gray">
        <div class="warp">
            <div class="flex-box">
                <div class="flex-left">
                    <h2 class="title"><span>学</span>び舎の歴史</h2>
                    <p>
                        創立１５０周年<br>今年で創立１５０周年を迎える学び舎は数多くの著名人を輩出しました。<br>
                        
                    </p>
                </div>
                <div class="flex-right">
                    <h2 class="title"><span>校</span>歌の紹介</h2>
                    <ul class="list-style">
                        <li><p class="school_song">丸々小学校校歌</p><br>
                        <p class="school_song">
                            <span>1.</span>風薫る 緑の丘に 新しい 命育む 丸々小<br>
                              みんな みんな 明るく強く 進もうよ 広く 豊かな 人の道
                        </p>
                        <p class="school_song">
                            <br><span>2.</span>温かな 恵み溢れて 新しく 伸び行く力 丸々小<br>
                            みんな みんな 清く豊かに 進もうよ 高く 遥かな 学びの道
                        </p>
                        <p class="school_song">
                            <br><span>3.</span>世に誇る 歴史は古く 新しい 息吹に燃える 丸々小<br>
                            みんな みんな 励まし合って 進もうよ 遠く 未来へ 続く道
                        </p></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
