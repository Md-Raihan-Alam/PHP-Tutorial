<?php
include "db.php";
if (isset($_POST["submit"])) {
    $id = $_POST["id"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    if ($connection) {
        //update query
        $query = "UPDATE users SET username='$username', password='$password' WHERE id='$id'";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            // error print (include $connection in mysqli_error)
            die("Query failed: " . mysqli_error($connection));
        } else {
            echo "Database updated";
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
    <form action="04-update-record.php" method="post">
        <input type="number" name="id" placeholder="id" required />
        <input type="text" name="username" placeholder="username" required />
        <input type="password" name="password" placeholder="password" required />
        <input type="submit" name="submit" value="update" />
    </form>
</body>
</html>
