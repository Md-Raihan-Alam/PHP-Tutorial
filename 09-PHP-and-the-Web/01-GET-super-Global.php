<?php

print_r($_GET);

$id=10;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="01-GET-super-Global.php?id=200">Click me</a>
    <a href="01-GET-super-Global.php?id=<?php echo $id;?>">Click me 2</a>
</body>
</html>