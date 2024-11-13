<?php
session_start();
// 関数ファイルの読み込み
include "funcs.php";
sschk(); // セッションチェック
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>USERデータ登録</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>div { padding: 10px; font-size: 16px; }</style>
</head>
<body>

<!-- Head[Start] -->
<header>
    <?= htmlspecialchars($_SESSION["name"]) ?> さん　
    <?php include("menu.php"); ?>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="user_insert.php">
    <div class="jumbotron">
        <fieldset>
            <legend>ユーザー登録</legend>
            <label>名前：<input type="text" name="name" required></label><br>
            <label>Login ID：<input type="text" name="lid" required></label><br>
            <label>Login PW：<input type="password" name="lpw" required></label><br>
            <label>管理FLG：
                一般 <input type="radio" name="kanri_flg" value="0" required>　
                管理者 <input type="radio" name="kanri_flg" value="1" required>
            </label><br>
            <input type="submit" value="送信">
        </fieldset>
    </div>
</form>
<!-- Main[End] -->

</body>
</html>
