<?php
session_start();

require_once 'model/user.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $child_name = '';
    $sex = '';
    $age = '';
    $birthday = '';
    $address = '';
    $parent_name = '';
    $tel = '';
    $email = '';
    $childcare_history = '';
    $medical_history = '';
    $physical = '';
    $personality = '';
    $other = '';
    $dialogue_frequency = '';
    $home_study = '';
    $educational_policy = '';

    $err = [];

    if(isset($_POST['child_name']) && $_POST['child_name'] !== ''){
        $child_name = htmlspecialchars($_POST['child_name'],ENT_QUOTES,'UTF-8');
    }else{
        $err['child_name'] = '児童名を入力してください。<br>';
    }

    if(isset($_POST['sex']) && $_POST['sex'] !== ''){
        $sex = htmlspecialchars($_POST['sex'],ENT_QUOTES,'UTF-8');
    }else{
        $err['sex'] = '性別を選択してください。<br>';
    }

    if(isset($_POST['age']) && $_POST['age'] !== ''){
        $age = htmlspecialchars($_POST['age'],ENT_QUOTES,'UTF-8');
    }else{
        $err['age'] = '年齢を入力してください。<br>';
    }

    if(isset($_POST['birthday']) && $_POST['birthday'] !== ''){
        $birthday = htmlspecialchars($_POST['birthday'],ENT_QUOTES,'UTF-8');
    }else{
        $err['birthday'] = '生年月日を入力してください。<br>';
    }

    if(isset($_POST['address']) && $_POST['address'] !== ''){
        $address = htmlspecialchars($_POST['address'],ENT_QUOTES,'UTF-8');
    }else{
        $err['address'] = '住所を入力してください。<br>';
    }

    if(isset($_POST['parent_name']) && $_POST['parent_name'] !== ''){
        $parent_name = htmlspecialchars($_POST['parent_name'],ENT_QUOTES,'UTF-8');
    }else{
        $err['parent_name'] = '保護者名を入力してください。<br>';
    }

    if(isset($_POST['tel']) && $_POST['tel'] !== ''){
        $tel = htmlspecialchars($_POST['tel'],ENT_QUOTES,'UTF-8');
    }else{
        $err['tel'] =  '電話番号を入力してください。<br>';
    }

    if(isset($_POST['email']) && $_POST['email'] !== ''){
        $email = htmlspecialchars($_POST['email'],ENT_QUOTES,'UTF-8');
    }else{
        $err['email'] =  'メールアドレスを入力してください。<br>';
    }

    if(isset($_POST['childcare_history']) && $_POST['childcare_history'] !== ''){
        $childcare_history = htmlspecialchars($_POST['childcare_history'],ENT_QUOTES,'UTF-8');
    }else{
        $err['childcare_history'] =  '保育歴を入力してください。<br>';
    }

    if(isset($_POST['medical_history']) && $_POST['medical_history'] !== ''){
        $medical_history = htmlspecialchars($_POST['medical_history'],ENT_QUOTES,'UTF-8');
    }else{
        $err['medical_history'] =  '入学前の病歴を入力してください。<br>';
    }

    if(isset($_POST['physical']) && $_POST['physical'] !== ''){
        $physical = htmlspecialchars($_POST['physical'],ENT_QUOTES,'UTF-8');
    }else{
        $err['physical'] =  'お子様の身体面について知ってほしいことを入力してください。<br>';
    }

    if(isset($_POST['personality']) && $_POST['personality'] !== ''){
        $personality = htmlspecialchars($_POST['personality'],ENT_QUOTES,'UTF-8');
    }else{
        $err['personality'] =  'お子様の性格面について知ってほしいことを入力してください。<br>';
    }

    if(isset($_POST['other']) && $_POST['other'] !== ''){
        $other = htmlspecialchars($_POST['other'],ENT_QUOTES,'UTF-8');
    }else{
        $err['other'] =  'その他知ってほしいことを入力してください。<br>';
    }

    if(isset($_POST['dialogue_frequency']) && $_POST['dialogue_frequency'] !== ''){
        $dialogue_frequency = htmlspecialchars($_POST['dialogue_frequency'],ENT_QUOTES,'UTF-8');
    }else{
        $err['dialogue_frequency'] =  '親子の対話の時間についての項目を選択してください。<br>';
    }

    if(isset($_POST['home_study']) && $_POST['home_study'] !== ''){
        $home_study = htmlspecialchars($_POST['home_study'],ENT_QUOTES,'UTF-8');
    }else{
        $err['home_study'] =  '家庭での学習について入力してください。<br>';
    }

    if(isset($_POST['educational_policy']) && $_POST['educational_policy'] !== ''){
        $educational_policy = htmlspecialchars($_POST['educational_policy'],ENT_QUOTES,'UTF-8');
    }else{
        $err['educational_policy'] =  'お子様への家庭教育の方針について入力してください。<br>';
    }

}

if(count($err) === 0){
    $sql = ('INSERT INTO questionnaire (child_name, sex, age, birthday, address, parent_name, tel, email, childcare_history, medical_history, physical, personality, other, dialogue_frequency, home_study, educational_policy)
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$child_name, $sex, $age, $birthday, $address, $parent_name, $tel, $email, $childcare_history, $medical_history, $physical, $personality, $other, $dialogue_frequency, $home_study, $educational_policy]);

}else{
    $_SESSION = $err;
    $_SESSION['questionnaire_data']['child_name'] = $_POST['child_name'];
    $_SESSION['questionnaire_data']['sex'] = $_POST['sex'];
    $_SESSION['questionnaire_data']['age'] = $_POST['age'];
    $_SESSION['questionnaire_data']['birthday'] = $_POST['birthday'];
    $_SESSION['questionnaire_data']['address'] = $_POST['address'];
    $_SESSION['questionnaire_data']['parent_name'] = $_POST['parent_name'];
    $_SESSION['questionnaire_data']['tel'] = $_POST['tel'];
    $_SESSION['questionnaire_data']['email'] = $_POST['email'];
    $_SESSION['questionnaire_data']['childcare_history'] = $_POST['childcare_history'];
    $_SESSION['questionnaire_data']['medical_history'] = $_POST['medical_history'];
    $_SESSION['questionnaire_data']['physical'] = $_POST['physical'];
    $_SESSION['questionnaire_data']['personality'] = $_POST['personality'];
    $_SESSION['questionnaire_data']['other'] = $_POST['other'];
    $_SESSION['questionnaire_data']['dialogue_frequency'] = $_POST['dialogue_frequency'];
    $_SESSION['questionnaire_data']['home_study'] = $_POST['home_study'];
    $_SESSION['questionnaire_data']['educational_policy'] = $_POST['educational_policy'];


    header('Location: questionnaire_form.php');
    return;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>教育指導資料(家庭環境)</title>
</head>
<body>
        <?php if(count($err) > 0) : ?>
        <?php foreach($err as $e) : ?>
            <p><?php echo $e ?></p>
        <?php endforeach ?>
        <?= '<a href="questionnaire_form.php">戻る</a>' ?>
        <!-- errがなかった場合は完了文言を出力 -->
<?php else : ?>
    <p>登録しました。</p>
    <p><a href="./index.php">TOPへ戻る</a></p>
    <?php endif ?>

</body>
</html>
