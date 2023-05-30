<?php

set_time_limit(5000); 
$con = mysqli_connect("localhost", "root", "", "js_plant_app");

$sql = mysqli_query($con, "SELECT * FROM `js_plant_details`");
// //   $i=1;
while($lasun = mysqli_fetch_assoc($sql))
{
	$name = $lasun['cat_name'];
	$id = $lasun['cat_id'];
	// $mydir = "./ehg/".$name."/festival_thumb_data/".$op."/";
	$mydir = "./plant/".$name."/";
	$filename = "json.json";
	$json_get = $mydir.$filename;
	// Read the JSON file in PHP
	$data = file_get_contents($json_get); 
	// Convert the JSON String into PHP Array
	$array = json_decode($data, true);

	$latin_name = $array['plant']['latin_name'];
	$latin_name = str_replace("'", "\'", $latin_name);
	$name = str_replace("'", "\'", $name);
	$query = mysqli_query($con,"UPDATE `js_plant_details` SET `latin_name`='$latin_name' WHERE `cat_name` = '$name' ");
	echo "|LASUN>___<MEETS>___<".$latin_name."___|";
}	 