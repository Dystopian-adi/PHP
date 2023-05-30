<?php
$con = mysqli_connect("localhost", "root", "", "store_api");
$sql = mysqli_query($con, "SELECT * FROM `store_body_category` ");
while($lasun = mysqli_fetch_assoc($sql))
{
	$name = $lasun['cat_name'];
	$id = $lasun['cat_id'];

	$mydir = "./body/".$name."/";
	$myfiles = scandir($mydir, SCANDIR_SORT_ASCENDING);
    $mine = array_diff($myfiles, ['..', '.']);
    foreach($mine as $key)
    {
    	if(is_dir("$mydir/$key"))
    	{
    		echo $key."\n";
    		$full = "$mydir"."$key"."/".$key.".zip";
			// echo "$full";
			// echo filesize($full)."/";

			$inbyte = filesize($full);
			$inkb = $inbyte/1024+1;
			$variable = substr($inkb, 0, strpos($inkb, "."));
			echo "$variable"."\n";

			$query=mysqli_query($con,"UPDATE `store_body_sub_cat_data` SET `zip_size`='$variable' WHERE name = '$key'");
    	}
    }
}