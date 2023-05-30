<?php
// $mydir = "./wall/".$name."/";
// $mydir = "./vi_shayari_app/thumb/";
// // print_r($mydir);
// // Scanning files in a given directory in unsorted order
// $myfiles = scandir($mydir, SCANDIR_SORT_ASCENDING);
// $mine = array_diff($myfiles, ['..', '.']);
// // Displaying the files in the directory
// foreach($mine as $key){
// 	if(!is_dir("$mydir/$key")){
		// $key1 = str_replace(".png", "", $key);
		$mydir1 = "./vi_shayari_app/data/";
		$filename = "data.json";
		$json_get = $mydir1.$filename;
		// Read the JSON file in PHP
		$data = file_get_contents($json_get); 
		// Convert the JSON String into PHP Array
		$array = json_decode($data, true);
		// print_r($array['Hashtags']['0']);die();
		$no=count($array['Hashtags']);
		$no =$no-1;
		for($i=0;$i<=$no;$i++)
		{
			$catPath = $array['Hashtags'][$i]['catPath'];
			// echo $catPath."_".$key1;die();
			// if($catPath == $key1) 
			// {
			$array['Hashtags'][$i]['catThumb'] = '/thumb/'.$catPath.'.png';       
			// }
			// else
			// {
			// 	echo "|_Delhi_Se_".$catPath."_Hu_BC_|";
			// }
		}
		$getUrl = json_encode($array,JSON_PRETTY_PRINT);
		// print_r($array);
		$file = fopen( __DIR__ .$mydir1.'json.json','w');
		fwrite($file, $getUrl);
		fclose($file);
		echo '\Json/';
	// }
// }
?>