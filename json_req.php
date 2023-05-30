<?php
set_time_limit(10000);

// json file name
$filename = "posterapp.json";

// Read the JSON file in PHP
$data = file_get_contents($filename); 

// Convert the JSON String into PHP Array
$array = json_decode($data, true); 
foreach($array['result'] as $row) 
{
	// print_r($row['name']);
	$main = $row['name'];
	$main_dir = str_replace(' ', '_', $main);
	// mkdir("post_app/".$main_dir);
	foreach($row['featured_cards'] as $key) 
	{
		$main_cat = $key['webp_image'];
		$in_dir = str_replace('.webp', '', $main_cat);
		// mkdir("post_app/".$main_dir."/".$in_dir);
		$my_save_dir = "post_app/"."$main_dir"."/"."$in_dir"."/";
		// print_r($my_save_dir);die();
		// $poster_thumb = $key['webp_original_img'];
		// $thumbUrl = str_replace(' ', '%20', $poster_thumb);
		// $ch = curl_init($thumbUrl);
		// $filename = basename($thumbUrl);
		// $complete_save_loc = $my_save_dir . $filename;
		// $fp = fopen($complete_save_loc, 'wb');
		// curl_setopt($ch, CURLOPT_FILE, $fp);
		// curl_setopt($ch, CURLOPT_HEADER, 0);
		// curl_exec($ch);
		// curl_close($ch);
		// fclose($fp);
		// echo $thumbUrl;

		$json_id = $key['json_id'];
		echo $json_id;
		// API URL
		$url = 'http://165.232.147.81/postmaker/api/getJsonData';
		// Create a new cURL resource
		$ch = curl_init($url);
		// Setup request to send json via POST
		$id = "" . $json_id . "";
		// $id = "832";
		$data = array(
			// 'postcategoryid' => $id,
			'json_id' => $id
		);
		// print_r($data);die();
		$payload = json_encode($data);
		// Attach encoded JSON string to the POST fields
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
		// Set the content type to application/json
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json',
		   'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiODZmODQ1OTA4OTM4OWZjNjc3NmI1OWE4NTFiZGFjOTcwNDc0YjQ5YzIyZGZjMWFiZmYxYWFkYzRiOTc2N2NmYjA2ZGM2Mjg3NWQ2ZmM4YjUiLCJpYXQiOjE2NjQ1Mjk1NTUsIm5iZiI6MTY2NDUyOTU1NSwiZXhwIjoxNjk2MDY1NTU1LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.TGFywDT34Zd7ueWUfCVFuAyrS7fGJAUK-xkke07H6AburzlNNkViZGm41d7uDRW_lRBMEl64LvfJMC9VrqSgX3NZTpmv5Llz74xJWIlRMiKevHaKgEeTH5hxcnGAc_3i2Get8Gz4PntENtTQvLYmbB-fPIGlSvP9W06q-x-oApqe6UdNsWviXoN7aEXQi_LFSt53P-tpUvNQK4rUR6nebZ8Mta300jjXW3qtXBLqfR5mApGSPDMcMYQYRNy3eoDm7VGF1L-ssNVASIQkATH7r4fCYfVd9RMGiJqax0E1gnIWG1Hls6LxZAwNAUy7MtOoG0e_TqS0MlwD5yI-U3YbeCaQKVKojlGZMJe21vieUtfe6LMmrOl7ikSWUmJGrTXOqJBsBIFrF9mcWFL3-PUUM-oeN78Iia9hpfId2ke1RSe5mKQ4jELHpdkhS5TxR8T9Yg2lSS38QUbXd4AM7IpdIsHBP1X8pIF6dldD1xiNpp6HniPDOTGzBZMYOhW2N6z0Th6NWepKTjfA67ab-XvK-v2v1nolL81Fa85V5xz02fa4iZzMFreW5UiKBnUBVrdzNvezc7mOL14_9r5K2yE4lMwQsh-817yH21Dz6HCO_OYUfUO4-pPkM4LvjYJYsvI6G2FgOH3ly4yAlDjY2j6I039klXWQ6XUly3zG-qm2zZI'));

		// Return response instead of outputting
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// Execute the POST request
		$response = curl_exec($ch);
		file_put_contents($my_save_dir.$id.".json", $response);
		//code
		$array1 = json_decode($response, true);
		// foreach($array1['data']['text_json'] as $row1) 
		// {
		// 	// print_r($row1);die();
		// 	// $get_title = $row[''];
		// 	// $dir = str_replace(' ', '_', $get_title);
		// 	$font = "http://165.232.147.81/postmaker/public/font/".$row1['fontPath'];
		// 	// $imgUrl = str_replace(' ', '%20', $font);
		// 	$ch1 = curl_init($font);
		// 	$filename1 = basename($font);
		// 	$complete_save_loc1 = $my_save_dir . $filename1;

		// 	$fp1 = fopen($complete_save_loc1, 'wb');

		// 	curl_setopt($ch1, CURLOPT_FILE, $fp1);
		// 	curl_setopt($ch1, CURLOPT_HEADER, 0);
		// 	curl_exec($ch1);
		// 	curl_close($ch1);
		// 	fclose($fp1);
		// 	// echo '<h1>Durga_Puja Kanda. </h1>';
		// 	echo "$font";
		// }
		// foreach($array1['data']['sticker_json'] as $row2) 
		// {
		// 	// print_r($row1);die();
		// 	// $get_title = $row['post_category_id'];
		// 	// $dir = str_replace(' ', '_', $get_title);
		// 	$sticker = "http://165.232.147.81/postmaker/public/template_json_image/".$row2['sticker_image'];
		// 	// $imgUrl = str_replace(' ', '%20', $vid_thumb);
		// 	$ch2 = curl_init($sticker);
		// 	$filename2 = basename($sticker);
		// 	$complete_save_loc2 = $my_save_dir . $filename2;

		// 	$fp2 = fopen($complete_save_loc2, 'wb');

		// 	curl_setopt($ch2, CURLOPT_FILE, $fp2);
		// 	curl_setopt($ch2, CURLOPT_HEADER, 0);
		// 	curl_exec($ch2);
		// 	curl_close($ch2);
		// 	fclose($fp2);
		// 	// echo '<h1>Durga_Puja Kanda. </h1>';
		// 	echo "$sticker";
		// }
		// die();
		if(curl_error($ch)){
		    echo 'Request Error:' . curl_error($ch);
		}else{
		    print_r($response);
		}
		curl_close($ch);	
	}
}   
?>