<?php

	set_time_limit(5000);
	// json file name
    $filename = "test.json";
    
    // Read the JSON file in PHP
    $data = file_get_contents($filename); 
    
    // Convert the JSON String into PHP Array
    $array = json_decode($data, true); 
	
	$ar=array();
    foreach($array['data'] as $row) 
	{
		// print_r($row);die();
		// $categoryname=$row['id'];
	// 	foreach($row['tags'] as $ad)
	// 	{
		
		$imgUrl = $row['post_content'];
		// $imgUrl = str_replace(' ', '%20', $row['image']);
		// $imgUrl="https://images.unsplash.com/photo-1619360142632-031d811d1678?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb";

		// $dir = str_replace(' ', '_', $row['title']);
		// $dir2= $row['product_name'];
		// mkdir("new_year/".$dir);
		$my_save_dir = "political_dp/";
		// mkdir("new_year/".$dir."/data_frame");
		// $my_save_dir = "new_year/"."$dir"."/data_frame/";
		// $no = $row['frame_number'];
		// $fold = $row['folder'];
		// for ($i=1; $i<=$no; $i++)
		// {
		// 	$imgUrl="https://frame.maxproapp.us/public/Frame/".$fold."/".$i.".webp";
		// 	// print_r($imgUrl);die();	
		// 	$ch = curl_init($imgUrl);
		// 	$filename = basename($imgUrl);
		// 	$complete_save_loc = $my_save_dir . $filename;

		// 	$fp = fopen($complete_save_loc, 'wb');

		// 	curl_setopt($ch, CURLOPT_FILE, $fp);
		// 	curl_setopt($ch, CURLOPT_HEADER, 0);
		// 	curl_exec($ch);
		// 	curl_close($ch);
		// 	fclose($fp);
		// 	echo '<h1>Lasun Kanda. </h1>';
		// 	echo $imgUrl;
		// }
		// $imgUrl = "https://".str_replace(" ","%20",$ad['custom_field_value']);
		// $imgUrl = substr($variable, 0, strpos($variable, "?"));
		// $imgUrl="https://frame.maxproapp.us/public/".$row['image'];
		// print_r($imgUrl);die();	
		$ch = curl_init($imgUrl);
		$filename = basename($imgUrl);
		$complete_save_loc = $my_save_dir . $filename;

		$fp = fopen($complete_save_loc, 'wb');

		curl_setopt($ch, CURLOPT_FILE, $fp);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_exec($ch);
		curl_close($ch);
		fclose($fp);
		echo '<h1>Lasun Kanda. </h1>';
		echo $imgUrl;
			
	// 	}
	}
?>