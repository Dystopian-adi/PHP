<?php
$con = mysqli_connect("localhost", "root", "", "ad_stiker");
// $sql = mysqli_query($con, "SELECT * FROM `rima_meditation_sounds_sleep_cat`");
// $sql = mysqli_query($con, "SELECT * FROM `d_romantic_love_photoframe_cat_data` WHERE id > 83");
// $id=1;
// while($lasun = mysqli_fetch_assoc($sql))
// {
//   $name = $lasun['cat_name'];
//   $id = $lasun['cat_id'];
//   $wname = "" . $name . "";
//   $dip = mysqli_query($con, "SELECT * FROM ax_poster_upcoming_thumb WHERE lang_id = '$id' ");
//   while($kanda = mysqli_fetch_assoc($dip))
//   {
//     $op = $kanda['cat_name'];  
//     $sub_id = $kanda['cat_id'];  
    // Specifying directory
    // $mydir = "./ehg/".$name."/festival_thumb_data/".$op."/";
    // $mydir = "./Sleep_sound/".$name."/";
    $mydir = "./sticker/";
    // print_r($mydir);
    // Scanning files in a given directory in unsorted order
    $myfiles = scandir($mydir, SCANDIR_SORT_ASCENDING);
    $mine = array_diff($myfiles, ['..', '.']);
    // Displaying the files in the directory
    foreach($mine as $key)
    {
      if(is_dir("$mydir/$key"))
      {
        // echo $key."  /  ";
        // $mydir1 = "./Sleep_sound/".$name."/".$key."/";
        $mydir1 = "./sticker/".$key."/";
        $myfiles1 = scandir($mydir1, SCANDIR_SORT_ASCENDING);
        $mine1 = array_diff($myfiles1, ['..', '.']);
        foreach($mine1 as $value){
          if(is_dir($mydir1."/".$value))
          {
            //if dir main type lasun
            $main = mysqli_query($con ,"INSERT INTO `ad_sticker_main`(`name`, `type`) VALUES ('$key','lasun')");
            $last_m_id = $con->insert_id;
            // echo $value;
            $mydir2 = "./sticker/".$key."/".$value."/";
            $myfiles2 = scandir($mydir2, SCANDIR_SORT_ASCENDING);
            $mine2 = array_diff($myfiles2, ['..', '.']);
            foreach($mine2 as $value1){
              if(is_dir($mydir2."/".$value1))
              {
                // echo $mydir2."/".$value1;
                $main_cat = mysqli_query($con ,"INSERT INTO `ad_sticker_cat`(`m_id`, `name`, `type`) VALUES ('$last_m_id','$value','lasun')");
                $last_mcat_id = $con->insert_id;
                $mydir3 = "./sticker/".$key."/".$value."/".$value1."/";
                $myfiles3 = scandir($mydir3, SCANDIR_SORT_ASCENDING);
                $mine3 = array_diff($myfiles3, ['..', '.']);
                foreach ($mine3 as $value2) {
                  if(is_dir($mydir3."/".$value2))
                  {
                    // echo "Naniiiiiiiii".$value2;
                  }
                  else
                  {
                    $sub_cat = mysqli_query($con ,"INSERT INTO `ad_sticker_subcat`(`cat_id`, `name`) VALUES ('$last_mcat_id','$value1')");
                    $last_subcat_id = $con->insert_id;
                    $sub_cat_data = mysqli_query($con, "INSERT INTO `ad_sticker_subcat_data`(`s_id`, `data`) VALUES ('$last_subcat_id','$value2')");
                    // echo $value2;
                  }
                }
              }
              else
              {
                $main_cat = mysqli_query($con ,"INSERT INTO `ad_sticker_cat`(`m_id`, `name`, `type`) VALUES ('$last_m_id','$value','kanda')");
                $last_mcat_id = $con->insert_id;
                $cat_data = mysqli_query($con ,"INSERT INTO `ad_sticker_cat_data`(`cat_id`, `data`) VALUES ('$last_mcat_id','$value1')");
                // echo $value1;
              }
            }
          }
          else
          {
            //if dir main type lasun
            $main = mysqli_query($con ,"INSERT INTO `ad_sticker_main`(`name`, `type`) VALUES ('$key','kanda')");
            $last_m_id = $con->insert_id;
            $main_data = mysqli_query($con, "INSERT INTO `ad_sticker_main_data`(`m_id`, `data`) VALUES ('$last_m_id','$value')");
            // echo $value;
          }
        }
        // $sound = $mine1[2];
        // $image = $mine1[3];
        // echo "INSERT INTO `rima_meditation_sounds_data`(`name`, `image`, `sound`) VALUES ('$key','$image','$sound')";          
        // $query = mysqli_query($con,"INSERT INTO `rima_meditation_sounds_data`(`name`, `image`, `sound`) VALUES ('$key','$image','$sound')");
      }
      elseif(!is_dir("$mydir/$key")) 
      {
        $lasun = json_encode($key);
        echo $lasun;
      }
      else{
        echo "nanishiteruno";
      }
    }
  // }
// }
?>