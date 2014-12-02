<?php
// si estamos exportando tomamos el valor del foreach glob("*.php") as $_file
$phpFile = isset($_file) ? $_file : basename($_SERVER["SCRIPT_FILENAME"]);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Test</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
        <link href="css/styles.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
<body>
<?php

if (isset($_GET["force-container"])) {
    echo "<style>.container {width: 970px !important;}</style>";
}
if (isset($_GET["maqueta"])):
    ?>
    <div id="maqueta"></div>
    <a href="#" id="toggle-maqueta" onclick="$('#maqueta').toggle();return false;">Toggle</a>
    <a href="#" id="toggle-opacity" onclick="toggleOpacity();return false;">Opacity</a>
    <script>
        var opacity = 1;
        function toggleOpacity() {
            $('#maqueta').css("opacity", opacity);
            opacity = opacity == 1 ? 0.5 : 1;
        }
    </script>
    <style>
        #maqueta {position: absolute; top: 0; left: 0; right: 0; bottom: 0; width: 1020px; height: 4429px;
            background: transparent url(maqueta/<?php echo $_GET["maqueta"];?>) no-repeat top center;opacity: .5;z-index: 999;
            margin: 0 auto; border: 1px solid red;}
        #toggle-maqueta {position: fixed; top: 10px; left: 10px; background: black; color: white; text-transform: uppercase;
            font-size: 12px;z-index: 9999;padding: 5px;}
        #toggle-opacity {position: fixed; top: 40px; left: 10px; background: black; color: white; text-transform: uppercase;
            font-size: 12px;z-index: 9999;padding: 5px;}
    </style>
<?php endif;?>