<?php
class Car{
    public $wheels=4;
    protected $hood=1;
    private $engine=1;
    var $doors=4;
    function MoveWheels(){
        $this->wheels=10;
    }
    function TotalDoors(){
        $this->doors=6;
    }
    function showProperty(){
        echo $this->hood;
    }
    function showEngine(){
        echo $this->engine;
    }
}
class Semi extends Car{

}
$bmw=new Car();
$semi=new Semi();
// echo $bmw->hood; will cause error
echo $bmw->showProperty();
echo "<br/>";
echo $semi->showProperty();
echo "<br/>";
//echo $bmw->showEngine(); will cause error
//echo "<br/>";
?>