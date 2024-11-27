<?php
class Car{
    var $wheels=4;
    var $hood=1;
    var $engine=1;
    var $doors=4;
    function __construct(){
        echo $this->wheels=10;
    }
}
$car=new Car();
echo "<br/>";
$bmw=new Car();
?>