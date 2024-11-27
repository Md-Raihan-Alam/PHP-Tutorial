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