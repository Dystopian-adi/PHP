<?php
set_time_limit(100000);
$url = "http://www.ringtones.live/api/v1/guest/stories-pagination";
for($i=2;$i<=6;$i++)
{
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, true);

	$headers = array(
	   "Content-Type: multipart/form-data",
	);

	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	$id = "". $i ."";
	$data = [
	    'page' => $id
	];
	$data = http_build_query($data);
	$getUrl = $url."?".$data;
	// curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_URL, $getUrl);
	// Execute the POST request
	$response = curl_exec($ch);
	//code
	$array = json_decode($response, true);
	foreach($array['stories']['data'] as $key) {
		//do something
		// print_r($key);die();
		$dir = $key['title'];
		mkdir("ringtone/".$dir);
		$my_save_dir = "ringtone/"."$dir"."/";

		$sound = $key['file_path'];
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

		$image = $key['image_path'];
		$ch1 = curl_init($image);
		$filename1 = basename($image);
		$complete_save_loc1 = $my_save_dir . $filename1;

		$fp1 = fopen($complete_save_loc1, 'wb');

		curl_setopt($ch1, CURLOPT_FILE, $fp1);
		curl_setopt($ch1, CURLOPT_HEADER, 0);
		curl_exec($ch1);
		curl_close($ch1);
		fclose($fp1);
		echo "downloaded".$image;

	}
	if(curl_error($ch)){
		echo 'Request Error:' . curl_error($ch);
	}else{
	    // print_r($response);
	}	
	curl_close($ch);
}
?>

