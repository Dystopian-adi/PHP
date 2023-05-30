<?php
$con = mysqli_connect("localhost", "root", "", "video_maker");
set_time_limit(5000);
$filename = "lasun2.json";

$data = file_get_contents($filename); 

$array = json_decode($data, true); 
        
if (is_array($array) || is_object($array))
{
	foreach($array['data'] as $row) 
	{	
		// print_r($row);	
		$id = $row['id'];
		$category = strtolower($row['category']);
		foreach ($row['theme'] as $key) {
			// print_r($key);
			$th = "https://pixaloopsolution.com/video_maker/".$category."/thumb/";
			$im = "https://pixaloopsolution.com/video_maker/".$category."/video/";
			$thumb = str_replace($th, '', $key['thumb_url']);
			$image = str_replace($im, '', $key['image_url']);
			// echo $th;
			$sql = mysqli_query($con,"INSERT INTO `tbl_video_maker_data`(`cat_id`, `thumb`, `image`) VALUES ('$id','$thumb','$image')");
		}
	}     
}
else
{
	echo"lasun";
}
?>