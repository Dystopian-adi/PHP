<?php
$con = mysqli_connect("localhost", "root", "", "dv_catalog_app");

set_time_limit(5000);

$filename = "catalog.json";

$data = file_get_contents($filename); 

$array = json_decode($data, true); 

foreach($array as $row) 
{
	// print_r($row['sounds']);die();
	$name = $row['name'];
	$photo = str_replace("http://45.77.170.169/app/music/photos/", "", $row['photo']);
	$idcm = $row['id_category_music'];

	$date = "INSERT INTO `dv_catalog_cat`(`name`, `photo`, `id_category_music`) VALUES ('$name','$photo','$idcm')";

	if ($con->query($date) === TRUE) 
	{
		$last_id = $con->insert_id;
		for($m=0;$m<count($row['sounds']);$m++)
		{
			$id_category_catalog = $row['sounds'][$m]['id_category_catalog'];
			$link = $row['sounds'][$m]['link'];
			$name1 = $row['sounds'][$m]['name'];
			$in_type = mysqli_query($con, "INSERT INTO `dv_catalog_data`(`id`, `id_category_catalog`, `link`, `name`) VALUES ('$last_id','$id_category_catalog','$link','$name1')");
		}
	}
	else
	{
		echo "Error: " . $date . "<br>" . $con->error;
	}
	// print_r($row);die();
}
?>