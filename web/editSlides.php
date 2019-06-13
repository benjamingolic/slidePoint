<?php

if (isset($_GET["folderName"])) {

    $folderName = $_GET["folderName"];

    //Ausgabe der Namen aller Fotos & Thumbnail des Fotos, außerdem kann man die Reihenfolge per Drag and Drop ändern.
    //Die Namen aller Fotos werden in eine TXT Datei gespeichert, jedoch wird die Reihenfolge dort nicht geändert beim Drag and Drop.
    $files = glob("$folderName/*.{jpg,gif,png}", GLOB_BRACE);
    echo "<ul id='sortable1' class = 'droptrue js-sort-list'>";
    foreach ($files as $singleFile) {
        $fileName = preg_split("#/#", $singleFile);
        echo "<li class=\"ui-state-default\"><img src=\"{$singleFile}\" alt=\"{$singleFile}\" height=\"120px\"><p>{$fileName[2]}</p></li>";
    }
    echo '</ul>';
}
?>
<!DOCTYPE html>
<html lang="de" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Drag and Drop List</title>
        <style media="screen">
      body {
        background-color: #333333;
        color: white;
      }
      button {
        width: 20%;
        height: 5%;
        display: block;
      }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
</head>

<body>
<button onclick="createSlideShow();">Create SlideShow</button>
<p id="response"></p>
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
        let folderName = "<?php echo $folderName ?>";
        fetch(`newActiveSlideShow.php?folderName=${folderName}`)
            .then(value => value.text())
            .then(value => {
                let response;
                if (parseInt(value) === 0) {
                    response = "Neue SlideShow konnte nicht verwendet werden";
                } else {
                    response = "Neue SlideShow ist jetzt aktiv";
                }
                document.getElementById("response").innerHTML = response;
            });
    }
</script>
</body>
</html>