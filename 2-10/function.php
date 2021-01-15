<?php

function getRectangularVolume($width, $length, $height){
    $volume = $width*$length*$height;
    echo "この直方体の体積は ".$volume." cm^3だよ";
}

getRectangularVolume(5,10,8);



?>