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
}
$car=new Car();
echo $car->wheels;
echo "<br/>";
$truck=new Car();
echo $truck->wheels=8;
$truck->TotalDoors();
echo "<br/>";
echo $truck->doors;
?>