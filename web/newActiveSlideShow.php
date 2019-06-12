<?php
$returnValue = 0;
if (isset($_GET["folderName"])) {
    $folderName = $_GET["folderName"];
    if (is_dir($folderName) && !is_dir_empty($folderName)) {

        //Löschen der alten Bilder
        $activeImages = glob("uploads/active/*.{png,jpg,gif}", GLOB_BRACE);
        foreach ($activeImages as $image) {
            unlink($image);
        }

        recurse_copy($folderName, "uploads/active");
        $returnValue = 1;
    }
}
echo $returnValue;

function is_dir_empty($dir)
{
    if (!is_readable($dir)) return NULL;
    return (count(scandir($dir)) == 2);
}

function recurse_copy($src, $dst)
{
    $dir = opendir($src);
    @mkdir($dst);
    while (false !== ($file = readdir($dir))) {
        if (($file != '.') && ($file != '..')) {
            if (is_dir($src . '/' . $file)) {
                recurse_copy($src . '/' . $file, $dst . '/' . $file);
            } else {
                copy($src . '/' . $file, $dst . '/' . $file);
            }
        }
    }
    closedir($dir);
}