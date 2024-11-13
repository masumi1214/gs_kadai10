<?php
session_start();
include("funcs.php");
sschk();

// 1. POSTデータ取得
$title           = $_POST["title"];
$author          = $_POST["author"];
$genre           = $_POST["genre"];
$description     = $_POST["description"];
$published_date  = $_POST["published_date"];
$id              = $_POST["id"];

// 2. DB接続
$pdo = db_conn();

// 3. データ更新SQL作成
$sql = "UPDATE gs_book_table 
        SET title=:title, author=:author, genre=:genre, description=:description, published_date=:published_date 
        WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':author', $author, PDO::PARAM_STR);
$stmt->bindValue(':genre', $genre, PDO::PARAM_STR);
$stmt->bindValue(':description', $description, PDO::PARAM_STR);
$stmt->bindValue(':published_date', $published_date, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

// 4. データ更新処理後
if ($status == false) {
    sql_error($stmt);
} else {
    redirect("select.php");
}
?>
