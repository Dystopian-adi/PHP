<?php

	set_time_limit(5000);
	// json file name
    $filename = "templates.json";
    
    // Read the JSON file in PHP
    $data = file_get_contents($filename); 
    
    // Convert the JSON String into PHP Array
    $array = json_decode($data, true); 
	
	// $ar=array();
		$c = count($array['config']);
		for($i=0;$i<$c;$i++){
			foreach($array['config'][$i] as $key) {
				$c1 = count($key);
				for($j=0;$j<$c1;$j++){
					foreach ($key[$j] as $key1) {
						$c2 = count($key1);
						for($b=0;$b<$c2;$b++){
							print_r($key1[$b]['material-url']);
							// $dir = $key1[$b]['template_flag'];
							// // $dir = "Tie";
							// $dir2= $row['product_name'];
							// mkdir("sticker/".$dir);
							// $my_save_dir = "sticker/"."$dir"."/";
							// // mkdir("live_wallpaper/".$dir."/".$dir2."/");
							// // $my_save_dir = "live_wallpaper/".$dir."/".$dir2."/";

							// // $imgUrl = "http://lvlyapp.xyz/lvly/video1zip/Every%20Boys%20Player.zip";
							// $imgUrl = $row['image_url'];
							// // $imgUrl = substr($variable, 0, strpos($variable, "?"));
							// // print_r($imgUrl);die();	
							// $ch = curl_init($imgUrl);
							// $filename = basename($imgUrl);
							// $complete_save_loc = $my_save_dir . $filename;

							// $fp = fopen($complete_save_loc, 'wb');

							// curl_setopt($ch, CURLOPT_FILE, $fp);
							// curl_setopt($ch, CURLOPT_HEADER, 0);
							// curl_exec($ch);
							// curl_close($ch);
							// fclose($fp);
							// echo '<h1>Lasun Kanda.</h1>';
							// echo $imgUrl;
						}
					}	
				}
			}
		}

			// print_r($i);
		
		die();
 //    foreach($array['config'] as $row) 
	// {
	// 	foreach($row['Home Templates'] as $ad)
	// 	{
	// 		foreach($ad['templates'] as $xy)
	// 		{
			// print_r($xy);exit();

			// $link = $row['variations']['original']['url'];


			// $gdir = $xy['template_flag'];
			// $dir = "Tie";
			// // $dir2= $row['product_name'];
			// mkdir("sticker/".$dir);
			// $my_save_dir = "sticker/"."$dir"."/";
			// // mkdir("live_wallpaper/".$dir."/".$dir2."/");
			// // $my_save_dir = "live_wallpaper/".$dir."/".$dir2."/";

			// // $imgUrl = "http://lvlyapp.xyz/lvly/video1zip/Every%20Boys%20Player.zip";
			// $imgUrl = $row['image_url'];
			// // $imgUrl = substr($variable, 0, strpos($variable, "?"));
			// // print_r($imgUrl);die();	
			// $ch = curl_init($imgUrl);
			// $filename = basename($imgUrl);
			// $complete_save_loc = $my_save_dir . $filename;

			// $fp = fopen($complete_save_loc, 'wb');

			// curl_setopt($ch, CURLOPT_FILE, $fp);
			// curl_setopt($ch, CURLOPT_HEADER, 0);
			// curl_exec($ch);
			// curl_close($ch);
			// fclose($fp);
			// echo '<h1>Lasun Kanda.</h1>';
			// echo $imgUrl;

	  	// foreach($row['forYouFeed']['feedItems']['nodes'] as $dj) 
			// {
				// $ar = $dj['card']['post']['video'];
				// print_r($dj['card']['post']['video']);die();
				// $ar = $dj['card']['post']['video'];
				// foreach ($ar as $ad) 
				// {				
				// print_r($ar);
					
				// echo $dj['originUrl']."<br>";
	    		// exit();
	   			//$a = $dj['url'];
				// if (strpos($a, 's01.jpg')) {
				// 	$dir = $dj['url'];
				// 	mkdir("thumb/".$dir);
				// 	$my_save_dir = "thumb/"."$dir"."/";
				// }
				// $imgUrl = "http://com-earn-wallpaper.wallpaper.share-resource.com/wallPaper/animation/20220419/14/06/625e5168a2fc141984.mp4";

				// $dir2 = "Reels";
				// print_r($dir2);die();
				// mkdir("live_wallpaper/"."$dir"."/".$dir2);
				// mkdir("live_wallpaper/".$dir2);
				// $my_save_dir1 = "live_wallpaper/".$dir2."/";

				// print_r($my_save_dir1);die();


				// $imgUrl1 = $dj['fxUrl'];
				// $full_link1 = "".$dj['textureUrl'];
				// $imgUrl1 = $ar['originalUrl'];
				// print_r($imgUrl1);			
				// $ch1 = curl_init($imgUrl1);
				// $filename1 = basename($imgUrl1);
				// $complete_save_loc1 = $my_save_dir1 . $filename1;

				// $fp1 = fopen($complete_save_loc1, 'wb');

				// curl_setopt($ch1, CURLOPT_FILE, $fp1);
				// curl_setopt($ch1, CURLOPT_HEADER, 0);
				// curl_exec($ch1);
				// curl_close($ch1);
				// fclose($fp1);
				// echo 'Kurosu zo.';
				// echo $imgUrl1;
				// }
	    	// }
			// }
		// }
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