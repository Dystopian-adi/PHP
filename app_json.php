<?php
set_time_limit(10000);
// API URL
$url = 'https://digitalpost365.com/admin/api/userapi/v16/getfestivalimages';


// Create a new cURL resource
$ch = curl_init($url);
for ($i=80; $i<=1500; $i++)
{
	// Setup request to send json via POST
	$id = "" . $i . "";
	$data = array(
	    'token' => '$2y$12$Gq5vKSkeQa/WAKefJWC9Bee9c5fNDS9/UqlfPkYtJH7sBi3WiuJ5S',
		'postcategoryid' => $id,
		'offset' => '0',
		'languageid' => '1',
		'sub_category_id' => '0',
		'type' => 'image'
	);
	// print_r($data);die();
	$payload = json_encode($data);

	// Attach encoded JSON string to the POST fields
	curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

	// Set the content type to application/json
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
	
	// Return response instead of outputting
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	// Execute the POST request
	$response = curl_exec($ch);
	//code
	$array = json_decode($response, true);
	foreach($array['data'] as $row) 
	{
		// print_r($row);die();
		$get_title = $row['post_category_id'];
		$dir = str_replace(' ', '_', $get_title);
		mkdir("poster/guj/".$dir);
		// mkdir("jadugar_ravi_trending/".$dir."/thumb");
		$my_save_dir = "poster/guj/"."$dir"."/";
		$vid_thumb = $row['post_content'];
		$imgUrl = str_replace(' ', '%20', $vid_thumb);
		$ch3 = curl_init($imgUrl);
		$filename = basename($imgUrl);
		$complete_save_loc = $my_save_dir . $filename;

		$fp = fopen($complete_save_loc, 'wb');

		curl_setopt($ch3, CURLOPT_FILE, $fp);
		curl_setopt($ch3, CURLOPT_HEADER, 0);
		curl_exec($ch3);
		curl_close($ch3);
		fclose($fp);
		echo '<h1>Durga_Puja Kanda. </h1>';
		// echo $imgUrl;

		// mkdir("jadugar_ravi_trending/".$dir."/video");
		// $my_save_dir1 = "jadugar_ravi_trending/"."$dir"."/video/";
		// $vid_link = $row['video_link'];
		// $imgUrl1 = str_replace(' ', '%20', $vid_link);
		// $ch1 = curl_init($imgUrl1);
		// $filename1 = basename($imgUrl1);
		// $complete_save_loc1 = $my_save_dir1 . $filename1;

		// $fp1 = fopen($complete_save_loc1, 'wb');

		// curl_setopt($ch1, CURLOPT_FILE, $fp1);
		// curl_setopt($ch1, CURLOPT_HEADER, 0);
		// curl_exec($ch1);
		// curl_close($ch1);
		// fclose($fp1);
		// echo '<h1>jadugar_ravi_trending Kanda. </h1>';
		// // echo $imgUrl1;

		// mkdir("jadugar_ravi_trending/".$dir."/zip");
		// $my_save_dir2 = "jadugar_ravi_trending/"."$dir"."/zip/";
		// $vid_zip = $row['video_zip'];
		// $imgUrl2 = str_replace(' ', '%20', $vid_zip);
		// $ch2 = curl_init($imgUrl2);
		// $filename2 = basename($imgUrl2);
		// $complete_save_loc2= $my_save_dir2 . $filename2;

		// $fp2 = fopen($complete_save_loc2, 'wb');

		// curl_setopt($ch2, CURLOPT_FILE, $fp2);
		// curl_setopt($ch2, CURLOPT_HEADER, 0);
		// curl_exec($ch2);
		// curl_close($ch2);
		// fclose($fp2);
		// echo '<h1>jadugar_ravi_trending Kanda. </h1>';
		// echo $imgUrl2;
	}
	//end code    

	if(curl_error($ch)){
	    echo 'Request Error:' . curl_error($ch);
	}else{
	    print_r($response);
	}
}	
curl_close($ch);
?>