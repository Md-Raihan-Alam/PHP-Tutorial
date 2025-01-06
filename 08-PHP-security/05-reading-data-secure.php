<?php
// Step 1: Establish a database connection
$connection = mysqli_connect("localhost", "root", "", "phptutorial");

// Check if the connection is successful
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Step 2: Define the SQL query with optional placeholders
// Here we select all rows from the `users` table
$query = "SELECT id, username, password FROM users";

// Step 3: Initialize and prepare the statement
$stmt = mysqli_stmt_init($connection);
if (!mysqli_stmt_prepare($stmt, $query)) {
    die("SQL statement preparation failed: " . mysqli_error($connection));
}

// Step 4: Execute the prepared statement
if (!mysqli_stmt_execute($stmt)) {
    die("Query execution failed: " . mysqli_stmt_error($stmt));
}

// Step 5: Bind the result columns to variables
// This binds the result columns to PHP variables, which will hold the data after fetching
mysqli_stmt_bind_result($stmt, $id, $username, $password);

// Step 6: Fetch the results and display them
echo "<h3>Users List:</h3>";
echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Password (Hashed)</th>
        </tr>";
while (mysqli_stmt_fetch($stmt)) {
    // Display the fetched data in a table format
    echo "<tr>
            <td>{$id}</td>
            <td>{$username}</td>
            <td>{$password}</td>
          </tr>";
}
echo "</table>";

// Step 7: Close the statement and the connection
mysqli_stmt_close($stmt);
mysqli_close($connection);
?>
