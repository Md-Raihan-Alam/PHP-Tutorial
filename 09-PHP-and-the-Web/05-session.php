<?php
session_start();
$_SESSION["greeting"] = "Hello";
echo session_id(); // This will print the session ID
print_r($_SESSION); // This will print the session array

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>