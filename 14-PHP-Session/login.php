<?php
$message="";
session_start();
if(isset($_SESSION["username"])){
    echo "OK";
    header("Location: admin.php");
    exit();
}
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $username = $_POST["username"];
        $password = $_POST["password"];

        if($username==="raihan" && $password==="password"){
            
            $_SESSION["username"] = $username;
            header("Location: admin.php");
            exit;
        }else{
            $message= "Invalid username or password";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if($message): ?>
    <?php echo $message; ?>
    <?php endif; ?>
        <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="submit"/>
    </form>
</body>
</html>