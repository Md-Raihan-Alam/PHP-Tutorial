<?php
    // echo "<pre>";
    // var_dump($_FILES);
    // echo "</pre>";
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if($_FILES["file"]["error"]===0)
        {
            $uploadDir="uploads/";
            $fileName=basename($_FILES["file"]["name"]);
            $targetFile=$uploadDir.$fileName;
            $uploadSuccess=move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile);
            if($uploadSuccess)
            {
                echo "File uploaded successfully";
            }
            else
            {
                echo "File upload failed";
            }
        }
    }
    // var_dump($_POST);
    // var_dump($_FILES);
    // move_uploaded_file($_FILES["file"]["tmp_name"],"./");
?>