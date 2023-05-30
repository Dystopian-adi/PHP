<?php
set_time_limit(10000);
$url = "https://lbtwo.superherowall.in/api/sechs/get-videos-pagination";
$str = "";
while (1) {
	// echo implode(",",$ar)."<br>";
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$headers = array(
	   "Content-Type: multipart/form-data",
	   'Authorization: Bearer abvny4hw2vyvejdn'
	);

	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	$data = [
	    'sort_by' => 'newest',
		'video_loaded_ids' => $str,
		'app_name' => 'boo',
		'county' => 'india'
	];
	print_r($data);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	// Return response instead of outputting
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// Execute the POST request
	$response = curl_exec($ch);
	//code
	$array = json_decode($response, true);
	echo $array['message']."<br>";
	foreach ($array['data']['templates'] as $key) {
		//do something
		$str .= $key['id'].",";

		$dir = str_replace(' ', '_', $key['title']);
		mkdir("reels/".$dir);
		$my_save_dir = "reels/"."$dir"."/";
		$thumb = $key['thumb_url'];
		$ch1 = curl_init($thumb);
		$filename1 = basename($thumb);
		$complete_save_loc1 = $my_save_dir . $filename1;

		$fp1 = fopen($complete_save_loc1, 'wb');

		curl_setopt($ch1, CURLOPT_FILE, $fp1);
		curl_setopt($ch1, CURLOPT_HEADER, 0);
		curl_exec($ch1);
		curl_close($ch1);
		fclose($fp1);
		echo '<h1> thumb wiskey. </h1>';

		$video = $key['video_url'];
		$ch2 = curl_init($video);
		$filename2 = basename($video);
		$complete_save_loc2 = $my_save_dir . $filename2;

		$fp2 = fopen($complete_save_loc2, 'wb');

		curl_setopt($ch2, CURLOPT_FILE, $fp2);
		curl_setopt($ch2, CURLOPT_HEADER, 0);
		curl_exec($ch2);
		curl_close($ch2);
		fclose($fp2);
		echo '<h1> video wiskey. </h1>';

		$zip = $key['zip_url'];
		$ch3 = curl_init($zip);
		$filename3 = basename($zip);
		$complete_save_loc3 = $my_save_dir . $filename3;

		$fp3 = fopen($complete_save_loc3, 'wb');

		curl_setopt($ch3, CURLOPT_FILE, $fp3);
		curl_setopt($ch3, CURLOPT_HEADER, 0);
		curl_exec($ch3);
		curl_close($ch3);
		fclose($fp3);
		echo '<h1> zip wiskey. </h1>';

	}
	if($array['message'] == "No Templates Found")
	{
		echo "Key does not exist!";
		break;
	}
	else
	{
		echo "Key exists!";
	}
	// echo $str;
	if(curl_error($ch)){
		echo 'Request Error:' . curl_error($ch);
	}else{
	    // print_r($response);
	}	
	curl_close($ch);
}
?>

