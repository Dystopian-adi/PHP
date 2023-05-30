 <?php
$con = mysqli_connect("localhost", "root", "", "jb_photo_video_maker");

  $sql = mysqli_query($con, "SELECT * FROM `jb_photo_video_maker_cat`");
// //   $i=1;
  while($lasun = mysqli_fetch_assoc($sql)){
    $name = $lasun['cat_name'];
    $id = $lasun['cat_id'];
//     $dip = mysqli_query($con, "SELECT * FROM ax_poster_general_category_thumb WHERE lang_id = '$id' ");
//     while($kanda = mysqli_fetch_assoc($dip)){
//       $op = $kanda['cat_name'];  
//       $sub_id = $kanda['cat_id'];  
    //   $color = $kanda['color'];  
//       // Specifying directory
      // $mydir = "./dir/".$name."/".$op."/sounds/";
      $mydir = "./frames/".$name."/";
      // $mydir = "./frames/";
      // print_r($mydir);
      // Scanning files in a given directory in unsorted order
      // $myfiles = scandir($mydir, SCANDIR_SORT_ASCENDING);
      $myfiles = scandir($mydir, SCANDIR_SORT_NONE);
      $mine = array_diff($myfiles, ['..', '.']);
      // Displaying the files in the directory
      foreach($mine as $key){
      	if(!is_dir("$mydir/$key")){
      	// echo $key."/";
          // $cat_id=$i;
          $key1 = str_replace("'", "\'", $key);
          // $thuu = str_replace('.png', '', $key1);
          // $key2 = $key;
          // $int1 = str_replace(".mp3","",$key);

          // $file_name = $mydir.'/'.$key;
          // $extension = pathinfo($file_name, PATHINFO_EXTENSION);
          // $int = (int) filter_var($key, FILTER_SANITIZE_NUMBER_INT);  
          // $image = $int.".".$extension;
          // print_r($int);
          // $front = str_replace('_back', '_front', $key);
          // $icon = str_replace('_back', '', $key);
          // $thumb = $key1."_banner.png";
          // echo $thumb." /";          
          // echo "INSERT INTO `dhruval_bike_app_cat`( `cat_name`, `cat_thumb`, `cat_type`) VALUES ('$key1','$thumb','m');";
          // $query = mysqli_query($con,"INSERT INTO `ax_poster_upcoming_thumb`(`lang_id`, `cat_name`, `thumb`, `date`, `tags`) VALUES ('7','$key1','$thumb','','');");
          // $query = mysqli_query($con,"INSERT INTO `ax_poster_upcoming_data`(`cat_id`, `name`, `purchase`) VALUES ('$id','$key','');");
          $query = mysqli_query($con,"INSERT INTO `jb_photo_video_maker_data`(`cat_id`, `data`) VALUES ('$id','$key');");  
        }
      // }
     //  $i++;
    }
  }
?>