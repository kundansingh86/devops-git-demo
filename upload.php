
<?php
$target_dir = "uploads/";
$img_files = scandir($target_dir); /* Line #A */
if(isset($_POST["submit"])) {
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    echo "<h3>";
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".&nbsp;";
        $uploadOk = 1;
    } else {
        echo "File is not an image.&nbsp;";
        $uploadOk = 0;
    }


    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.&nbsp;";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.&nbsp;";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.&nbsp;";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.&nbsp;";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.&nbsp;";
        } else {
            echo "Sorry, there was an error uploading your file.&nbsp;";
        }
    }
    echo "</h3>";
}
?>

<!DOCTYPE html>
<html>
<body>
<form action="upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>
<hr />
<table cellspacing="5" cellpadding="10" border="1" width="60%">
    <thead>
        <tr>
            <th align="left">Image</th>
            <th align="left">Name</th>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach ($img_files as $key => $value) { 
        if($value != "." && $value != "..") {
            echo "<tr>
                    <td><img src='uploads/$value' height='200' border='1' /></td>
                    <td>$value</td>
                </tr>";
        }
     }
    ?>
    </tbody>
</table>
</body>
</html>
