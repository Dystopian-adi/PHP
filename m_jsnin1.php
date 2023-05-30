<?php
$con = mysqli_connect("localhost", "root", "", "rima_poster_maker");
set_time_limit(5000);
// for($i=1;$i<=21;$i++)
// {

// $path = "./hiring/json/hiring_".$i;
// $filename = $path.".json";
// json file name
$filename = "business_1.json";
// echo "$filename";die();

// Read the JSON file in PHP
$data = file_get_contents($filename); 

// Convert the JSON String into PHP Array
$array = json_decode($data, true); 
// print_r($array);die();
// foreach($array as $row) 
// {
	// print_r($array); die();


foreach ($array['data'] as $key) {
    $c_id = "3";
    $post_thumb = $key['back_image'];
    $pt = str_replace('_bg_', '_thumb_', $post_thumb);
    // print_r($pt);die();
	$back_image = $key['back_image'];
    $height = $key['height'];                
    $width = $key['width'];
    $ratio = $key['ratio'];

    // $lasun = mysqli_query($con,"INSERT INTO `rima_poster_maker_trend_data`(`cat_id`, `post_thumb`, `back_image`, `height`, `width`, `ratio`) VALUES ('$c_id', '$pt', '$back_image', '$height', '$width', '$ratio')");
    // $lasun1 = "INSERT INTO `rima_poster_maker_trend_data`(`cat_id`, `post_thumb`, `back_image`, `height`, `width`, `ratio`) VALUES ('$c_id', '$pt', '$back_image', '$height', '$width', '$ratio');";
    // echo "$lasun1";
}
$cat_id=3;
echo "$cat_id"."/";

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

	// $query = mysqli_query($con,"INSERT INTO `rima_poster_maker_trend_sticker_info`(`d_id`, `st_image`, `sticker_id`, `st_x_pos`, `st_y_pos`, `st_width`, `st_height`, `st_rotation`, `st_res_id`, `st_res_uri`, `st_order`) VALUES ('$cat_id', '$st_image', '$sticker_id', '$st_x_pos', '$st_y_pos', '$st_width', '$st_height', '$st_rotation', '$st_res_id', '$st_res_uri', '$st_order')");
        // $query1 = "INSERT INTO `rima_poster_maker_trend_sticker_info`(`d_id`, `st_image`, `sticker_id`, `st_x_pos`, `st_y_pos`, `st_width`, `st_height`, `st_rotation`, `st_res_id`, `st_res_uri`, `st_order`) VALUES ('$cat_id', '$st_image', '$sticker_id', '$st_x_pos', '$st_y_pos', '$st_width', '$st_height', '$st_rotation', '$st_res_id', '$st_res_uri', '$st_order');";
	// echo "$query1";
}
foreach ($array['text_info'] as $adi) 
{
	// print_r($adi); 
	// $c_id="2";
	$text_id = $adi['text_id'];
    $text = $adi['text'];
    $font_family = $adi['font_family'];
    $font_familyI = "";
    $txt_color = $adi['txt_color'];
    $txt_alpha = "";
    // $txt_size = $adi['txt_size'];
    // $txt_size = "";
    $txt_x_pos = $adi['txt_x_pos'];
    $txt_y_pos = $adi['txt_y_pos'];
    $txt_width = $adi['txt_width'];
    $txt_height = $adi['txt_height']; 
    $txt_bg_imag = "";
    $txt_align = $adi['txt_align'];
    $txt_rotation = $adi['txt_rotation'];
    $txt_order = $adi['txt_order'];

	$sql = mysqli_query($con,"INSERT INTO `rima_poster_maker_trend_text_info`(`d_id`, `text_id`, `text`, `font_family`, `font_familyI`, `txt_color`, `txt_alpha`, `txt_x_pos`, `txt_y_pos`, `txt_width`, `txt_height`, `txt_bg_imag`, `txt_align`, `txt_rotation`, `txt_order`) VALUES ('$cat_id', '$text_id', '$text', '$font_family', '$font_familyI', '$txt_color', '$txt_alpha', '$txt_x_pos', '$txt_y_pos', '$txt_width', '$txt_height', '$txt_bg_imag', '$txt_align', '$txt_rotation', '$txt_order')");
        // $sql = "INSERT INTO `rima_poster_maker_trend_text_info`(`d_id`, `text_id`, `text`, `font_family`, `font_familyI`, `txt_color`, `txt_alpha`, `txt_x_pos`, `txt_y_pos`, `txt_width`, `txt_height`, `txt_bg_imag`, `txt_align`, `txt_rotation`, `txt_order`) VALUES ('$cat_id', '$text_id', '$text', '$font_family', '$font_familyI', '$txt_color', '$txt_alpha', '$txt_x_pos', '$txt_y_pos', '$txt_width', '$txt_height', '$txt_bg_imag', '$txt_align', '$txt_rotation', '$txt_order');";
	// echo "$sql";
}
// }
?>