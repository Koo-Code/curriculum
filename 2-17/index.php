<?php

//while文のループ
//進んだマス<40の間ループ
//1-6でランダムに数字を出力し、変数に足していく

$i=0;//マス
$j=0;//試行回数

while($i<40){
    //試行回数更新
    $j++;

    //サイコロを振り、マスを進める
    $rnd = mt_rand(1,6);
    $i += $rnd;

    //結果を出力
    echo $j."回目=".$rnd.'<br>';
}

echo "合計".$j."回でゴールしました";

?>