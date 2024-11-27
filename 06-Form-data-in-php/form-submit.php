<?php 

    if(isset($_POST[ 'submit']))
    {
        echo "form submitted";
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
    <form action="form-submit.php" method="post">
        <input type="text" placeholder="name"/>
        <input type="password" placeholder="password"/>
        <input type="submit" name="submit"/>
    </form>
</body>
</html>