<!DOCTYPE html>
<html>
<head>
    <title>Upload</title>
</head>
<body>
<h1>Datei-Upload</h1>
<br>
<form action="imageUpload.php" enctype="multipart/form-data" method="post">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="upload Image" name="submit">
</form>
</body>
</html>

<?php
$target_dir = "upload/";
if (isset($_FILES) && isset($_FILES["fileToUpload"])) {
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    echo $target_file;
    echo "<br>";
}


if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . " .";
        echo "<br>";
        $uploadOk = 1;
    } else {
        echo "File is not an image ";
        echo "<br>";
        $uploadOk = 0;
    }


    if (file_exists($target_file)) {
        echo "Sorry - File already exists";
        echo "<br>";
        $uploadOk = 0;
    }

    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry - Your File is too large";
        echo "<br>";
        $uploadOk = 0;
    }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry - only jpg, jpeg, png and gif - Files are allowed";
        echo "<br>";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry your file was not uploaded!";
        echo "<br>";
    } 
    
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

        echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded";
        $output = "<a href=\"getThumb.php?name=" . basename($_FILES["fileToUpload"]["name"]) . "\">Thump</a>";
        echo $output;
        echo "<br>";

    }

}
?>
