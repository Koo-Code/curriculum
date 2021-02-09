<?php
// db_connect.phpの読み込み
require_once("db_connect.php");

// function.phpの読み込み
require_once("function.php");

// ログインしていなければ、login.phpにリダイレクト
check_user_logged_in();

// 提出ボタンが押された場合
if (isset($_POST["register"])) {
    // titleとcontentの入力チェック
    if (empty($_POST["title"])) {
        echo 'タイトルが未入力です。';
    } elseif (empty($_POST["date"])) {
        echo '発売日が未入力です。';
    } elseif (empty($_POST["stock"])){
        echo '在庫数が未選択です。';
    }

    if (!empty($_POST["title"]) && !empty($_POST["date"]) && !empty($_POST["stock"])) {
        // 入力したtitleとdateとstockを格納
        $title = $_POST["title"];
        $date = $_POST["date"];
        $stock = $_POST["stock"];

        // PDOのインスタンスを取得
        $pdo = db_connect();

        try {
            // SQL文の準備
            $sql = "INSERT INTO books (title,date,stock) VALUES (:title,:date,:stock)";
            // プリペアドステートメントの準備
            $stmt = $pdo->prepare($sql);
            // タイトルをバインド
            $stmt->bindParam(":title",$title);
            // 発売日をバインド
            $stmt->bindParam(":date",$date);
            //在庫数をバインド
            $stmt->bindParam(":stock",$stock);
            // 実行
            $stmt->execute();
            // main.phpにリダイレクト
            header("Location: main.php");
            exit;
        } catch (PDOException $e) {
            // エラーメッセージの出力
            echo 'Error: ' . $e->getMessage();
            // 終了
            die();
        }
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>本   登録画面</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <h1>本  登録画面</h1>
    <form method="POST" action="">
        <p><input type="text" placeholder="タイトル" name="title" id="title" style="width:300px;height:30px"></p>
        <p><input type="text" placeholder="発売日" name="date" id="date" style="width:300px;height:30px;"></p>
        <p>在庫数</p>
        <p><select name="stock" id="stock" style= "width:250px; height:30px;">
            <option value="" style="display: none;">選択してください</option>
            <?php for ($i=1; $i<=10; $i++){ ?>
                <option value="<?php echo $i*5; ?>">
                    <?php echo $i*5; ?>
                </option>
            <?php } ?>
        </select></p>
        <input class="books_register" type="submit" value="登録" id="register" name="register">
    </form>
</body>
</html>