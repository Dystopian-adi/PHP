<?php
$con = mysqli_connect("localhost", "root", "", "tl_photofun_cartoon_effect");
for($i=1;$i<=3;$i++){
	$sql = mysqli_query($con, "Select * 
	from 
	( 
	    SELECT t.*, @seq := @seq +1 seq 
	    FROM (select @seq:=0) initvar, tl_photofun_cartoon_effect_drip_bg_data t WHERE cat_id = '$i'
	    ORDER BY id
	) X 
	where seq <= (0.4 * @seq); ");
	// $sql = mysqli_query($con, "SELECT * FROM `tbl_ringtone` WHERE `premium` = '';");
	while($row = mysqli_fetch_assoc($sql))
	{
		$id = $row['id'];
		// $update = mysqli_query($con, "UPDATE `tbl_ringtone` SET `premium`='false' WHERE id = '$id' ");
		echo "UPDATE `tl_photofun_cartoon_effect_drip_bg_data` SET `isPremium`='true' WHERE id = '$id';"."\n";
		// echo "Updated : ".$id."\n";
	}
}
?>