<?php

if (isset($_POST["submit"])) {
    // Step 1: Establish a database connection
    // The `mysqli_connect` function connects to the database using hostname, username, password, and database name
    $connection = mysqli_connect("localhost", "root", "", "phptutorial");

    // Check if the connection was successful
    if (!$connection) {
        // Exit and display an error message if the connection fails
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Step 2: Write the SQL query with placeholders
    // Placeholders (`?`) are used to safely include user inputs into the query
    $query = "INSERT INTO users (username, password) VALUES (?, ?)";

    // Step 3: Initialize and prepare the statement
    // `mysqli_stmt_init` initializes a statement object
    // `mysqli_stmt_prepare` prepares the SQL statement with placeholders for execution
    $stmt = mysqli_stmt_init($connection); // Initialize the statement object
    if (!mysqli_stmt_prepare($stmt, $query)) {
        // If the statement preparation fails, display an error and exit
        die("SQL statement preparation failed: " . mysqli_error($connection));
    }

    // Step 4: Get user input
    // These are the raw values submitted via the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Step 5: Hash the password
    // Use `password_hash` to securely hash the password before storing it in the database
    // This ensures that even if the database is compromised, passwords remain secure
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Step 6: Bind parameters to the prepared statement
    // `mysqli_stmt_bind_param` binds user inputs to the placeholders in the prepared statement
    // The first argument is the statement object
    // The second argument is a string specifying the data types of the parameters:
    // - 's' for string, 'i' for integer, 'd' for double, etc.
    // The subsequent arguments are the variables to bind
    mysqli_stmt_bind_param($stmt, "ss", $username, $hashed_password);

    // Step 7: Execute the prepared statement
    // `mysqli_stmt_execute` runs the query with the bound parameters
    if (mysqli_stmt_execute($stmt)) {
        // If execution is successful, display a success message
        echo "Registration successful!";
    } else {
        // If execution fails, display an error message with details
        echo "Error executing query: " . mysqli_stmt_error($stmt);
    }

    // Step 8: Close the statement and database connection
    // `mysqli_stmt_close` frees the resources associated with the statement
    // `mysqli_close` closes the database connection
    mysqli_stmt_close($stmt);
    mysqli_close($connection);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Login Form</title>
</head>
<body>
    <!-- HTML form for user input -->
    <form action="01-sql-injections-prevent.php" method="post">
        <!-- Input field for the username -->
        <input type="text" name="username" placeholder="username" required />

        <!-- Input field for the password -->
        <input type="password" name="password" placeholder="password" required />

        <!-- Submit button -->
        <input type="submit" name="submit" value="Register" />
    </form>
</body>
</html>
