<?php
   include("getID3-master/getid3/getid3.php");
   $filename = 'download/flurry.mp3';
   $getID3 = new getID3;
   $file = $getID3->analyze($filename);
   $playtime_seconds = $file['playtime_seconds'];
   echo gmdate("i", $playtime_seconds);
?>	