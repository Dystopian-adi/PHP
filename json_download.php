<?php

	set_time_limit(5000);
	// json file name
    $filename = "1.json";
    
    // Read the JSON file in PHP
    $data = file_get_contents($filename); 
    
    // Convert the JSON String into PHP Array
    $array = json_decode($data, true); 

    foreach($array as $row) 
	{
		// print_r($array['code']);exit();
		// print_r($row['userimage']);

		// $a = $row['wName'];
		$dir = str_replace(' ','_',$row['category_name']);
		$dir2= str_replace(' ','_',$row['product_name']);
		// print_r($dir);die();
		mkdir("minecraft_maps/".$dir);
		mkdir("minecraft_maps/".$dir."/".$dir2."/");
		$my_save_dir = "minecraft_maps/".$dir."/".$dir2."/";
		// $my_save_dir = "minecraft_maps/"."$dir"."/";

			$full_link = "https://kalvlad1994.ru/v2dddkuygiuo8ipedp89789009//upload/product/".$row['item_gallery'];
			$imgUrl = $full_link;
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
  		// foreach($row['stickers'] as $dj) 
		// {
			// print_r($dj['image_file_thum']);
			// echo $dj['originUrl']."<br>";
    		// exit();
   			//$a = $dj['url'];
			// if (strpos($a, 's01.jpg')) {
			// 	$dir = $dj['url'];
			// 	mkdir("thumb/".$dir);
			// 	$my_save_dir = "thumb/"."$dir"."/";
			// }
			// $imgUrl = "http://com-earn-wallpaper.wallpaper.share-resource.com/wallPaper/animation/20220419/14/06/625e5168a2fc141984.mp4";

			mkdir("minecraft_maps/".$dir."/".$dir2."/archive");
			$my_save_dir1 = "minecraft_maps/".$dir."/".$dir2."/archive/";

			// $imgUrl1 = $dj['image_file_thum'];
			$full_link1 = "https://kalvlad1994.ru/v2dddkuygiuo8ipedp89789009//upload/mods/".$row['item_archive_file'];
			$imgUrl1 = $full_link1;
			// print_r($imgUrl);die();			
			$ch1 = curl_init($imgUrl1);
			$filename1 = basename($imgUrl1);
			$complete_save_loc1 = $my_save_dir1 . $filename1;

			$fp1 = fopen($complete_save_loc1, 'wb');

			curl_setopt($ch1, CURLOPT_FILE, $fp1);
			curl_setopt($ch1, CURLOPT_HEADER, 0);
			curl_exec($ch1);
			curl_close($ch1);
			fclose($fp1);
			echo '<h1>dareka ore o Kurosu. </h1>';
			echo $imgUrl1;
    	// }	
	}
	// if (is_array($array) || is_object($array))
	// {
	// // foreach($array as $row) 
	// // {	                    
 
	// // }
	// }else
	// {
	// 	echo"lasun";
	// }
?>