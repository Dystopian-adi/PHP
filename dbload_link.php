<?php
set_time_limit(100000);
$con = mysqli_connect("localhost", "root", "", "dv_catalog_app");
$sql = mysqli_query($con, "SELECT * FROM `dv_catalog_cat` ");
while($lasun = mysqli_fetch_assoc($sql))
{
	$name = $lasun['name'];
	$id = $lasun['id'];
	$dip = mysqli_query($con, "SELECT * FROM `dv_catalog_data` WHERE id = '$id' ");
	while($kanda = mysqli_fetch_assoc($dip))
	{
		$link = $kanda['link'];
		mkdir("somedata/".$name);
		$my_save_dir = "somedata/".$name."/";
		$ch = curl_init($link);
		$filename = basename($link);
		$complete_save_loc = $my_save_dir . $filename;

		$fp = fopen($complete_save_loc, 'wb');

		curl_setopt($ch, CURLOPT_FILE, $fp);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_exec($ch);
		curl_close($ch);
		fclose($fp);
		echo "Downloaded : ".$link."\n";
	} 
} 