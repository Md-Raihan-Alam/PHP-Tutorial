<?php
include "db.php";
if (isset($_POST["submit"])) {
    $id = $_POST["id"];
   
    if ($connection) {
        //delete query
        $query = "DELETE FROM users WHERE id='$id'";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            // error print (include $connection in mysqli_error)
            die("Query failed: " . mysqli_error($connection));
        } else {
            echo "data deleted";
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
    <form action="05-delete-record.php" method="post">
        <input type="number" name="id" placeholder="id" required />
       
        <input type="submit" name="submit" value="update" />
    </form>
</body>
</html>
