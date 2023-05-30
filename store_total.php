<?php
$con = mysqli_connect("localhost", "root", "", "store_api");
set_time_limit(5000);
// json file name
$filename = "sticker.json";
// Read the JSON file in PHP
$data = file_get_contents($filename); 
// Convert the JSON String into PHP Array
$array = json_decode($data, true); 
$sql = mysqli_query($con, "SELECT * FROM `store_sticker_category`");
while($result = mysqli_fetch_assoc($sql)) 
{
	$cat = $result['cat_name'];
	foreach($array as $key) 
	{
		// print_r($key);
		for($i=0; $i < count($key) ; $i++) 
		{ 
			$get = $key[$i][$cat];
			// print_r($get);
			if(strpos($get, '(') == true)
			{
				$get = str_replace(" ", "", $get);
				$get_total = explode("(",$get);
				$name = $get_total[0];
				$total = str_replace(")", "", $get_total[1]);
				$name = str_replace("'", "\'", $name); 
				echo "In ".$cat." of ".$get_total[0]." the total is :".$total."\n";
				// echo "UPDATE `store_sticker_sub_cat_data` SET `total` = '$total' WHERE name = '$name';"."\n";
				$update = mysqli_query($con, "UPDATE `store_sticker_sub_cat_data` SET `total` = '$total' WHERE name = '$name';");
			}

			// else
			// {
			// 	echo $get." Does not have ( \n";
			// }
		}
	}
}
?>