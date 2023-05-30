<?php
set_time_limit(10000);
$ch = curl_init();

$url = "https://prod.myplantin.com/v2-plant";
for ($i=33; $i<=100; $i++)
{
	$id = "" . $i . "";
    $dataArray = [
    	'page' => $id,
    	'count' => '20',
    	'query' => ''
		];
    $data = http_build_query($dataArray);
    $getUrl = $url."?".$data;
  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_URL, $getUrl);
       
    $response = curl_exec($ch);
    $array = json_decode($response, true);
	foreach($array['data'] as $row) 
	{
		$get_plant = $row['name'];
		$dir = str_replace(' ', '_', $get_plant);
		mkdir("plant/".$dir);
		// mkdir("jadugar_ravi_trending/".$dir."/thumb");
		$my_save_dir = "plant/"."$dir"."/";
		$plant_thumb = $row['image_url'];
		$imgUrl = str_replace(' ', '%20', $plant_thumb);
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

		$get_id = $row['id'];
		$ch2 = curl_init();
		$url1 = "https://prod.myplantin.com/v2-plant/".$get_id; 
		// echo $url1."<br>";
	    curl_setopt($ch2, CURLOPT_RETURNTRANSFER, TRUE);
	    curl_setopt($ch2, CURLOPT_URL, $url1);
	    $response1 = curl_exec($ch2);
	    $array1 = json_decode($response1, true);
		foreach($array1['plant']['images'] as $row1) 
		{
			$images = $row1;
			// mkdir("plant/".$dir);
			mkdir("plant/".$dir."/images");
			$my_save_dir1 = "plant/"."$dir"."/images/";
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

	 	// $json = file_get_contents($url1);
  		$file = fopen( __DIR__ ."/".$my_save_dir.'json.json','w');
		fwrite($file, $json);
		fclose($file);
  		curl_close($ch2);
		echo 'Json/';
    }    
    if(curl_error($ch)){
        echo 'Request Error:' . curl_error($ch);
    }else{
        // echo $response;
    }
}   
curl_close($ch);
  
?>