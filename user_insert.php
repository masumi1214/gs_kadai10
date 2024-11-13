<?php
// セッションを使うために必ず session_start
session_start();

// 関数ファイルの読み込み（funcs.phpが「includes」ディレクトリにある場合）
include "funcs.php";
sschk(); // セッションチェック

// 1. POSTデータ取得
$name      = filter_input(INPUT_POST, "name"); // 名前
$lid       = filter_input(INPUT_POST, "lid"); // ログインID
$lpw       = filter_input(INPUT_POST, "lpw"); // パスワード
$kanri_flg = filter_input(INPUT_POST, "kanri_flg"); // 管理者フラグ
$lpw       = password_hash($lpw, PASSWORD_DEFAULT); // パスワードハッシュ化

// 2. DB接続
$pdo = db_conn();

// 3. データ登録SQL作成
$sql = "INSERT INTO gs_user_table(name, lid, lpw, kanri_flg, life_flg) VALUES(:name, :lid, :lpw, :kanri_flg, 0)";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_INT);
$status = $stmt->execute(); // 実行

// 4. データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    redirect("user.php");
}
?>
