<?php
$con = mysqli_connect("localhost", "root", "", "ax_poster_maker");
set_time_limit(5000);
for($i=1;$i<=19;$i++)
{

$path = "./footer_data/logo_no_add/frame_".$i;
// json file name
$filename = $path."/json.json";
// $filename = "love_1.json";
echo "$filename";

// Read the JSON file in PHP
$data = file_get_contents($filename); 

// Convert the JSON String into PHP Array
$array = json_decode($data, true); 
// print_r($array);die();
// foreach($array as $row) 
// {
	// print_r($array); die();


foreach ($array['data'] as $key) {
    $c_id = "1";
    // $post_thumb = $key['post_thumb'];
	// $back_image = $key['back_image'];
    $height = $key['height'];                
    $width = $key['width'];
    // $ratio = $key['ratio'];

    $lasun = mysqli_query($con,"INSERT INTO `ax_poster_frame_sub_category`(`cat_id`, `frame_data`, `height`, `width`) VALUES ('$c_id','$i','$height','$width')");
    // $lasun1 = "INSERT INTO `rima_poster_maker_cat`(`cat_id`, `data`, `height`, `width`, `ratio`) VALUES (NULL,'$back_image','$height','$width','$ratio')";
    // echo "$lasun1";
}
$cat_id=19+$i;

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

	$query = mysqli_query($con,"INSERT INTO `ax_poster_frame_sticker_info`(`sub_id`, `sticker_id`, `st_x_pos`, `st_y_pos`, `st_width`, `st_height`, `st_rotation`, `st_res_id`, `st_res_uri`, `st_order`) VALUES ('$cat_id', '$sticker_id', '$st_x_pos', '$st_y_pos', '$st_width', '$st_height', '$st_rotation', '$st_res_id', '$st_res_uri', '$st_order')");
        // $query1 = "INSERT INTO `ax_poster_frame_sticker_info`(`sub_id`, `sticker_id`, `st_x_pos`, `st_y_pos`, `st_width`, `st_height`, `st_rotation`, `st_res_id`, `st_res_uri`, `st_order`) VALUES ('$cat_id', '$sticker_id', '$st_x_pos', '$st_y_pos', '$st_width', '$st_height', '$st_rotation', '$st_res_id', '$st_res_uri', '$st_order')";
	// echo "$query1";
}
foreach ($array['no_info'] as $adi) 
{
	// print_r($adi); 
	// $c_id="2";
	$text_id = $adi['text_id'];
    $text = $adi['text'];
    $font_family = $adi['font_family'];
    $txt_color = $adi['txt_color'];
    $txt_size = $adi['txt_size'];
    // $txt_size = "";
    $txt_x_pos = $adi['txt_x_pos'];
    $txt_y_pos = $adi['txt_y_pos'];
    $txt_width = $adi['txt_width'];
    $txt_height = $adi['txt_height']; 
    $txt_rotation = $adi['txt_rotation'];
    // $txt_bg_imag = $adi['txt_bg_imag'];
    $txt_align = $adi['txt_align'];
    $txt_order = $adi['txt_order'];

	$sql = mysqli_query($con,"INSERT INTO `ax_poster_frame_no_info`(`sub_id`, `text_id`, `text`, `font_family`, `txt_color`, `txt_size`, `txt_x_pos`, `txt_y_pos`, `txt_width`, `txt_height`, `txt_rotation`, `txt_align`, `txt_order`) VALUES ('$cat_id', '$text_id', '$text', '$font_family', '$txt_color', '$txt_size', '$txt_x_pos', '$txt_y_pos', '$txt_width', '$txt_height', '$txt_rotation', '$txt_align', '$txt_order')");
        // $sql = "";
	// echo "$sql";
}
foreach ($array['company_name'] as $adi)
{
	// print_r($adi); 
	// $c_id="2";
	$text_id = $adi['text_id'];
    $text = $adi['text'];
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

	$sql = mysqli_query($con,"INSERT INTO `ax_poster_frame_company_name`(`sub_id`, `text_id`, `text`, `font_family`, `txt_color`, `txt_size`, `txt_x_pos`, `txt_y_pos`, `txt_width`, `txt_height`, `txt_rotation`, `txt_align`, `txt_order`) VALUES ('$cat_id','$text_id','$text','$font_family','$txt_color', '$txt_size','$txt_x_pos','$txt_y_pos','$txt_width','$txt_height','$txt_rotation','$txt_align','$txt_order')");
        // $sql1 = "INSERT INTO `ax_poster_frame_company_name`(`t_id`, `sub_id`, `text_id`, `font_family`, `txt_color`, `txt_size`, `txt_x_pos`, `txt_y_pos`, `txt_width`, `txt_height`, `txt_rotation`, `txt_align`, `txt_order`) VALUES ('NULL','$c_id','$text_id','$font_family','$txt_color', '$txt_size','$txt_x_pos','$txt_y_pos','$txt_width','$txt_height','$txt_rotation','$txt_align','$txt_order')";
	// echo "$sql1";
}
foreach ($array['address_info'] as $adi) 
{
	// print_r($adi); 
	// $c_id="2";
	$text_id = $adi['text_id'];
    $text = $adi['text'];
    $txt_color = $adi['txt_color'];
    $font_family = $adi['font_family'];
    $txt_size = $adi['txt_size'];
    $txt_x_pos = $adi['txt_x_pos'];
    $txt_y_pos = $adi['txt_y_pos'];
    $txt_width = $adi['txt_width'];
    $txt_height = $adi['txt_height']; 
    $txt_rotation = $adi['txt_rotation'];
    $txt_align = $adi['txt_align'];
    $txt_order = $adi['txt_order'];

	$sql = mysqli_query($con,"INSERT INTO `ax_poster_frame_address_info`(`sub_id`, `text_id`, `text`, `font_family`, `txt_color`, `txt_size`, `txt_x_pos`, `txt_y_pos`, `txt_width`, `txt_height`, `txt_rotation`, `txt_align`, `txt_order`) VALUES ('$cat_id', '$text_id', '$text', '$font_family', '$txt_color', '$txt_size', '$txt_x_pos', '$txt_y_pos', '$txt_width', '$txt_height', '$txt_rotation', '$txt_align', '$txt_order')");
        // $sql1 = "";
	// echo "$sql1";
}
// foreach ($array['gmail_info'] as $adi) 
// {
// 	// print_r($adi); 
// 	// $c_id="2";
// 	$text_id = $adi['text_id'];
//         // $text = $adi['text'];
//         $font_family = $adi['font_family'];
//         $txt_size = $adi['txt_size'];
//         $txt_x_pos = $adi['txt_x_pos'];
//         $txt_y_pos = $adi['txt_y_pos'];
//         $txt_width = $adi['txt_width'];
//         $txt_height = $adi['txt_height']; 
//         $txt_rotation = $adi['txt_rotation'];
//         $txt_align = $adi['txt_align'];
//         $txt_order = $adi['txt_order'];

