<?php

if(isset($_POST["submit"]))
{
    $username = $_POST["username"];
    $password = $_POST["password"];
    // database connection
    $connection = mysqli_connect("localhost", "root", "", "phptutorial");
    
    if ($connection) {
        // insert query
        $query="INSERT INTO users(username,password) VALUES ('$username','$password')";
        $result=mysqli_query($connection,$query);
        if(!$result)
        {
            //error print
            die("Query failed ".mysqli_error());
        }
    } else {
        echo "Database connection failed";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>
    <form action="02-create-record.php" method="post">
        <input type="text" name="username" placeholder="username" required />
        <input type="password" name="password" placeholder="password" required />
        <input type="submit" name="submit" value="Register"/>
    </form>
</body>
</html>
