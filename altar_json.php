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
	// $mydir = "./ehg/;
	// print_r($mydir);
	// Scanning files in a given directory in unsorted order
	// $myfiles = scandir($mydir, SCANDIR_SORT_ASCENDING);
	// $mine = array_diff($myfiles, ['..', '.']);
	// Displaying the files in the directory
	// foreach($mine as $key)
	// {
	// 	if(!is_dir("$mydir/$key"))
	// 	{
			// $cat_id=$i;
		  	// echo $key."/";
			// json file name
			$filename = "json.json";
			$json_get = $mydir.$filename;
			// Read the JSON file in PHP
			$data = file_get_contents($json_get); 
			// Convert the JSON String into PHP Array
			$array = json_decode($data, true); 
			$no=count($array['plant']['cares']);
			$no =$no-1;
			for($i=0;$i<=$no;$i++)
			{
				$title = $array['plant']['cares'][$i]['title'];
				if($title == "Popularity") {
					// array_push($array['plant']['cares'][$i]['care_thumb'],'something');       
					$array['plant']['cares'][$i]['care_thumb'] = 'popularity_thumb.jpg';       
				}
				elseif($title == "Container") {
					$array['plant']['cares'][$i]['care_thumb'] = 'container_thumb.jpg';       
				}
				elseif($title == "Water") {
					$array['plant']['cares'][$i]['care_thumb'] = 'water_thumb.jpg';       
				}
				elseif($title == "Soil") {
					$array['plant']['cares'][$i]['care_thumb'] = 'soil_thumb.jpg';       
				}
				elseif($title == "Fertilizer") {
					$array['plant']['cares'][$i]['care_thumb'] = 'fertilizer_thumb.jpg';       
				}
				elseif($title == "Propagation") {
					$array['plant']['cares'][$i]['care_thumb'] = 'propagation_thumb.jpg';       
				}
				elseif($title == "Temperature") {
					$array['plant']['cares'][$i]['care_thumb'] = 'temperature_thumb.jpg';       
				}
				elseif($title == "Additional") {
					$array['plant']['cares'][$i]['care_thumb'] = 'additional_thumb.jpg';       
				}
				elseif($title == "Pruning") {
					$array['plant']['cares'][$i]['care_thumb'] = 'pruning_thumb.jpg';       
				}
				elseif($title == "Fun") {
					$array['plant']['cares'][$i]['care_thumb'] = 'fun_thumb.jpg';       
				}
				elseif($title == "fact") {
					$array['plant']['cares'][$i]['care_thumb'] = 'fact_thumb.jpg';       
				}
				elseif($title == "Sunlight") {
					$array['plant']['cares'][$i]['care_thumb'] = 'sunlight_thumb.jpg';       
				}
				elseif($title == "Fun fact") {
					$array['plant']['cares'][$i]['care_thumb'] = 'fun_fact_thumb.jpg';       
				}
				else{
					echo "|_Delhi_Se_".$title."_Hu_BC_|";
				}
			}
			// echo json_encode($array,JSON_PRETTY_PRINT);
			$getUrl = json_encode($array,JSON_PRETTY_PRINT);
			// print_r($array);
			// $json = file_get_contents($getUrl);
			$file = fopen( __DIR__ .$mydir.'json.json','w');
			fwrite($file, $getUrl);
			fclose($file);
			echo '\Json/';

	// 	}
	// }
}

?>	