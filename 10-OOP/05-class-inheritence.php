<?php
class Car{
    var $wheels=4;
    var $hood=1;
    var $engine=1;
    var $doors=4;
    function MoveWheels(){
        $this->wheels=10;
    }
    function TotalDoors(){
        $this->doors=6;
    }
    function start(){
        echo "Starting engine...";
    }
}
class Plane extends Car{
    var $hood=20;
}
$plan=new Plane();
echo $plan->wheels."<br/>";
$plan->start();
echo "<br/>";
echo $plan->hood;
?>