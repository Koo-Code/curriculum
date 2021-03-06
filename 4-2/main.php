<?php
// db_connect.phpの読み込み
require_once("db_connect.php");

// function.phpの読み込み
require_once("function.php");

// ログインしていなければ、login.phpにリダイレクト
check_user_logged_in();

// PDOのインスタンスを取得
$pdo = db_connect();

try {
    // SQL文の準備
    $sql = "SELECT * FROM books ORDER BY id DESC";
    // プリペアドステートメントの作成
    $stmt = $pdo->prepare($sql);
    // 実行
    $stmt->execute();
} catch (PDOException $e) {
    // エラーメッセージの出力
    echo "Error: ".$e->getMessage();
    // 終了
    die();
}
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>在庫一覧</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <h1>在庫一覧画面</h1>
    <a class="books_register" href="books_register.php">新規登録</a>
    <a class="logout" href="logout.php">ログアウト</a>
    <p><table>
        <tr>
            <th>タイトル</th>
            <th>発売日</th>
            <th>在庫数</th>
            <th></th>
        </tr>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['stock']; ?></td>
                <td><a class="delete" href="delete_books.php?id=<?php echo $row['id']; ?>">削除</a></td>
            </tr>
        <?php } ?>
    </table></p>
</body>
</html>