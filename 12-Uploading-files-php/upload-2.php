<?php
    
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if($_FILES["file"]["error"]===0)
        {
            $uploadDir="uploads/";
            $fileName=basename($_FILES["file"]["name"]);
            $targetFile=$uploadDir.$fileName;
            $fileSize=$_FILES["file"]["size"];
            $fileType=strtolower(pathinfo($fileName,PATHINFO_EXTENSION)); // only path extension
            $allowedTypes=["jpg","gif","png","jpeg"];
            if(!in_array($fileType,$allowedTypes))
            {
                echo "File type is not allowed";
                exit;
            }
            if($fileSize>2*1024*1024)
            {
                echo "File size is too large :{$fileSize}";
                exit;
            }
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
    }else{
        switch($_FILES["file"]["error"])
        {
            case UPLOAD_ERR_INI_SIZE:
                echo "The uploaded file exceeds the upload_max_filesize directive in php.ini";
                break;
        }
    }
   
?>