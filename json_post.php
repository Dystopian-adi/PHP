<?php
set_time_limit(5000);
// json file name
$filename = "poster.json";

// Read the JSON file in PHP
$data = file_get_contents($filename); 

// Convert the JSON String into PHP Array
$array = json_decode($data, true); 

foreach($array['data'] as $row) 
{

	$dir = $row['cat_name'];
	$cat_id = $row['cat_id'];
	$c_id = "" . $cat_id . "";
	// $c_id = (int)$cat_id;
	for($i=0;$i < count($row['poster_list']);$i++)
	{	
		// echo $i;
		$post_id = $row['poster_list'][$i]['post_id'];
		// print_r($post_id);die();
		$p_id = "" . $post_id . "";
		// $p_id = (int)$post_id;
		$url = "http://threemartians.com/poster1/API/V1/poster/poster";

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$headers = array(
		   "Content-Type: multipart/form-data",
		);

		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$data = [
		    'key' => 'E~A!I4tDq^RDmCnV',
		    'device' => 1,
		    'cat_id' => $c_id,
		    'post_id' => $p_id
		];

		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		// Return response instead of outputting
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// Execute the POST request
		$response = curl_exec($ch);
		//code
		$ar = json_decode($response, true);
		foreach ($ar['data'] as $key) 
		{
			//do something
			mkdir("poster/".$dir);
			$dir1 = "poster_".$p_id;
			mkdir("poster/".$dir."/".$dir1);
			$my_save_dir = "poster/"."$dir"."/"."$dir1"."/";

			$imgUrl = $key['post_thumb'];
			// print_r($imgUrl);die();	
			$ch0 = curl_init($imgUrl);
			// $filename = basename($imgUrl);
			$filename = "post_thumb.jpg"; 
			$complete_save_loc = $my_save_dir . $filename;

			$fp = fopen($complete_save_loc, 'wb');

			curl_setopt($ch0, CURLOPT_FILE, $fp);
			curl_setopt($ch0, CURLOPT_HEADER, 0);
			curl_exec($ch0);
			curl_close($ch0);
			fclose($fp);
			echo 'thumb';

			$b_img = $key['back_image'];
			// print_r($imgUrl);die();	
			$ch1 = curl_init($b_img);
			// $filename1 = basename($b_img);
			$filename1 = "back_image.jpg";
			$complete_save_loc1 = $my_save_dir . $filename1;

			$fp1 = fopen($complete_save_loc1, 'wb');

			curl_setopt($ch1, CURLOPT_FILE, $fp1);
			curl_setopt($ch1, CURLOPT_HEADER, 0);
			curl_exec($ch1);
			curl_close($ch1);
			fclose($fp1);
			echo 'back_image';

			for($j=0;$j < count($key['sticker_info']);$j++)
			{	
				$st_img = "http://threemartians.com/poster1/".$key['sticker_info'][$j]['st_image'];
				// echo "$st_img";die();
				$ch2 = curl_init($st_img);
				// $filename2 = basename($st_img);
				$filename2 = "sticker_".$j.".png";
				$complete_save_loc2 = $my_save_dir . $filename2;

				$fp2 = fopen($complete_save_loc2, 'wb');

				curl_setopt($ch2, CURLOPT_FILE, $fp2);
				curl_setopt($ch2, CURLOPT_HEADER, 0);
				curl_exec($ch2);
				curl_close($ch2);
				fclose($fp2);
				echo 'st_image';
			}	
		}
		$getUrl = json_encode($ar,JSON_PRETTY_PRINT);
		// $json = file_get_contents($getUrl);
  		$file = fopen( __DIR__ ."/".$my_save_dir.'json.json','w');
		fwrite($file, $getUrl);
		fclose($file);
		echo 'Json/';

		if(curl_error($ch)){
			echo 'Request Error:' . curl_error($ch);
		}else{
		    // print_r($response);die();
		}	
		curl_close($ch);
	}
	
}
?>

