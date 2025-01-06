<?php
// Step 1: Establish a database connection
$connection = mysqli_connect("localhost", "root", "", "phptutorial");

// Check if the connection is successful
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Step 2: Define the SQL query with placeholders
$query = "DELETE FROM users WHERE id = ?";

// Step 3: Initialize and prepare the statement
$stmt = mysqli_stmt_init($connection);
if (!mysqli_stmt_prepare($stmt, $query)) {
    die("SQL statement preparation failed: " . mysqli_error($connection));
}

// Step 4: Define the ID of the user to delete
$idToDelete = 2; // ID of the user to delete

// Step 5: Bind the parameter
// The query uses 1 integer (i) as a parameter
mysqli_stmt_bind_param($stmt, "i", $idToDelete);

// Step 6: Execute the prepared statement
if (mysqli_stmt_execute($stmt)) {
    echo "User with ID {$idToDelete} deleted successfully.<br>";
} else {
    echo "Error deleting user: " . mysqli_stmt_error($stmt) . "<br>";
}

// Step 7: Close the statement and the connection
mysqli_stmt_close($stmt);
mysqli_close($connection);
?>
