<?php
$con = mysqli_connect("localhost", "root", "", "store_api");
if(isset($_GET['masala']))
{
  if($_GET['masala'] == "lasun") 
  {
    echo "lasun";die();     
    $mydir = "./lasun/";
    $myfiles = scandir($mydir, SCANDIR_SORT_ASCENDING);
    $mine = array_diff($myfiles, ['..', '.']);
    foreach($mine as $key)
    {
      if(!is_dir("$mydir/$key"))
      {
        echo $key."\n";
        // echo "INSERT INTO `store_fonts_category`(`cat_name`) VALUES ('$key')";     
        // $query = mysqli_query($con,"INSERT INTO `store_fonts_category`(`cat_name`) VALUES ('$key')");
      }
    }  
  }
  elseif($_GET['masala'] == "kanda")
  {
    // echo "kanda";die();     
    $sql = mysqli_query($con, "SELECT * FROM `store_sticker_category` WHERE cat_id = 22");
    while($lasun = mysqli_fetch_assoc($sql))
    {
      $name = $lasun['cat_name'];
      $id = $lasun['cat_id'];
      $mydir = "./sticker/".$name."/";
      // echo $mydir;
      $myfiles = scandir($mydir, SCANDIR_SORT_ASCENDING);
      $mine = array_diff($myfiles, ['..', '.']);
      
      foreach($mine as $key)
      {
        if(is_dir("$mydir/$key"))
        {
          // echo $key."\n";

          // store sub_cat
          $image = $key.".png";
          $zip = $key.".zip";
          $main_image = $key."_main.png";
          $preview_image = $key."_img.png";
          $demo_image = $key."_demo.png";
          // store sub_cat

          // add size
          $full = "$mydir"."$key"."/".$zip;
          $inbyte = filesize($full);
          $inkb = $inbyte/1024;
          $variable = substr($inkb, 0, strpos($inkb, "."));
          // echo $variable."\n";
          // End size

          // echo "INSERT INTO `store_sticker_sub_cat_data`(`cat_id`, `name`,`total`, `zip_size`, `premium`, `main_image`, `preview_image`, `demo_image`, `image`, `zip`) VALUES ('$id','$key','0','$variable', 'false','$main_image','$preview_image','$demo_image','$image','$zip');"."\n";     
          $query = mysqli_query($con,"INSERT INTO `store_sticker_sub_cat_data`(`cat_id`, `name`,`total`, `zip_size`, `premium`, `main_image`, `preview_image`, `demo_image`, `image`, `zip`) VALUES ('$id','$key','0','$variable', 'false','$main_image','$preview_image','$demo_image','$image','$zip')");
        }
      }
    }
  }
  elseif($_GET['masala'] == "mirchi")
  {
    echo "mirchi";die();     
    $sql = mysqli_query($con, "SELECT * FROM `store_fonts_category` WHERE cat_id = 14");
    while($lasun = mysqli_fetch_assoc($sql))
    {
      $name = $lasun['cat_name'];
      $id = $lasun['cat_id'];
      $mydir = "./fonts/".$name."/";
      // echo $mydir;
      $myfiles = scandir($mydir, SCANDIR_SORT_ASCENDING);
      $mine = array_diff($myfiles, ['..', '.']);
      
      foreach($mine as $key)
      {
        if(is_dir("$mydir/$key"))
        {
          // echo $key."\n";
          
          // in_files
          $mydir1 = "./fonts/".$name."/".$key;
          $myfiles1 = scandir($mydir1, SCANDIR_SORT_ASCENDING);
          $mine1 = array_diff($myfiles1, ['..', '.']);
          $file =  str_replace("'", "\'", $mine1[2]);
          // $image =  str_replace("'", "\'", $mine1[3]);
          // in_files
          
          //get extension
          $ext = pathinfo($file, PATHINFO_EXTENSION); 
          //end

          // store sub_cat
          $font = $key.".".$ext;
          $main_image = $key."_main.png";
          $demo_image = $key."_demo.png";
          // store sub_cat

          // add size
          $full = "$mydir"."$key"."/".$font;
          $inbyte = filesize($full);
          $inkb = $inbyte/1024+1;
          $variable = substr($inkb, 0, strpos($inkb, "."));
          // echo $variable."\n";
          // End size

          // echo "INSERT INTO `store_fonts_sub_cat_data`( `cat_id`, `name`, `font`, `font_size`, `premium`, `main_image`, `demo_image`) VALUES ('$id','$key','$font','$variable','false','$main_image','$demo_image');"."\n";     
          $query = mysqli_query($con,"INSERT INTO `store_fonts_sub_cat_data`( `cat_id`, `name`, `font`, `font_size`, `premium`, `main_image`, `demo_image`) VALUES ('$id','$key','$font','$variable','false','$main_image','$demo_image')");
        }
      }
    }
  }
  elseif($_GET['masala'] == "adarak") 
  {
    echo "adarak";die();     
    $sql = mysqli_query($con, "SELECT * FROM `store_sticker_category` ");
    while($lasun = mysqli_fetch_assoc($sql))
    {
      $name = $lasun['cat_name'];
      $id = $lasun['cat_id'];

      $dip = mysqli_query($con, "SELECT * FROM ``");
      while($kanda = mysqli_fetch_assoc($dip))
      {
        $op = $kanda['cat_name'];  
        $sub_id = $kanda['cat_id'];
        $mydir = ".//".$name."/".$op."/";
        // echo $mydir;
        $myfiles = scandir($mydir, SCANDIR_SORT_ASCENDING);
        $mine = array_diff($myfiles, ['..', '.']);
        
        foreach($mine as $key)
        {
          if(is_dir("$mydir/$key"))
          {

            // echo $key."\n";
            // echo "";     
            // $query = mysqli_query($con,"INSERT INTO `store_bg_category`(`cat_name`) VALUES ('$key')");
            // $query = mysqli_query($con,"INSERT INTO `store_sticker_sub_cat_data`(`cat_id`, `name`,`total`, `zip_size`, `main_image`, `preview_image`, `demo_image`, `image`, `zip`) VALUES ('$id','$key','0','$variable','$main_image','$preview_image','$demo_image','$image','$zip')");

          }
        }
      }
    }
  }
  else
  {
    echo "There is no recipe with this ".$_GET['masala']." masala friend";
  }
}
else{
  echo "You make something without Masala";
}


// sound playtime begins
// require_once("getID3-master/getid3/getid3.php");
// $getID3 = new getID3;
// $filename = $mydir1;
// $file = $getID3->analyze($filename);
// $playtime_seconds = $file['playtime_seconds'];
// echo gmdate("i", $playtime_seconds)."\n";
// $duration =  gmdate("i", $playtime_seconds)." min";
// sound playtime ends



// $int = (int) filter_var($key, FILTER_SANITIZE_NUMBER_INT);
// $in_comma = str_replace("'", "'/", $key);
// $thumb = str_replace("_", "_thumb_", $key);        
?>