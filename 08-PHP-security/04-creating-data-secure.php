<?php
// Step 1: Establish a database connection
$connection = mysqli_connect("localhost", "root", "", "phptutorial");

// Check if the connection is successful
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Step 2: Define the SQL query with placeholders
$query = "INSERT INTO users (username, password) VALUES (?, ?)";

// Step 3: Initialize and prepare the statement
$stmt = mysqli_stmt_init($connection);
if (!mysqli_stmt_prepare($stmt, $query)) {
    die("SQL statement preparation failed: " . mysqli_error($connection));
}

// Step 4: Define sample data as an associative array
$sampleData = [
    ["username" => "user1", "password" => "password1"],
    ["username" => "user2", "password" => "password2"],
    ["username" => "user3", "password" => "password3"],
    ["username" => "user4", "password" => "password4"],
    ["username" => "user5", "password" => "password5"],
];

// Step 5: Loop through the data and insert it into the database
foreach ($sampleData as $data) {
    // Hash the password before inserting it into the database
    $hashed_password = password_hash($data["password"], PASSWORD_BCRYPT);

    // Bind the current data to the prepared statement
    mysqli_stmt_bind_param($stmt, "ss", $data["username"], $hashed_password);

    // Execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        echo "Data for username '{$data['username']}' inserted successfully.<br>";
    } else {
        echo "Error inserting data for username '{$data['username']}': " . mysqli_stmt_error($stmt) . "<br>";
    }
}

// Step 6: Close the statement and the connection
mysqli_stmt_close($stmt);
mysqli_close($connection);
?>
