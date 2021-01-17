<?php

//ceil
$x = 1.1;
echo ceil($x);
echo '<br>';

//floor
$y = 3.7;
echo floor($y);
echo '<br>';

//round
$z = 2.4;
echo round($z);
echo '<br>';

//pi
function sphereVolume($r){
    $sphere_volume = 4 / 3 * pi() * pow($r,3);
    echo round($sphere_volume);
}
sphereVolume(4);
echo '<br>';

//mt_rand
echo mt_rand(40,50);
echo '<br>';



$str = "aqwsedrgyjkolp";
//strlen
echo strlen($str);
echo '<br>';

//strpos
echo strpos($str,"r");
echo '<br>';

//substr
echo substr($str, -7, 3);
echo '<br>';

//str_replace
echo str_replace(substr($str, -7, 3),"aaaaaaa",$str);
echo '<br>';



//printf
$name = "佐藤";
$limit_day = 20; 
printf("%sさんの誕生日まであと%d日です",$name,$limit_day);
echo '<br>';

//sprintf
$limit_hour = 7;
$limit_minute = 53;
$limit_second = 4;
$limit_time = sprintf("残り%02d時間%02d分%02d秒",$limit_hour,$limit_minute,$limit_second);
echo $limit_time;
?>