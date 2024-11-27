<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Uploading</title>
</head>
<body>
    
    <h2>Upload a file</h2>
    <form action="upload-2.php" enctype="multipart/form-data" method="POST" > <!-- enctype needed for $_FILES-->
        Select File: <input type="file" name="file"><br><br>
        <input type="submit" value="Upload file">
    </form>

</body>
</html>
