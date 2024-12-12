<?php
$conn=mysqli_connect("localhost","root","","login_app");  
if(!$conn)
{
    echo "Not connected".mysqli_error($conn);
} 

?>