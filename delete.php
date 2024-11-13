<?php
session_start();

// 1. POSTデータ取得
$id = $_GET["id"];  // 削除対象のIDをURLパラメータから取得

// 2. DB接続
include("funcs.php");  // 共通関数ファイルをインクルード
sschk();               // セッションチェック
$pdo = db_conn();      // DB接続

// 3. データ削除SQL作成
$stmt = $pdo->prepare("DELETE FROM gs_book_table WHERE id=:id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  // Integer（数値の場合 PDO::PARAM_INT）
$status = $stmt->execute();  // 実行

// 4. 実行後の処理
if ($status == false) {
    sql_error($stmt);  // エラー発生時
} else {
    redirect("select.php");  // 正常実行後に一覧ページへリダイレクト
}
?>
