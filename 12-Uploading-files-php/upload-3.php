<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_FILES["files"])) {
        $uploadDir = "uploads/";

        // Create the upload directory if it doesn't exist
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $allowedTypes = ["jpg", "gif", "png", "jpeg"];
        $maxFileSize = 2 * 1024 * 1024; // 2 MB

        // Iterate through the uploaded files using foreach
        foreach ($_FILES["files"]["name"] as $key => $fileName) {
            if ($_FILES["files"]["error"][$key] === UPLOAD_ERR_OK) {
                $fileName = basename($fileName);
                $targetFile = $uploadDir . $fileName;
                $fileSize = $_FILES["files"]["size"][$key];
                $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION)); // Get file extension

                // Validate file type
                if (!in_array($fileType, $allowedTypes)) {
                    echo "File type '{$fileType}' is not allowed for file '{$fileName}'<br>";
                    continue;
                }

                // Validate file size
                if ($fileSize > $maxFileSize) {
                    echo "File '{$fileName}' is too large: {$fileSize} bytes<br>";
                    continue;
                }

                // Move the uploaded file
                $uploadSuccess = move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFile);
                if ($uploadSuccess) {
                    echo "File '{$fileName}' uploaded successfully<br>";
                } else {
                    echo "File '{$fileName}' upload failed<br>";
                }
            } else {
                echo "Error uploading file '{$fileName}'<br>";
            }
        }
    }
}
?>
