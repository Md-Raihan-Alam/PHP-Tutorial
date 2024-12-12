<?php 

session_start();
require("db.php");
if(!isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]!=true){
    header("Location:login.php");
    exit();
}
$result=mysqli_query($conn,"SELECT id,username,email,reg_date FROM users");
if($_SERVER["REQUEST_METHOD"]==="POST")
{
    if(isset($_POST["edit_user"])){
        $user_id=mysqli_real_escape_string($conn,$_POST["user_id"]);
        $new_email=mysqli_real_escape_string($conn,$_POST["email"]);
        $new_username=mysqli_real_escape_string($conn,$_POST["username"]);
        $updateQuery="UPDATE users SET username='$new_username',email='$new_email' WHERE id='$user_id'";
        mysqli_query($conn, $updateQuery);
        header("Location:admin.php");
    }else if(isset($_POST["delete_user"])){
        $user_id=mysqli_real_escape_string($conn,$_POST["user_id"]);
        $deleteQuery="DELETE FROM  users WHERE id='$user_id'";
        mysqli_query($conn, $deleteQuery);
        header("Location:admin.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/admin.css">

</head>
<body class="admin">
<?php require("navigation.php"); ?>

<h1>Manage Users</h1>

<div class="container">
    <table class="user-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Registration Date</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($user=mysqli_fetch_assoc($result)): ?>
        
        <tr>
            <td><?php echo $user["id"] ?></td>
            <td><?php echo $user["username"] ?></td>
            <td><?php echo $user["email"] ?></td>
            <td><?php echo
            $date=date("F j",strtotime($user["reg_date"])) 
            ?></td>
            <td>
                <form method="POST" style="display:inline-block;">
                    <input type="hidden" name="user_id" value="<?php echo $user["id"]; ?>">
                    <input type="text" name="username" value="<?php echo $user["username"]; ?>" required>
                    <input type="email" name="email" value="<?php echo $user["email"]; ?>" required>
                    <button class="edit" type="submit" name="edit_user">Edit</button>
                </form>
                
                <form method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this user?');">
                    <input type="hidden" name="user_id" value="<?php echo $user["id"]; ?>">
                    <button class="delete" type="submit" name="delete_user">Delete</button>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
        <!-- Additional user rows can go here -->
        </tbody>
    </table>
</div>

<!-- Include Footer -->
</body>
</html>
