<?php
$con = mysqli_connect("localhost", "root", "", "ax_poster_maker");
set_time_limit(10000);
// json file name
$filename = "book_hindi.json";

// Read the JSON file in PHP
$data = file_get_contents($filename); 

// Convert the JSON String into PHP Array
$array = json_decode($data, true); 

foreach($array['data'] as $row) 
{
	// print_r($row['name']);die();
	$date = $row['date'];
	$newDate = date("Y-m-d", strtotime($date));
	$nava = $row['name'];
	$name = str_replace("'", "\'", $row['name']);
	$query = mysqli_query($con, "SELECT  `cat_name` FROM `ax_poster_upcoming_thumb`");
	while ($row=mysqli_fetch_assoc($query)) {
		$cat_name = $row['cat_name'];
		$thumb = $row['cat_name'].".png";
			
		}
		if($cat_name != $nava) {
		// $sql = mysqli_query($con,"UPDATE `ax_poster_frame_main_banner` SET `date`='$newDate' WHERE cat_name = '$name';");
		echo "UPDATE `ax_poster_upcoming_thumb` SET `date`='$newDate' WHERE cat_name = '$name';";
		// echo "INSERT INTO `ax_poster_upcoming_thumb`(`cat_name`, `thumb`) VALUES ('$cat_name','$thumb');";
		// $sql = mysqli_query($con,"INSERT INTO `ax_poster_upcoming_thumb`(`cat_name`, `thumb`) VALUES ('$cat_name','$thumb')");
	}
}
?>