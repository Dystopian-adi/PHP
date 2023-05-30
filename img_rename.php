<?php
	$mydir = "./gif_transition/";
	$myfiles = scandir($mydir, SCANDIR_SORT_ASCENDING);
	$mine = array_diff($myfiles, ['..', '.']);
	// Displaying the files in the directory
	foreach($mine as $key){
		if(!is_dir("$mydir/$key")){

			// rename("images","pictures");
			// $thumb = str_replace('scooty_', 'thumb_', $key);
			// rename("./scooty/m/$key","./scooty/m/$thumb");
			$thumb = str_replace('-min-min', '', $key);
			rename("./gif_transition/$key","./gif_transition/$thumb");

		}
	}
?>