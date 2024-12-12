<?php

require ("db.php");

$error="";

ini_set("display_errors",1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username=mysqli_real_escape_string($conn,$_POST["username"]);
    $email=mysqli_real_escape_string($conn,$_POST["email"]);
    $password=mysqli_real_escape_string($conn,$_POST["password"]);
    $confirm_password=mysqli_real_escape_string($conn,$_POST["confirm_password"]);  

    if($password==$confirm_password){
        
        $checkUser="SELECT * FROM users WHERE username='$username' LIMIT 1";
        $totalUser=mysqli_query($conn,$checkUser);
        if(mysqli_num_rows($totalUser)== 0){
            $passwordHash=password_hash($password,PASSWORD_DEFAULT);
            $query="INSERT INTO users(username,email,password) VALUES('$username','$email','$passwordHash')";
            $result=mysqli_query($conn,$query);
            if($result){
                header("Location:login.php");
            }else{
                $error="Something went wrong".mysqli_error($conn);
            }
        }else{
            $error="Username already exists";
        }
        
    }else{
        $error="Password does not match"; 
    }
}else{
    $error="Please fill the form";
}

?>
<!-- Include Header -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="register">
<?php require("navigation.php"); ?>
    
<div class="container">
    <div class="form-container">
        <form method="POST">
            <h2>Create your Account</h2>

            <!-- Error message placeholder -->
             <?php if($error):?>
            <p style="color:red">
                <!-- Error message goes here -->
                 <?php echo $error;?>
            </p>
            <?php endif;?>

            <label for="username">Username:</label>
            <input value="<?php echo isset($username) ? $username:'';?>" placeholder="Enter your username" type="text" name="username" required>

            <label for="email">Email:</label>
            <input value="<?php echo isset($email) ? $email:'';?>" placeholder="Enter your email" type="email" name="email" required>

            <label for="password">Password:</label>
            <input value="<?php echo isset($password) ? $password:'';?>" placeholder="Enter your password" type="password" name="password" required>

            <label for="confirm_password">Confirm Password:</label>
            <input value="<?php echo isset($confirm_password) ? $confirm_password:'';?>" placeholder="Confirm your password" type="password" name="confirm_password" required>

            <input type="submit" value="Register">
        </form>
    </div>
</div>
    
</body>
</html>
<?php
mysqli_close($conn);
?>
<!-- Include Footer -->