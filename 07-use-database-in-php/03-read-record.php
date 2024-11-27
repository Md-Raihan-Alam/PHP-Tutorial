<?php

// database connection
$connection = mysqli_connect("localhost", "root", "", "phptutorial");

if ($connection) {
    // read query
    $query = "SELECT * FROM users";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        //error print
        die("Query failed: " . mysqli_error($connection));
    } else {
        // Fetching with mysqli_fetch_row
        echo "Using mysqli_fetch_row():<br/>";
        while ($row = mysqli_fetch_row($result)) {
            print_r($row);
            echo "<br/>";
        }

        // Resetting result pointer for a second loop
        mysqli_data_seek($result, 0);  // Reset the pointer to the start of the result set
        
        // Fetching with mysqli_fetch_assoc
        echo "<br/>Using mysqli_fetch_assoc():<br/>";
        while ($row = mysqli_fetch_assoc($result)) {
            print_r($row);
            echo "<br/>";
        }
    }
} else {
    echo "Database connection failed";
}

?>
