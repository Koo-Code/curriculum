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
            //登録完了メッセージ出力
            echo "登録が完了しました。";
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
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
    <h1>新規登録</h1>
    <form method="POST" action=""><!--actionは空欄の場合自身にデータ送信-->
        <div><font color="#ff0000"><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></font></div>
        user:<br>
        <input type="text" name="name" id="name">
        <br>
        password:<br>
        <input type="password" name="password" id="password"><br>
        <input type="submit" value="submit" id="signUp" name="signUp">
    </form>
</body>
</html>