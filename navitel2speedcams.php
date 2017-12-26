<?php
/**
 * @author artyfarty http://artyfarty.ru/ 
 */

$inputFile = $argv[1];
$navitel = fopen($inputFile, "r");
$speedcams = fopen(dirname($inputFile) . DIRECTORY_SEPARATOR  . "speedcams.gps", "w");

$i = 0;
while ($l = fgetcsv($navitel)) {
    if ($i++) {
        $x = $l[2];
        $y = $l[1];
        $l[1] = $x;
        $l[2] = $y;
    }
    
    fputs($speedcams, implode(",", $l) . "\r\n");
}
