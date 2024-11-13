<?php
// 必ず session_start は最初に記述
session_start();

// SESSIONを初期化（空っぽにする）
$_SESSION = array();

// Cookieに保存してある SessionID の保存期間を過去にして破棄
if (isset($_COOKIE[session_name()])) { // session_name() は、セッションID名を返す関数
    setcookie(session_name(), '', time() - 42000, '/');
}

// サーバ側での、セッションIDの破棄
session_destroy();

// 処理後、login.php へリダイレクト
header("Location: login.php");
exit();
?>
