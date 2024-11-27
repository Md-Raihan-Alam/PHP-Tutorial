<?php
class Car {
    static $wheels = 4; // Static property
    var $hood = 1;
    var $engine = 1;
    var $doors = 4;

    function MoveWheels() {
        // Accessing static property correctly
        self::$wheels = 10; // or Car::$wheels = 10;
    }

    function AccessWheels() {
        // Accessing static property correctly
        Car::$wheels = 20; // or self::$wheels = 20;
    }
}

$bmw = new Car();

// echo $bmw->wheels; // This would cause an error because 'wheels' is static

echo Car::$wheels; // Correctly accessing the static property
echo "<br/>";
$bmw->AccessWheels(); // Accessing the method to change the static property
echo Car::$wheels; // Output the modified value of the static property
?>
