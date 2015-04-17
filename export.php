<?php

/*
 * script para generar htmls a partir de los php
 */

$_vars = array_keys(get_defined_vars());
$_vars[] = '_vars';
$_vars[] = '_file';
$_vars[] = '_html';

function recurse_copy($src,$dst,$ignore = array()) {
    if (in_array($src, $ignore)) {
        return;
    }

    if (!file_exists($src)) {
        throw new Exception("Invalid file: $src");
    }

    $dir = opendir($src);

    @mkdir($dst);
    while(false !== ( $file = readdir($dir)) ) {
        if (( $file != '.' ) && ( $file != '..' )) {
            if ( is_dir($src . '/' . $file) ) {
                recurse_copy($src . '/' . $file,$dst . '/' . $file, $ignore);
            }
            else {
                copy($src . '/' . $file,$dst . '/' . $file);
            }
        }
    }
    closedir($dir);
}

if (!file_exists(__DIR__."/html") && !mkdir(__DIR__."/html")) {
    die("Tiene que existir el directorio /html");
}

// copio assets
recurse_copy("css", "html/css");
recurse_copy("js", "html/js");
recurse_copy("img", "html/img");
recurse_copy("fonts", "html/fonts");

foreach(glob("*.php") as $_file) {

    if ($_file == "export.php") continue;

    ob_start();
    include $_file;
    $_html = ob_get_contents();

    if ($_file == "pages.php") {
        // reemplazamos los links
        $_html = str_replace(".php", ".html", $_html);
    }
    ob_end_clean();

    file_put_contents("html/".str_replace("php", "html", $_file), $_html);
    echo str_replace("php", "html", $_file)."... ok<br />";

    // reseteamos variables globales
    foreach (get_defined_vars() as $_v => $_val) {
        if (!in_array($_v, $_vars)) {
            unset($GLOBALS[$_v]);
        }
    }

}

