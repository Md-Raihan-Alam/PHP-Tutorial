<?php
 
    // include means to include the file in the current file
    // include("db.php");
    // require means to include the file in the current file and if the file is not found, it will throw an error
    require("db.php");
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="index">

<?php require("navigation.php"); ?>

<div class="container">
<div class="hero">
    <div class="hero-content">
        <h1>Welcome to our PHP App</h1>
        <p>Securely login and manage your account with us</p>
        <div class="hero-buttons">
       

            <?php if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]==true):?>
                <a class="btn" href="admin.php">Admin</a>
                <a class="btn" href="logout.php">Logout</a>
            <?php else:?>
                <a class="btn" href="login.php">Login</a>
                <a class="btn" href="register.php">Register</a>
            <?php endif; ?>
            
        </div>
    </div>
</div>
</div>
    
</body>
</html>