<?php
$name="test";
$value="value";
$expiration=time()+(60*60*24*7);
setcookie($name,$value,$expiration);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    check cookie
</body>
</html>