<?php
$file="example.txt";
if($handle=fopen($file,"w"))
{
    fwrite($handle,"I am learning php");
    fclose($handle);

}else{
    echo "The files could not be writted";
}


?>