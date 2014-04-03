<?php

function potenza($base, $esp){
    return pow($base, $esp);
}

function scambia(&$a, &$b){
    $temp=$a;
    $a=$b;
    $b=$temp;
}
?>
