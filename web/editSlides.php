<?php

if (isset($_GET["folderName"])) {

    $folderName = $_GET["folderName"];

    //Ausgabe der Namen aller Fotos & Thumbnail des Fotos, außerdem kann man die Reihenfolge per Drag and Drop ändern.
    //Die Namen aller Fotos werden in eine TXT Datei gespeichert, jedoch wird die Reihenfolge dort nicht geändert beim Drag and Drop.
    $files = glob("$folderName/*.{jpg,gif,png}", GLOB_BRACE);
    echo "<ul id='sortable1' class = 'droptrue js-sort-list'>";
    foreach ($files as $singleFile) {
        $fileName = preg_split("#/#", $singleFile);
        echo "<li class=\"ui-state-default\"><img src=\"{$singleFile}\" alt=\"{$singleFile}\" height=\"120px\">{$fileName[2]}</li>";
    }
    echo '</ul>';
}
?>
<!DOCTYPE html>
<html lang="de" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Drag and Drop List</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
</head>

<body>
<button></button>
<button onclick="createSlideShow();">Create SlideShow</button>
<script>
    $(function () {
        $("ul.droptrue").sortable({
            connectWith: ".js-sort-list"
        });

        $("ul.dropfalse").sortable({
            connectWith: ".js-sort-list",
        });

        $("#sortable1").disableSelection();
    });

    function createSlideShow() {
        let imagePaths = <?php echo json_encode($files); ?>;
        console.log(document.getElementsByTagName("li")[0].innerHTML);
        let preLoad = [];

        for (let i = 0; i < imagePaths.length; i++) {
            preLoad[i] = new Image();
            preLoad[i].src = imagePaths[i];
        }

        let index = 0;

        function update() {
            if (preLoad[index] != null) {
                document.images[index].src = preLoad[index].src;
                index++;
                setTimeout(update, 1000);
            }
        }

        update();
    }
</script>
</body>
</html>