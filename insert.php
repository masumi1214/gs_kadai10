<?php
session_start();
include("funcs.php");
sschk();

// デバッグ用のエラー表示
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 1. POSTデータ取得
$title           = $_POST["title"];
$author          = $_POST["author"];
$genre           = $_POST["genre"];
$description     = $_POST["description"];
$published_date  = $_POST["published_date"];
$lid             = "";  // lidにデフォルト値を設定（空文字など）
$lpw             = "";  // lpwにデフォルト値を設定（空文字など）

// 2. DB接続
$pdo = db_conn();

// 3. データ登録SQL作成
$sql = "INSERT INTO gs_book_table (title, author, genre, description, published_date, lid, lpw, indate) 
        VALUES (:title, :author, :genre, :description, :published_date, :lid, :lpw, sysdate())";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':author', $author, PDO::PARAM_STR);
$stmt->bindValue(':genre', $genre, PDO::PARAM_STR);
$stmt->bindValue(':description', $description, PDO::PARAM_STR);
$stmt->bindValue(':published_date', $published_date, PDO::PARAM_STR);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR); // lidに空文字または固定値を設定
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR); // lpwに空文字または固定値を設定
$status = $stmt->execute();

// 4. データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    redirect("select.php");
}
?>
