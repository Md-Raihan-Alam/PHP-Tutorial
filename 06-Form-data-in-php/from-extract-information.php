<?php 

    if(isset($_POST[ 'submit']))
    {
        $name=$_POST["name"];
        $password=$_POST["password"];
        echo "Hello ".$name." your password is ".$password;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="from-extract-information.php" method="post">
        <input type="text" name="name" placeholder="name"/>
        <input type="password" name="password" placeholder="password"/>
        <input type="submit" name="submit"/>
    </form>
</body>
</html>