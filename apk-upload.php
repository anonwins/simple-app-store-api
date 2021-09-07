<?php

////////////////////////////////////////////////////
// SimpleAppStore API - version 1.0
// https://github.com/anonwins/SimpleAppStore
////////////////////////////////////////////////////

require_once('./config.php');
require_once('./functions.php');

header("Access-Control-Allow-Origin: $_origin");

// security first
if (!isset($_GET['passcode'])) die('[ERROR:011] No passcode!');
if ($_GET['passcode']!==$_passcode) die('[ERROR:021] Wrong passcode!');
if (!isset($_GET['apk-url'])) die('[ERROR:031] No apk-url!');

// get filename of apk
foreach(get_headers($_GET['apk-url']) as $header) {
    if (strpos(strtolower($header),'filename=') !== false) {
        $filename = str_replace('"','',end(explode('filename=',$header)));
        break;
    }
}

// validate filename
if (!$filename) die('[ERROR:041] No filename!');
if (strpos($filename,'.apk') === false) die('[ERROR:051] Wrong filename!');
if (!is_apk_in_list($filename)) die('[ERROR:061] Filename is not in list!');

// download & overwrite apk
$apk_path = "$_apk_dir/$filename";
file_put_contents($apk_path,file_get_contents($_GET['apk-url']));

// print new version & exit
$version = get_apk_version_code($apk_path);
echo "[OK] {$filename} has been updated to version $version";

?>