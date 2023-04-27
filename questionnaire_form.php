<?php
session_start();
$err = $_SESSION;

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>教育指導資料(家庭環境)</title>
</head>
<body>
    <div id="q-title">教育指導資料(家庭環境)</div>
        <div class="question">以下の項目をお答えください。</div>
        <form action="questionnaire.php" method="post">

            <label for="child_name">児童名:</label>
            <input type="text" id="child_name" name="child_name" placeholder="山田 太郎" value="<?= $_SESSION['questionnaire_data']['child_name'] ?? '' ?>">
            <?php if(isset($err['child_name'])) : ?>
                <p class="error"><?= $err['child_name']; ?></p>
            <?php endif; ?>

            <label for="sex">性別:</label>
            <div id="dialogue_frequency">
                <label>
                    <input type="radio" name="sex" value="男" 
                        <?php 
                        if(isset($_SESSION['questionnaire_data']['sex']) && $_SESSION['questionnaire_data']['sex'] == "男"){
                            echo 'checked';
                            }
                        ?>
                    >
                男
                </label>
                <label>
                <input type="radio" name="sex" value="女"
                        <?php 
                        if(isset($_SESSION['questionnaire_data']['sex']) && $_SESSION['questionnaire_data']['sex'] == "女"){
                            echo 'checked';
                            }
                        ?>
                    >
                女
                </label>
            </div>
            <?php if(isset($err['sex'])) : ?>
                <p class="error"><?= $err['sex']; ?></p>
            <?php endif; ?>

            <label for="age">年齢:</label>
            <input type="text" id="age" name="age" value="<?= $_SESSION['questionnaire_data']['age'] ?? '' ?>">
            <?php if(isset($err['age'])) : ?>
                <p class="error"><?= $err['age']; ?></p>
            <?php endif; ?>


            <label for="birthday">生年月日:</label>
            <input type="text" id="birthday" name="birthday" value="<?= $_SESSION['questionnaire_data']['birthday'] ?? '' ?>">
            <?php if(isset($err['birthday'])) : ?>
                <p class="error"><?= $err['birthday']; ?></p>
            <?php endif; ?>


            <label for="address">住所:</label>
            <input type="text" id="address" name="address" value="<?= $_SESSION['questionnaire_data']['address'] ?? '' ?>">
            <?php if(isset($err['address'])) : ?>
                <p class="error"><?= $err['address']; ?></p>
            <?php endif; ?>


            <label for="parent_name">保護者名:</label>
            <input type="text" id="parent_name" name="parent_name" value="<?= $_SESSION['questionnaire_data']['parent_name'] ?? '' ?>">
            <?php if(isset($err['parent_name'])) : ?>
                <p class="error"><?= $err['parent_name']; ?></p>
            <?php endif; ?>


            <label for="tel">電話番号:</label>
            <input type="text" id="tel" name="tel" value="<?= $_SESSION['questionnaire_data']['tel'] ?? '' ?>">
            <?php if(isset($err['tel'])) : ?>
                <p class="error"><?= $err['tel']; ?></p>
            <?php endif; ?>


            <label for="email">メールアドレス:</label>
            <input type="email" id="email" name="email" value="<?= $_SESSION['questionnaire_data']['email'] ?? '' ?>">
            <?php if(isset($err['email'])) : ?>
                <p class="error"><?= $err['email']; ?></p>
            <?php endif; ?>


            <label for="childcare_history">保育歴:</label>
            <textarea id="childcare_history" name="childcare_history"><?= $_SESSION['questionnaire_data']['childcare_history'] ?? '' ?></textarea>
            <?php if(isset($err['childcare_history'])) : ?>
                <p class="error"><?= $err['childcare_history']; ?></p>
            <?php endif; ?>


            <label for="medical_history">入学前の病歴:</label>
            <textarea id="medical_history" name="medical_history"><?= $_SESSION['questionnaire_data']['medical_history'] ?? '' ?></textarea>
            <?php if(isset($err['medical_history'])) : ?>
                <p class="error"><?= $err['medical_history']; ?></p>
            <?php endif; ?>


            <div class="question">担任に知ってほしいこと</div>
            <label for="physical">身体面について:</label>
            <textarea id="physical" name="physical"><?= $_SESSION['questionnaire_data']['physical'] ?? '' ?></textarea>
            <?php if(isset($err['physical'])) : ?>
                <p class="error"><?= $err['physical']; ?></p>
            <?php endif; ?>


            <label for="personality">性格面について:</label>
            <textarea id="personality" name="personality"><?= $_SESSION['questionnaire_data']['personality'] ?? '' ?></textarea>
            <?php if(isset($err['personality'])) : ?>
                <p class="error"><?= $err['personality']; ?></p>
            <?php endif; ?>


            <label for="other">その他:</label>
            <textarea id="other" name="other"><?= $_SESSION['questionnaire_data']['other'] ?? '' ?></textarea>
            <?php if(isset($err['other'])) : ?>
                <p class="error"><?= $err['other']; ?></p>
            <?php endif; ?>


            <div class="question">※お子様の教育上の参考資料にしますのでもれなくご記入ください。</div>
            <label for="dialogue_frequency">・親子の対話の時間を持っていますか？(以下より該当する項目にチェックを入れてください。):</label>
            <div id="dialogue_frequency">
                <label>
                    <input type="radio" name="dialogue_frequency" value="話を常にしている" 
                        <?php 
                        if(isset($_SESSION['questionnaire_data']['dialogue_frequency']) && $_SESSION['questionnaire_data']['dialogue_frequency'] == "話を常にしている"){
                            echo 'checked';
                            }
                        ?>
                    >
                話を常にしている
                </label>
                <label>
                    <input type="radio" name="dialogue_frequency" value="時々話をしている" 
                        <?php 
                        if(isset($_SESSION['questionnaire_data']['dialogue_frequency']) && $_SESSION['questionnaire_data']['dialogue_frequency'] == "時々話をしている"){
                            echo 'checked';
                            }
                        ?>
                    >
                時々話をしている
                </label>
                <label>
                <input type="radio" name="dialogue_frequency" value="ほとんど話をすることがない"
                        <?php 
                        if(isset($_SESSION['questionnaire_data']['dialogue_frequency']) && $_SESSION['questionnaire_data']['dialogue_frequency'] == "ほとんど話をすることがない"){
                            echo 'checked';
                            }
                        ?>
                    >
                ほとんど話をすることがない
                </label>
            </div>
            <?php if(isset($err['dialogue_frequency'])) : ?>
                <p class="error"><?= $err['dialogue_frequency']; ?></p>
            <?php endif; ?>


            <label for="home_study">・家庭での学習はどのようにしていますか？:</label>
            <textarea id="home_study" name="home_study" ><?= $_SESSION['questionnaire_data']['home_study'] ?? '' ?></textarea>
            <?php if(isset($err['home_study'])) : ?>
                <p class="error"><?= $err['home_study']; ?></p>
            <?php endif; ?>


            <label for="educational_policy">・お子様への家庭教育の方針についてお知らせください。:</label>
            <textarea id="educational_policy" name="educational_policy"><?= $_SESSION['questionnaire_data']['educational_policy'] ?? '' ?></textarea>
            <?php if(isset($err['educational_policy'])) : ?>
                <p class="error"><?= $err['educational_policy']; ?></p>
            <?php endif; ?>


            <div><input type="submit" value="送信"></div>
    </form>
</body>
</html>


