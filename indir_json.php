<?php
$con = mysqli_connect("localhost", "root", "", "ax_poster_maker");
set_time_limit(5000);
for ($i=1; $i<=19; $i++) {
	$full_link = "footer_frame_1/frame_".$i."/";
	// json file name
	$filename = $full_link."json.json";

	// Read the JSON file in PHP
	$data = file_get_contents($filename); 

	// Convert the JSON String into PHP Array
	$array = json_decode($data, true); 
	// print_r($array);

	$cat_id=$i;
	foreach ($array['data'] as $key) {
		$back_image = $key['back_image'];
	    $height = $key['height'];                
	    $width = $key['width'];

	    $lasun = "INSERT INTO `ax_poster_frame_sub_category`(`sub_id`, `cat_id`, `frame_data`, `height`, `width`) VALUES ('NULL','$cat_id','$back_image','$height','$width')";
		echo "data/".$lasun;

	}

	foreach($array['sticker_info'] as $ad) 
	{
		// print_r($ad); 
		$st_image = $ad['st_image'];
		$sticker_id = $ad['sticker_id'];
        $st_x_pos = $ad['st_x_pos'];
        $st_y_pos = $ad['st_y_pos'];
        $st_width = $ad['st_width'];
        $st_height = $ad['st_height'];
        $st_rotation = $ad['st_rotation'];
        $st_res_id = $ad['st_res_id'];
        $st_res_uri = $ad['st_res_uri'];
        $st_order = $ad['st_order'];

		$query = "INSERT INTO `ax_poster_frame_sticker_info`(`ss_id`, `sub_id`, `sticker_id`, `st_x_pos`, `st_y_pos`, `st_width`, `st_height`, `st_rotation`, `st_res_id`, `st_res_uri`, `st_order`) VALUES ('NULL','$c_id','$sticker_id','$st_x_pos','$st_y_pos','$st_width','$st_height','$st_rotation','$st_res_id','$st_res_uri','$st_order')";
		echo "sticker_info/".$query;
	}
	foreach ($array['no_info'] as $adi) 
	{
		// print_r($adi); 
		// $c_id="2";
		$text_id = $adi['text_id'];
        // $text = $adi['text'];
        $font_family = $adi['font_family'];
        $txt_color = $adi['txt_color'];
        $txt_size = $adi['txt_size'];
        $txt_x_pos = $adi['txt_x_pos'];
        $txt_y_pos = $adi['txt_y_pos'];
        $txt_width = $adi['txt_width'];
        $txt_height = $adi['txt_height']; 
        $txt_rotation = $adi['txt_rotation'];
        $txt_align = $adi['txt_align'];
        $txt_order = $adi['txt_order'];

		$sql = "INSERT INTO `ax_poster_frame_no_info`(`t_id`, `sub_id`, `text_id`, `font_family`, `txt_color`, `txt_size`, `txt_x_pos`, `txt_y_pos`, `txt_width`, `txt_height`, `txt_rotation`, `txt_align`, `txt_order`) VALUES ('NULL','$c_id','$text_id','$font_family','$txt_color', '$txt_size','$txt_x_pos','$txt_y_pos','$txt_width','$txt_height','$txt_rotation','$txt_align','$txt_order')";
		echo "no_info/".$sql;exit();
	}
}
?>