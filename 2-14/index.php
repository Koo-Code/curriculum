<?php


$members = ["nakata","aiba","tanemura","uchida","sato"];

//count
echo count($members);
echo '<br>';

//sort
sort($members);
var_dump($members);
echo '<br>';

//in_array
if (in_array("sato",$members)){
    echo "佐藤さんがいる";
}else{
    echo "佐藤さんはいない";
}
echo '<br>';

//implode
$atstr = implode("@@@",$members);
var_dump($atstr);
echo '<br>';


//explode
$re_members = explode("@@@",$atstr);
var_dump($re_members);
echo '<br>';


?>