<?php

function setActiveClass($pageName){
// basename() function returns the filename from a path
// $_SERVER["PHP_SELF"] is a super global variable that returns the filename of the currently executing script
    $current_page=basename($_SERVER["PHP_SELF"]); 
   //echo "<p>".$current_page."</p><p>".$pageName."</p>";
    if($current_page==$pageName)
    {
        //echo $pageName;
        return "active";
    }
    return "";
}

?>