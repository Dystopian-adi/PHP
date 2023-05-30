<?php
set_time_limit(5000);
// json file name
$filename = "plant_blogs1.json";

// Read the JSON file in PHP
$data = file_get_contents($filename); 

// Convert the JSON String into PHP Array
$array = json_decode($data, true); 
//Check if dir exits
$mydir = "./plant_blogs/";
$files = scandir($mydir, SCANDIR_SORT_ASCENDING);
$myfiles = array_diff($files, ['..', '.']);
// print_r($myfiles);die();
//End Check
foreach($array['data'] as $row) 
{
	$get_plant = $row['name'];
	$dir = str_replace(' ', '_', $get_plant);
	$get_slug = $row['slug'];
	$getUrl = "https://prod.myplantin.com/v2-services/articles/".$get_slug;
	if(in_array($dir, $myfiles))
	{
		echo "dir already exists";
	}
	else
	{	
		mkdir("plant_blogs/".$dir);
		mkdir("plant_blogs/".$dir."/thumb");
		$my_save_dir = "plant_blogs/"."$dir"."/thumb/";

		$plant_thumb = $row['thumbnail']['formats']['small']['url'];
		// $imgUrl = str_replace(' ', '%20', $plant_thumb);
		$checkUrl = str_replace('small_', 'large_', $plant_thumb);
		// Use get_headers() function
		$headers = @get_headers($checkUrl);
		// Use condition to check the existence of URL
		if($headers && strpos( $headers[0], '200')) {
			$imgUrl = $checkUrl;
		}
		else {
			$imgUrl = $plant_thumb;
			
		}
		$ch3 = curl_init($imgUrl);
		$filename = basename($imgUrl);
		$complete_save_loc = $my_save_dir . $filename;

		$fp = fopen($complete_save_loc, 'wb');

		curl_setopt($ch3, CURLOPT_FILE, $fp);
		curl_setopt($ch3, CURLOPT_HEADER, 0);
		curl_exec($ch3);
		curl_close($ch3);
		fclose($fp);
		echo 'THUMB/';

		$get_links = $row['details'];
		preg_match_all('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $get_links, $match);
		foreach($match[0] as $row1) 
		{
			$images = $row1;
			// mkdir("plant_blogs/".$dir);
			mkdir("plant_blogs/".$dir."/images");
			$my_save_dir1 = "plant_blogs/"."$dir"."/images/";
			// $plant_thumb = $row['image_url'];
			$imgUrl1 = str_replace(' ', '%20', $images);
			$ch4 = curl_init($imgUrl1);
			$filename1 = basename($imgUrl1);
			$complete_save_loc1 = $my_save_dir1 . $filename1;

			$fp1 = fopen($complete_save_loc1, 'wb');

			curl_setopt($ch4, CURLOPT_FILE, $fp1);
			curl_setopt($ch4, CURLOPT_HEADER, 0);
			curl_exec($ch4);
			curl_close($ch4);
			fclose($fp1);
			echo 'IMAGE/';
			// die();
		}
	 	$json = file_get_contents($getUrl);
  		$file = fopen( __DIR__ ."/".$my_save_dir.'json.json','w');
		fwrite($file, $json);
		fclose($file);
		echo 'Json/';
	}
	// die();
}
?>