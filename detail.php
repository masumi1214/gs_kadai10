<?php
session_start();
include("funcs.php");
sschk();

$id = $_GET["id"];
$pdo = db_conn();
$stmt = $pdo->prepare("SELECT * FROM gs_book_table WHERE id=:id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

if ($status == false) {
    sql_error($stmt);
} else {
    $row = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>書籍データ詳細</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>div { padding: 10px; font-size: 16px; }</style>
</head>
<body>

<header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header"><a class="navbar-brand" href="select.php">書籍データ一覧</a></div>
        </div>
    </nav>
</header>

<div class="container jumbotron">
    <p>タイトル: <?= htmlspecialchars($row['title']) ?></p>
    <p>著者: <?= htmlspecialchars($row['author']) ?></p>
    <p>ジャンル: <?= htmlspecialchars($row['genre']) ?></p>
    <p>書籍内容: <?= htmlspecialchars($row['description']) ?></p>
    <p>出版日: <?= htmlspecialchars($row['published_date']) ?></p>
    <p><a href="update.php?id=<?= htmlspecialchars($row['id']) ?>">編集</a></p>
</div>

</body>
</html>
