<?php
$con = mysqli_connect("localhost", "root", "", "js_plant_app");
// $mydir = "./gujrati_new/".$name."/";
$mydir = "./plant_blogs/";
// print_r($mydir);
// Scanning files in a given directory in unsorted order
$myfiles = scandir($mydir, SCANDIR_SORT_ASCENDING);
$mine = array_diff($myfiles, ['..', '.']);
// Displaying the files in the directory
foreach($mine as $key)
{
	if(is_dir("$mydir/$key"))
	{
		echo $key."/";
		$key1 = str_replace("'", "\'", $key);
		$thumbdir = "./plant_blogs/".$key."/thumb/";
		$inthumb = scandir($thumbdir, SCANDIR_SORT_ASCENDING);
      	$ismine = array_diff($inthumb, ['json.json']);
		foreach ($ismine as $thu) 
		{
			if(!is_dir("$thumbdir/$thu"))
			{
				echo $thu."/";
				// die();
				// $key2 = str_replace("'", "\'", $thu);
				// echo "INSERT INTO `js_plant_blogs_details`(`cat_name`, `thumb`) VALUES ('$key1','$thu')";die();
		        $query = mysqli_query($con,"INSERT INTO `js_plant_blogs`(`blog_title`, `blog_thumb`) VALUES ('$key1','$thu')");
			}
		}

  //       $inmydir = "./plant_blogs/".$key."/images/";
		// $inmyfiles = scandir($inmydir, SCANDIR_SORT_ASCENDING);
		// foreach ($inmyfiles as $inkey) 
		// {
		// 	if(!is_dir("$inmydir/$inkey"))
		// 	{
		// 		// echo $inkey."/";
		// 		// die();
		// 		// $key2 = str_replace("'", "\'", $inkey);
		// 		echo "INSERT INTO `js_plant_blogs_data`(`blog_id`, `blog_images`) VALUES ('','');";
  //       		// $inquery = mysqli_query($con,"INSERT INTO `js_plant_blogs_images`(`cat_id`, `images`) VALUES ('$i','$inkey');");
		// 	}
		// }
	}
}
?>