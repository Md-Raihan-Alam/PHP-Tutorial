<?php 

    if(isset($_POST[ 'submit']))
    {
        $admins=array("admin","user");
        $name=$_POST["name"];
        $password=$_POST["password"];
        $minimum=6;
        if(strlen($password)>=$minimum)
        {
            if(in_array($name,$admins))
            {
                echo "Welcome<br/>";
            }else{
                echo "Invalid credentials<br/>";
            }
        }else{
            echo "Password needs to be at least 6 character<br/>";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="validate-form.php" method="post">
        <input type="text" name="name" placeholder="name"/>
        <input type="password" name="password" placeholder="password"/>
        <input type="submit" name="submit"/>
    </form>
</body>
</html>