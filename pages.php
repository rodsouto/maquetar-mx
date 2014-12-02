<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Multiplica - Test Project</title>
    <style>
        body { background: #FFF; font-family:Arial, Helvetica, sans-serif}
        ul { margin:0 auto 100px auto; width:600px; background:#fff; padding:0}
        ul li { display:block; border-bottom:1px solid #CCC;background:#FF8000; }
        ul li a { display: inline-block;padding:10px; color:#fff; text-decoration:none;display: block;}
        ul li a:hover { background:#fff; color:#000}
        .logo-cont { width:100%; position:fixed; bottom:0; padding-bottom:10px; background:#fff}
        .logo { background:url(http://dpgroup.co/wp-content/uploads/2013/11/Logo-Multiplica.png) no-repeat top center; width:183px; height:53px; margin:0 auto;}
        .logo-client { background: #F2F2F2 url(img/logo.png) no-repeat center center; width:100%; height:93px; margin:0 0 20px 0}
    </style>
</head>

<body>
<div class="logo-client">

</div>

<?php

echo "<ul>";
foreach(glob("*.php") as $file) {
    if ($file == "pages.php" || $file == "export.php") continue;
    echo "<li><a title='lorem ipsum' href='$file' target='_blank'>$file</a></li>";
}
echo "</ul>";

?>
<div class="logo-cont">
    <div class="logo">

    </div>
</div>
</body>
</html>


