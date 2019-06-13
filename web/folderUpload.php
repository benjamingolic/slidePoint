<?php

if (isset($_POST["upload"])) {
    if ($_POST["folderName"] != "") {
        $folderName = "uploads/" . $_POST["folderName"];
        if (!is_dir($folderName)) {
            mkdir($folderName);
        }

        foreach ($_FILES["files"]["error"] as $index => $error) {
            if ($error == UPLOAD_ERR_OK) {
                $tmp_name = $_FILES["files"]["tmp_name"][$index];
                $name = basename($_FILES["files"]["name"][$index]);
                move_uploaded_file($tmp_name, $folderName . "/" . $name);
            }
        }

        Header("Location: ./editSlides.php?folderName=" . $folderName);
    }
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <title>FolderUpload</title>
</head>
<style media="screen">
  body{
    background-color: #222222;
    color: white;
    font-family: sans-serif;
  }
  form{
    background-color: #444444;
    padding-top: 20vh;
    padding-bottom: 20vh;
    padding-left: 8vw;
    width: 33vw;
    border-radius: 10%;
    position: relative;
    top: 23vh;
    left: 28vw;
  }

  label{
    margin-left: 5vw;
    text-align: center;
    width: 15vw;
  }
  #button{
    margin-left: 5vw;
    text-align: center;
    width: 15vw;
    background: none;
    color: white;
    font-size: 2em;
  }
  #button:hover {
    cursor: pointer;
  }
</style>
<body>
<form action="folderUpload.php" method="post" enctype="multipart/form-data">
    <label>Type folder name:<input type="text" name="folderName"/></label><br><br>
    <label>Upload Folder: <input type="file" name="files[]" id="files" multiple directory="" webkitdirectory=""
                                 mozdirectory=""/></label><br><br>
    <input id="button" type="submit" name="upload" value="Upload"/>
</form>
</body>
</html>