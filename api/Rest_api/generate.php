<?php
$con = mysqli_connect("localhost", "root", "", "cute_baby");
for ($i=1; $i <=30 ; $i++) 
{
	// $c_id=2;
	$name="overlay_".$i;	
	// $thumb="baby_thumb_".$i;
	// $bg="baby_bg_".$i;	
	// $h=1000;	
	// $w=1000;	
	// $isis=25;
	// $isis++;
	// $query = mysqli_query($con,"UPDATE `s_sub_cat` SET image='$name' WHERE in_sub_id = $isi");
	$query = mysqli_query($con,"INSERT INTO `overlay`(`overlay_data`) VALUES ('$name')");
		
}
?>