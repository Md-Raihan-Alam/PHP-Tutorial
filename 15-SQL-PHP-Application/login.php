<?php
// raihan
// password12345
require ("db.php");
session_start();
if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]==true){
    header("Location:admin.php");
    exit();
}
$error="";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username=mysqli_real_escape_string($conn,$_POST["username"]);
    $password=mysqli_real_escape_string($conn,$_POST["password"]);

    $checkUser="SELECT * FROM users WHERE username='$username' LIMIT 1";
    $totalUser=mysqli_query($conn,$checkUser);
    if(mysqli_num_rows($totalUser)== 1){
        // mysqli_fetch_assoc() function fetches a result row as an associative array which is used to access the result data
        $user=mysqli_fetch_assoc($totalUser);
        // password_verify() function verifies that a password matches a hash
        if(password_verify($password,$user["password"])){
            
            $_SESSION["logged_in"]=true;
            $_SESSION["username"]=$username;
            header("Location:admin.php");
            exit();
        }else{
            $error="Invalid username or password";
        }
    }else{
        $error="Invalid username or password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="login">
   
    
<?php require("navigation.php"); ?>
    

    <!-- Include Header and Navigation -->
    
    <div class="container">
        <div class="form-container">
            <form method="POST" action="">
                <h2>Login</h2>
    
                  <!-- Error message placeholder -->
             <?php if($error):?>
            <p style="color:red">
                <!-- Error message goes here -->
                 <?php echo $error;?>
            </p>
            <?php endif;?>
    
                <label for="username">Username:</label><br>
                <input value="<?php echo isset($username) ? $username:'';?>" type="text" name="username" required><br><br>
    
                <label for="password">Password:</label><br>
                <input value="<?php echo isset($password) ? $password:'';?>" type="password" name="password" required><br><br>
    
                <input type="submit" value="Login">
            </form>
        </div>
    </div>
    
    <!-- Include Footer -->

</body>
</html>
<?php
mysqli_close($conn);
?>