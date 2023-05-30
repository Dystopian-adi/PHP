<?php
set_time_limit(10000);
// json file name
$filename = "jadu.json";

// Read the JSON file in PHP
$data = file_get_contents($filename); 

// Convert the JSON String into PHP Array
$array = json_decode($data, true); 

foreach($array['data'] as $row) 
{
	$get = str_replace(' ', '%20',$row['Category_Name']);
	$get_dir = str_replace(' ', '_',$row['Category_Name']);
	// echo "$get";die();
	// From URL to get webpage contents.
	$url = "http://aegisdemoserver.in/SEGAds/webservices/PosterMaker/v1/getTemplateImages.php?TemplateCategory=".$get;

	// Initialize a CURL session.
	$ch = curl_init();

	// Return Page contents.
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	//grab URL and pass it to the variable.
	curl_setopt($ch, CURLOPT_URL, $url);

	$result = curl_exec($ch);

	//code
	$array = json_decode($result, true);
	foreach($array['data'] as $row) 
	{
		// print_r($row['THUMB_URI']);
		$dir = $get_dir;
		mkdir("poster_maker/".$dir);
		$my_save_dir = "poster_maker/"."$dir"."/";
		$imgUrl = $row['THUMB_URI'];
		$ch = curl_init($imgUrl);
		$filename = basename($imgUrl);
		$complete_save_loc = $my_save_dir . $filename;

		$fp = fopen($complete_save_loc, 'wb');

		curl_setopt($ch, CURLOPT_FILE, $fp);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_exec($ch);
		curl_close($ch);
		fclose($fp);
		echo '<h1>poster_maker Kanda. </h1>';
		echo $imgUrl;
	}
}
// echo $result;

?>
