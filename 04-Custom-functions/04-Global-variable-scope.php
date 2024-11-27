<?php

$x="x";
$y="y";
function show(){
    global $y;
    $y="Y";
    $x="X";
}
show();
echo $x;
echo $y;
?>