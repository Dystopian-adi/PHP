<?php
$my_save_dir = "download/";
$sound = "https://ia801808.us.archive.org/34/items/the-wonderful-wizard-of-oz-fairy-tales-and-bedtime-stories-for-kids/Three%20Little%20Pigs%20in%20Camp%20%283%20Little%20Pigs%29%20Bedtime%20Stories%20for%20Kids%20_%C2%A0Fairy%20Tales.mp3";
$ch = curl_init($sound);
$filename = basename($sound);
$complete_save_loc = $my_save_dir . $filename;

$fp = fopen($complete_save_loc, 'wb');

curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_exec($ch);
curl_close($ch);
fclose($fp);
echo "downloaded".$sound."  /  ";
?>