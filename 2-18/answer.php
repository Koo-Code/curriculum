<?php 
//[question.php]から送られてきた名前の変数、選択した回答、問題の答えの変数を作成
$my_name = $_POST['my_name'];
$question1 = $_POST['question1'];
$question2 = $_POST['question2'];
$question3 = $_POST['question3'];
$question1_ans = $_POST['question1_ans'];
$question2_ans = $_POST['question2_ans'];
$question3_ans = $_POST['question3_ans'];
//選択した回答と正解が一致していれば「正解！」、一致していなければ「残念・・・」と出力される処理を組んだ関数を作成する

function check($question,$question_ans){
    if($question == $question_ans){
        echo "正解！";
    }else{
        echo "残念・・・";
    }
}

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

    <p><?php echo $my_name; ?>さんの結果は・・・？</p>
    <p>①の答え</p>
    <!--作成した関数を呼び出して結果を表示-->
    <?php check($question1,$question1_ans); ?>

    <p>②の答え</p>
    <!--作成した関数を呼び出して結果を表示-->
    <?php check($question2,$question2_ans); ?>

    <p>③の答え</p>
    <!--作成した関数を呼び出して結果を表示-->
    <?php check($question3,$question3_ans); ?>


</body>
</html>
