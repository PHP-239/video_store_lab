<?php 
/**Games Store Lab
  Carlie Peters
  **/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Games Store Lab</title>
</head>
<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="file">Please Upload your CSV file:</label>
        <input type="file" name="uploadedfile" id="uploadedfile" required>
        <input type="submit" value="Upload">
    </form>
</body>
</html>