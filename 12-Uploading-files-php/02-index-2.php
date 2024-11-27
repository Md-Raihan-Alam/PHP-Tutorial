<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Uploading Multiple</title>
</head>
<body>
    
    <h2>Upload Multiple File</h2>
    <form action="upload-3.php" enctype="multipart/form-data" method="POST" > <!-- enctype needed for $_FILES-->
        Selected Files: <input type="file" name="files[]" multiple><br><br>
        <input type="submit" value="Upload files">
    </form>

</body>
</html>
