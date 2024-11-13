<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/main.css" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>div { padding: 10px; font-size: 16px; }</style>
    <title>ログイン</title>
</head>
<body>

<header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header"><span class="navbar-brand">LOGIN</span></div>
        </div>
    </nav>
</header>

<!-- Main[Start] -->
<form name="form1" action="login_act.php" method="post">
    <div class="container">
        <label for="lid">ID:</label>
        <input type="text" name="lid" id="lid" required><br>
        
        <label for="lpw">PW:</label>
        <input type="password" name="lpw" id="lpw" required><br>
        
        <input type="submit" value="ログイン">
    </div>
</form>
<!-- Main[End] -->

</body>
</html>
