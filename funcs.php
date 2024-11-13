<?php
// XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str) {
    return htmlspecialchars($str, ENT_QUOTES);
}

// DB接続
function db_conn() {
    try {
        $db_name = 'masumi1214_gs_kadai10';     // データベース名
        $db_host = 'mysql3101.db.sakura.ne.jp'; // DBホスト
        $db_id   = 'masumi1214_gs_kadai10';     // ユーザー名
        $db_pw   = 'mieko0623'; 
        return new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
    } catch (PDOException $e) {
        exit('DB Connection Error: ' . $e->getMessage());
    }
}

// SQLエラー
function sql_error($stmt) {
    $error = $stmt->errorInfo();
    exit("SQLError: " . $error[2]);
}

// リダイレクト
function redirect($file_name) {
    header("Location: " . $file_name);
    exit();
}

// SessionCheck(スケルトン)
function sschk() {
    if (!isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"] != session_id()) {
        exit("Login Error");
    } else {
        session_regenerate_id(true);
        $_SESSION["chk_ssid"] = session_id();
    }
}
?>
