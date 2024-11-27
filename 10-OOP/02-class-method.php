<?php
class Car{
    function CarMove(){
        echo "Car moving";
    }
}
if(method_exists("Car","CarMove"))
{
    echo "Car method exists";
}else{
    echo "No car found";
}
?>