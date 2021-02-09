<?php
// セッション開始
session_start();
// セッション変数のクリア
$_SESSION = array();
// セッションクリア
session_destroy();
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ログアウト</title>
    <link rel="stylesheet" href="style1.css">
</head>
    <body>
     <h1>ログアウト画面</h1>
    <div>ログアウトしました</div>
    <p><a class="forLoginPage" href="login.php">ログイン画面に戻る</a></p>
    </body>
</html>