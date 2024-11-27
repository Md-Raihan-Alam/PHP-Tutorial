<?php

if(isset($_POST["submit"]))
{
    // Establish database connection
    $connection = mysqli_connect("localhost", "root", "", "phptutorial");

    if ($connection) {
        // Get user inputs and escape special characters to prevent SQL injection
        // Syntax: mysqli_real_escape_string(connection, string)
        // The function escapes special characters like quotes or backslashes in the input string
        // It ensures that user input is treated as plain text, not as part of the SQL query
        $username = mysqli_real_escape_string($connection, $_POST["username"]);
        $password = mysqli_real_escape_string($connection, $_POST["password"]);

        // Encrypt (hash) the password before storing it
        // Syntax: password_hash(password, algorithm)
        // The function hashes the password using a secure algorithm like PASSWORD_BCRYPT
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Prepare the SQL query to insert the username and hashed password into the database
        $query = "INSERT INTO users(username,password) VALUES ('$username','$hashed_password')";
        $result = mysqli_query($connection, $query);

        // Check if the query was successful
        if(!$result)
        {
            // Print error message if the query fails
            die("Query failed: " . mysqli_error($connection));
        }else{
            echo "success";
        }
    } else {
        // Print an error message if the database connection fails
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
    <form action="02-password-encryption.php" method="post">
        <input type="text" name="username" placeholder="username" required />
        <input type="password" name="password" placeholder="password" required />
        <input type="submit" name="submit" value="Register"/>
    </form>
</body>
</html>
