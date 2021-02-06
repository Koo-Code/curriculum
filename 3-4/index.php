<?php
require_once("getData.php");

//インスタンス作成
$getdata = new getData();

//DBからユーザー情報を引っ張ってきて、$users_dataに格納
$users_data = $getdata->getUserData();

//DBから記事情報を引っ張ってきて、$post_dataに格納
$post_data = $getdata->getPostData();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YIGroupBlog</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header clearfix">
        <img class="logo" src="yigroup_logo.png" alt="yigroup_logo">
        <div class="userName">
            <p>ようこそ <?php echo $users_data["last_name"]; echo $users_data["first_name"]; ?> さん</p>
        </div>
        <div class="loginDate">
            <p>最終ログイン日：<?php echo $users_data["last_login"]; ?></p>
        </div>
    </div>

    <table>
        <tr>
            <th>記事ID</th>
            <th>タイトル</th>
            <th>カテゴリ</th>
            <th>本文</th>
            <th>投稿日</th>
        </tr>
        <?php foreach($post_data as $record){ ?>
        <tr>
            <td><?php echo $record['id']; ?></td>
            <td><?php echo $record['title']; ?></td>
            <td>
                <?php
                if ($record['category_no'] == 1){
                    echo "食事";
                }elseif($record['category_no'] == 2){
                    echo "旅行";
                }else{
                    echo "その他";
                }
                ?>
            </td>
            <td><?php echo $record['comment']; ?></td>
            <td><?php echo $record['created']; ?></td>
        </tr>
        <?php } ?>
    </table>

    <div class="footer">
        Y&I group.inc
    </div>

</body>
</html>