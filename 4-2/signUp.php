<?php

// db_connect.phpの読み込みFILL_IN
require_once("db_connect.php");

$errorMessage = "";

// POSTで送られていれば処理実行
if (isset($_POST["signUp"])){
// nameとpassword両方送られてきたら処理実行
    if (empty($_POST["name"])){//おまけでエラーメッセージの準備
        $errorMessage = "userが未入力です。";

    }elseif (empty($_POST["password"])){
        $errorMessage = "passwordが未入力です。";
    }

    if (!empty($_POST["name"]) && !empty($_POST["password"])){
        $name = $_POST["name"];
        $password = $_POST["password"];

        // PDOのインスタンスを取得FILL_IN
        $pdo = db_connect();

        try {
            // SQL文の準備 FILL_IN 
            $sql = "INSERT INTO users (name,password) VALUES (:name,:password)";
            // パスワードをハッシュ化
            $password_hash = password_hash($password,PASSWORD_DEFAULT);
            // プリペアドステートメントの作成 FILL_IN 
            $stmt = $pdo->prepare($sql);
            // 値をセットFILL_IN
            $stmt->bindParam(":name",$name);
            $stmt->bindValue(":password", $password_hash);
            // 実行 FILL_IN
            $stmt->execute();
            header("Location: login.php");
            exit; 
        }catch (PDOException $e) {
            // エラーメッセージの出力 FILL_IN
            $errorMessage = "データベースエラー";
            echo "Error: ".$e->getMessage();
            // 終了 FILL_IN
            die();
        }

    }

}
?>


<!DOCTYPE html>
<html>
<head>
    <title>ユーザー登録</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <h1 class="a">ユーザー登録画面</h1>
    <a class="forLoginPage" href="login.php">ログイン画面へ</a>
    <form method="POST" action=""><!--actionは空欄の場合自身にデータ送信-->
        <div><font color="#ff0000"><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></font></div>
        <p><input type="text" placeholder="ユーザー名" name="name" id="name" style="width:300px; height:30px;"></p>
        <p><input type="password" placeholder="パスワード" name="password" id="password" style="width:300px; height:30px;"></p>
        <p><input class="signup" type="submit" value="新規登録" id="signUp" name="signUp"></p>        
    </form>
</body>
</html>