<?php
session_start();

require_once 'model/user.php';

$query = 'SELECT *
FROM questionnaire
LEFT JOIN users
ON questionnaire.email = users.email
WHERE users.email = :email';
$stmt = $pdo->prepare($query);
$stmt->bindValue(':email',$_SESSION['data']['email'],PDO::PARAM_STR);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>登録内容確認</title>
</head>
<body>

<?php
foreach($result as $loop){
    echo "児童名：".$loop["child_name"]."<br>";
    echo "性別：".$loop["sex"]."<br>";
    echo "年齢：".$loop["age"]."<br>";
    echo "生年月日：".$loop["birthday"]."<br>";
    echo "住所：".$loop["address"]."<br>";
    echo "保護者名：".$loop["parent_name"]."<br>";
    echo "電話番号：".$loop["tel"]."<br>";
    echo "メールアドレス：".$loop["email"]."<br>";
    echo "保育歴：".$loop["childcare_history"]."<br>";
    echo "入学前の病歴：".$loop["medical_history"]."<br>";
    echo "<br>【担任に知ってほしいこと】<br>";
    echo "身体面について：".$loop["physical"]."<br>";
    echo "性格面について：".$loop["personality"]."<br>";
    echo "その他：".$loop["other"]."<br>";
    echo "<br>【親子の対話の時間を持っていますか？】<br>";
    echo $loop["dialogue_frequency"]."<br>";
    echo "<br>【家庭での学習はどのようにしていますか？】<br>";
    echo $loop["home_study"]."<br>";
    echo "<br>【お子様への家庭教育の方針について。】<br>";
    echo $loop["educational_policy"]."<br>";

}

// print_r($_SESSION['login_data']['email']);
?>

<div><a href="index.php">TOPへ戻る</a></div>
</body>
</html>