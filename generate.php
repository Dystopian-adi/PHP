<?php
$con = mysqli_connect("localhost", "root", "", "ax_art_editor");
// $sss = mysqli_query($con, "SELECT * FROM `dip_police_photo_suite_category`");
// while ($la = mysqli_fetch_assoc($sss)) {
// $name=$la['name'];
// $c_id=$la['cat_id'];
// $s_id=$c_id+4;
// if($name=="men") {
// 	$no=18;
// }
// else{
//  $no=10;
// }
for ($i=1; $i<=60; $i++) 
{

	// print_r($a);
	// $cat_id="12";
	// $name = "a";
	// $lasun = "000".$i;
	// $thumb="chinese_".$name."_suit_thumb_".$i;
	// $data="chinese_".$name."_suit_".$i;	
	// $bg="weather_0".$i.".jpg";	
	$bg1="frame_".$i.".png";
	// $h=1000;	
	// $w=1000;	
	// $isis=25;
	// $isis++;

		// $dir = "Racing";
		// // $dir2= $row['product_name'];
		// mkdir("wallpapers_data/".$dir);
		// $my_save_dir = "wallpapers_data/"."$dir"."/";
		// // mkdir("wallpapers_data/".$dir."/".$dir2."/");
		// // $my_save_dir = "wallpapers_data/".$dir."/".$dir2."/";

		// 	$full_link = "https://d36660josyxojl.cloudfront.net/res/11/wallpaper/dynamic/Racing/Racing_".$i."_video.mov";
		// 	$imgUrl = $full_link;
		// 	// print_r($imgUrl);		
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

	// $sql =  mysqli_query($con,"SELECT * FROM picslide_details WHERE pics_id % 2 != 0");
	// while ($adi = mysqli_fetch_assoc($sql)) {
	// $a= mt_rand(1,5).".".mt_rand(0,9)."M";
		
	// 	$id = $adi['pics_id'];
	// 	// print_r($id);
	// $query = mysqli_query($con,"UPDATE `picslide_details` SET `views`='$a' where `pics_id` = '$id'");
	// echo "UPDATE `picslide_details` SET `views`='$a' where `pics_id` = '$id'";
	// }
	$query = mysqli_query($con,"INSERT INTO `ax_art_editor_profile_data`(`data`) VALUES ('$bg1');");
	// $query = mysqli_query($con,"INSERT INTO `rima_poster_maker_sticker_data`(`c_id`, `sticker`) VALUES ('$cat_id','$i')");
	// echo ""; 
}
// }
?>