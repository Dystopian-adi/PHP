<?php
set_time_limit(100000);
// json file name
$filename = "links.json";
// Read the JSON file in PHP
$data = file_get_contents($filename); 
// Convert the JSON String into PHP Array
$array = json_decode($data, true);
foreach ($array['data'] as $value) 
{
	$dir1 = $value['title'];
	echo $dir1."\n";
	// mkdir("something/".$dir1);
	$my_save_dir = "something/"."$dir1"."/";
	$ch = curl_init();
	$url = $value['link'];
	// $id = "" . $i . "";
	// $dataArray = [
	// 	'method' => 'getRadios',
	// 	];
	// $data = http_build_query($dataArray);
	// $getUrl = $url."?".$data;

	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_URL, $url);
	   
	$response = curl_exec($ch);
	// $data = file_get_contents($response); 
	// Convert the JSON String into PHP Array
	// $array = json_decode($data, true); 
	$pattern = '~[a-z]+://\S+~';
	$str = $response;
	if($num_found = preg_match_all($pattern, $str, $out))
	{
		// echo "FOUND ".$num_found." LINKS:\n";
		$ar = json_decode($response, true);
		foreach($out as $row) 
		{
			// $dir = $row['name'];
			// mkdir("sleep_story/".$dir);
			// $my_save_dir = "sleep_story/"."$dir"."/";
			for($i=0;$i<count($row);$i++)
			{
				$imgUrl = $row[$i];
				// $imgUrl = str_replace(' ', '%20', $plant_thumb);
				$ch3 = curl_init($imgUrl);
				$filename = $i."_".basename($imgUrl);
				$complete_save_loc = $my_save_dir . $filename;

				$fp = fopen($complete_save_loc, 'wb');

				curl_setopt($ch3, CURLOPT_FILE, $fp);
				curl_setopt($ch3, CURLOPT_HEADER, 0);
				curl_exec($ch3);
				curl_close($ch3);
				fclose($fp);
				// echo 'lasun/';
				echo $row[$i]."\n";
			}
		}    
	}
	if(curl_error($ch)){
	    echo 'Request Error:' . curl_error($ch);
	}else{
	    // echo $response;
	}
	curl_close($ch);
}
  
?>