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
    <link href="https://fonts.googleapis.com/css?family=Roboto:600&display=swap" rel="stylesheet">
    <title>FolderUpload</title>
</head>
<style media="screen">
  body{
    background-color: #222222;
    color: white;
    font-family: 'Roboto', 'Montserrat Light', 'Open Sans';
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
    margin-left: 0vw;
    text-align: center;
    width: 15vw;
    text-decoration: underline;
  }

  input {
  box-sizing: border-box;
  width: 50%;
  padding: 2%;
  border: none;
  border-radius: 0;
  box-shadow: none;
  border-bottom: 1px solid #DDD;
  font-size: 120%;
  outline: none;
  cursor: text;
  background-color: transparent;
  color: white;
  margin-left: 2%;
}
#button{
  margin-left: 5vw;
  text-align: center;
  width: 15vw;
  background: none;
  color: white;
  font-size: 1.5em;
  padding-top: 2%;
  padding-bottom: 2%;
  border: 1px solid white;
}
#button:hover {
  cursor: pointer;
  background-color: white;
  color: black;
}
#files{
  border: none;
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
