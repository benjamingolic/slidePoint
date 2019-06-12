<?php
function is_dir_empty($dir)
{
    if (!is_readable($dir)) return NULL;
    return (count(scandir($dir)) == 2);
}

$slideBody = "";
if (is_dir("uploads/active") && !is_dir_empty("uploads/active")) {
    $directory = "uploads/active";
    $images = glob($directory . "/*.{png,jpg,gif}", GLOB_BRACE);

    foreach ($images as $image) {
        $slideBody .= "<div><img src='{$image}' alt=''></div>";
    }
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>SlideShow</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <style>
        #slideShow img {
            width: 500px;
        }

        #slideShow > div {
            position: absolute;
            top: 10px;
            left: 10px;
            right: 10px;
            bottom: 10px;
        }
    </style>
</head>
<body>
<div id="slideShow">
    <?php
    echo $slideBody;
    ?>
</div>
<script>
    $("#slideShow > div:gt(0)").hide();

    setInterval(function () {
        $('#slideShow > div:first')
            .fadeOut(1000)
            .next()
            .fadeIn(1000)
            .end()
            .appendTo('#slideShow');
    }, 3000);
</script>
</body>
</html>