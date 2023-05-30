<?php
set_time_limit(5000);
// json file name
$filename = "link_txt.txt";
// Read the JSON file in PHP
$data = file_get_contents($filename); 
// Convert the JSON String into PHP Array
// $array = json_decode($data, true); 
$pattern = '~[a-z]+://\S+~';
$str = $data;

if($num_found = preg_match_all($pattern, $str, $out))
{
  echo "FOUND ".$num_found." LINKS:\n";
  print_r($out[0]);
}
?>