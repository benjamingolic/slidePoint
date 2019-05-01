<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Drag and Drop List</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
   <?php
    //Ausgabe der Namen aller Fotos & Thumbnail des Fotos, außerdem kann man die Reihenfolge per Drag and Drop ändern.
    //Die Namen aller Fotos werden in eine TXT Datei gespeichert, jedoch wird die Reihenfolge dort nicht geändert beim Drag and Drop.
        $files = glob("images/*.{jpg,gif,png}", GLOB_BRACE);
        $nameListFile = fopen("imagesList.txt","w");
        echo "<ul id='sortable1' class = 'droptrue js-sort-list'>";
          foreach($files as $f){
            $fileName = preg_split("#/#", $f);
                echo '<li class="ui-state-default"><img src="'.$f.'"alt="'.$f.'" height="120px"><br> '.$fileName[1].'</li>';
                fwrite($nameListFile, "$fileName[1]\n");
                echo '<br>';
          }
        echo '</ul>';
        fclose($nameListFile);
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>

    <!-- Drag and Drop -->
    <script type="text/javascript">
    $(function() {
      $( "ul.droptrue" ).sortable({
        connectWith: ".js-sort-list"
      });

      $( "ul.dropfalse" ).sortable({
        connectWith: ".js-sort-list",
      });

      $( "#sortable1" ).disableSelection();
    });
    </script>
  </body>
</html>
