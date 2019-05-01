<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <title>FolderUpload</title>
</head>

<body>
 <form action="folderUpload.php" method="post" enctype="multipart/form-data">
  Type folder name: <input type="text" name="foldername"/><br><br>
  Upload Folder: <input type="file" name="files[]" id="files" multiple directory="" webkitdirectory="" mozdirectory="" /><br><br>

  <input id="button" type="submit" name="upload" value="Upload" />
 </form>

<body>
<html>

<?php
if(isset($_POST['upload'])){

    if($_POST['foldername'] != ""){
        $foldername = $_POST['foldername'];
	if(!is_dir($foldername))
	    mkdir($foldername);
	foreach($FILES['files']['name'] as $i -> $name){
		if(strlen($FILES['files']['name'][$i]) > 1){
			move_uploaded_file($FILES['files']['name'][$i], $foldername.'/'.$name);
		}
	}
	echo "Folder is successfully uploaded";
    }
    else
   	echo "Upload folder name is not set.";
}
?>
