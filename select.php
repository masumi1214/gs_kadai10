<?php
session_start();
include("funcs.php");
sschk();

$pdo = db_conn();
$sql = "SELECT * FROM gs_book_table";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

if ($status == false) {
    sql_error($stmt);
}

$values = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>書籍データ表示</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div { padding: 10px; font-size: 16px; }</style>
</head>
<body id="main">

<header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <?= htmlspecialchars($_SESSION["name"]) ?>さん、こんにちは！
                <a class="navbar-brand" href="index.php">書籍データ登録</a>
                <a class="navbar-brand" href="logout.php">ログアウト</a>
            </div>
        </div>
    </nav>
</header>

<div>
    <div class="container jumbotron">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>書籍名</th>
                    <th>著者</th>
                    <th>ジャンル</th>
                    <th>書籍内容</th>
                    <th>出版日</th>
                    <?php if ($_SESSION["kanri_flg"] == "1") { ?>
                        <th>操作</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($values as $v) { ?>
                    <tr>
                        <td><?= htmlspecialchars($v["id"]) ?></td>
                        <td><a href="detail.php?id=<?= htmlspecialchars($v["id"]) ?>"><?= htmlspecialchars($v["title"]) ?></a></td>
                        <td><?= htmlspecialchars($v["author"]) ?></td>
                        <td><?= htmlspecialchars($v["genre"]) ?></td>
                        <td><?= htmlspecialchars($v["description"]) ?></td>
                        <td><?= htmlspecialchars($v["published_date"]) ?></td>
                        <?php if ($_SESSION["kanri_flg"] == "1") { ?>
                            <td><a href="delete.php?id=<?= htmlspecialchars($v["id"]) ?>">[削除]</a></td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
