<?php
session_start();

$_SESSION["username"]="joe";

echo $_SESSION["username"];
?>
<a href="about.php">About</a>
<a href="contact.php">Contact</a>