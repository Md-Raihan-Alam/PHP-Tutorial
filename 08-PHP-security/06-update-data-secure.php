<?php
// Step 1: Establish a database connection
$connection = mysqli_connect("localhost", "root", "", "phptutorial");

// Check if the connection is successful
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Step 2: Define the SQL query with placeholders
$query = "UPDATE users SET username = ?, password = ? WHERE id = ?";

// Step 3: Initialize and prepare the statement
$stmt = mysqli_stmt_init($connection);
if (!mysqli_stmt_prepare($stmt, $query)) {
    die("SQL statement preparation failed: " . mysqli_error($connection));
}

// Step 4: Define new values to update
$id = 1; // ID of the user to update
$newUsername = "updatedUser1";
$newPassword = password_hash("newPassword1", PASSWORD_BCRYPT); // Hash the new password

// Step 5: Bind parameters
// The query uses 2 strings (s, s) and 1 integer (i) as parameters
mysqli_stmt_bind_param($stmt, "ssi", $newUsername, $newPassword, $id);

// Step 6: Execute the prepared statement
if (mysqli_stmt_execute($stmt)) {
    echo "User with ID {$id} updated successfully.<br>";
} else {
    echo "Error updating user: " . mysqli_stmt_error($stmt) . "<br>";
}

// Step 7: Close the statement and the connection
mysqli_stmt_close($stmt);
mysqli_close($connection);
?>