// 	// $sql = mysqli_query($con,"INSERT INTO `ax_poster_frame_email_info`(`t_id`, `sub_id`, `text_id`, `font_family`, `txt_color`, `txt_size`, `txt_x_pos`, `txt_y_pos`, `txt_width`, `txt_height`, `txt_rotation`, `txt_align`, `txt_order`) VALUES ('NULL','$c_id','$text_id','$font_family','$txt_color', '$txt_size','$txt_x_pos','$txt_y_pos','$txt_width','$txt_height','$txt_rotation','$txt_align','$txt_order')");
//         $sql1 = "INSERT INTO `ax_poster_frame_email_info`(`t_id`, `sub_id`, `text_id`, `font_family`, `txt_color`, `txt_size`, `txt_x_pos`, `txt_y_pos`, `txt_width`, `txt_height`, `txt_rotation`, `txt_align`, `txt_order`) VALUES ('NULL','$c_id','$text_id','$font_family','$txt_color', '$txt_size','$txt_x_pos','$txt_y_pos','$txt_width','$txt_height','$txt_rotation','$txt_align','$txt_order')";
// 	echo "$sql1";
// }
// foreach ($array['site_info'] as $adi) 
// {
// 	// print_r($adi); 
// 	// $c_id="2";
// 	$text_id = $adi['text_id'];
//         // $text = $adi['text'];
//         $font_family = $adi['font_family'];
//         $txt_size = $adi['txt_size'];
//         $txt_x_pos = $adi['txt_x_pos'];
//         $txt_y_pos = $adi['txt_y_pos'];
//         $txt_width = $adi['txt_width'];
//         $txt_height = $adi['txt_height']; 
//         $txt_rotation = $adi['txt_rotation'];
//         $txt_align = $adi['txt_align'];
//         $txt_order = $adi['txt_order'];

// 	// $sql = mysqli_query($con,"INSERT INTO `ax_poster_frame_website_info`(`t_id`, `sub_id`, `text_id`, `font_family`, `txt_color`, `txt_size`, `txt_x_pos`, `txt_y_pos`, `txt_width`, `txt_height`, `txt_rotation`, `txt_align`, `txt_order`) VALUES ('NULL','$c_id','$text_id','$font_family','$txt_color', '$txt_size','$txt_x_pos','$txt_y_pos','$txt_width','$txt_height','$txt_rotation','$txt_align','$txt_order')");
//         $sql1 = "INSERT INTO `ax_poster_frame_website_info`(`t_id`, `sub_id`, `text_id`, `font_family`, `txt_color`, `txt_size`, `txt_x_pos`, `txt_y_pos`, `txt_width`, `txt_height`, `txt_rotation`, `txt_align`, `txt_order`) VALUES ('NULL','$c_id','$text_id','$font_family','$txt_color', '$txt_size','$txt_x_pos','$txt_y_pos','$txt_width','$txt_height','$txt_rotation','$txt_align','$txt_order')";
// 	// echo "$sql1";
// }
// }
}
?>