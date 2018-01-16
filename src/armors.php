<?php 
$myfile = fopen("armorsets.txt", "r") or die("Unable to open file!");
$data = fread($myfile,filesize("armorsets.txt"));
$pieces = explode(",", $data);
fclose($myfile);
?>


