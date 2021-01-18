<?php
//POST送信で送られてきた名前を受け取って変数を作成
$my_name = $_POST['my_name'];
//①画像を参考に問題文の選択肢の配列を作成してください。
$question1 = ["80","22","20","21"];
$question2 = ["PHP","Python","JAVA","HTML"];
$question3 = ["join","select","insert","update"];
//② ①で作成した、配列から正解の選択肢の変数を作成してください
$question1_ans = $question1[0];
$question2_ans = $question2[3];
$question3_ans = $question3[1];
?>

<!DOCTYPE html> 
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

    <p>お疲れ様です<?php echo $my_name; ?>さん</p>

    <!--フォームの作成 通信はPOST通信で-->
    <form action="answer.php" method="post">


        <h2>①ネットワークのポート番号は何番？</h2>
        <!--③ 問題のradioボタンを「foreach」を使って作成する-->
        <?php foreach($question1 as $value){ ?>
            <input type="radio" name="question1" value="<?php echo $value; ?>">
            <?php echo $value;?>
        <?php } ?>



        <h2>②Webページを作成するための言語は？</h2>
        <!--③ 問題のradioボタンを「foreach」を使って作成する-->
        <?php foreach($question2 as $value){ ?>
            <input type="radio" name="question2" value="<?php echo $value; ?>">
            <?php echo $value;?>
        <?php } ?>



        <h2>③MySQLで情報を取得するためのコマンドは？</h2>
        <!--③ 問題のradioボタンを「foreach」を使って作成する-->
        <?php foreach($question3 as $value){ ?>
            <input type="radio" name="question3" value="<?php echo $value; ?>">
            <?php echo $value;?>
        <?php } ?><br>



        <!--問題の正解の変数と名前の変数を[answer.php]に送る-->
        <input type="hidden" name="question1_ans" value="<?php echo $question1_ans; ?>">
        <input type="hidden" name="question2_ans" value="<?php echo $question2_ans; ?>">
        <input type="hidden" name="question3_ans" value="<?php echo $question3_ans; ?>">

        <input type="hidden" name="my_name" value=<?php echo $my_name;?>>

        <input  class="answerBotton" type="submit" value="回答する">
    </form>

</body>
</html>
