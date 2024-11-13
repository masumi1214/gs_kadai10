<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>書籍データ登録</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>div { padding: 10px; font-size: 16px; }</style>
</head>
<body>

<!-- Head[Start] -->
<header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header"><a class="navbar-brand" href="select.php">書籍データ一覧</a></div>
        </div>
    </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="insert.php">
    <div class="jumbotron">
        <fieldset>
            <legend>書籍データ登録</legend>
            <label>書籍名：<input type="text" name="title" required></label><br>
            <label>著者：<input type="text" name="author" required></label><br>
            <label>ジャンル：<input type="text" name="genre" required></label><br>
            <label>書籍内容：<textarea name="description" rows="4" cols="40" required></textarea></label><br>
            <label>出版日：<input type="date" name="published_date" required></label><br>
            <input type="submit" value="送信">
        </fieldset>
    </div>
</form>
<!-- Main[End] -->

</body>
</html>
