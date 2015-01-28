<?php

$cfg  = array();
$path = __DIR__ . DIRECTORY_SEPARATOR . 'chunks';

if ($handle = opendir($path)) {
    while (false !== ($entry = readdir($handle))) {
        if (! in_array($entry, array('.', '..'))) {
            if (is_readable($pathToFile = $path . DIRECTORY_SEPARATOR . $entry)) {
                if (is_array($content = require_once $pathToFile)) { $cfg = array_merge_recursive($cfg, $content); }
            }
        }
    }

    closedir($handle);
}

return $cfg;
