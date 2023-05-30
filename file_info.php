<?php
$con = mysqli_connect("localhost", "root", "", "test");
for ($i=1; $i<=72; $i++) 
{
	$insert_id = $i+896;
	echo $insert_id."->";
	$path = "/file_info/scenery/background_bg_".$i.".png";
	$ogpath = "file_info/scenery/";
	// print_r($path);

	//Show filename
	$name = basename($path);
	// echo $name;

	// //Show filename, but cut off file extension for ".php" files
	// echo basename($path,".php");

	$full = "./"."$ogpath"."$name";
	// echo "$full";
	// echo filesize($full)."/";

	$inbyte = filesize($full);
	$inkb = $inbyte/1024+1;
	$variable = substr($inkb, 0, strpos($inkb, "."));
	echo "$variable"."/";

	$query=mysqli_query($con,"UPDATE `tbl_4d_livewallpaper_ringtone_category_data` SET `size`='$variable' WHERE id = '$insert_id'");

}
?>