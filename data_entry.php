<?php
$con = mysqli_connect("localhost", "root", "", "");
$dir = "test1";
$mydir = "./".$dir."/";
// print_r($mydir);
$myfiles = scandir($mydir, SCANDIR_SORT_ASCENDING);
$mine = array_diff($myfiles, ['..', '.']);
foreach($mine as $key)
{
  if(is_dir("$mydir/$key"))
  {
    echo $key." is a folder"."\n";
    //create cat table 
    $cat_table = mysqli_query($con, "CREATE TABLE `tbl_".$dir."_cat` (`cat_id` int(11) NOT NULL,`cat_name` varchar(255) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");
    $set_primary = mysqli_query($con, "ALTER TABLE `tbl_".$dir."_cat` ADD PRIMARY KEY (`cat_id`);");
    $set_auto_increment = mysqli_query($con, "ALTER TABLE `tbl_".$dir."_cat` MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT;");
  }
  else
  {
    echo $key." is a file"."\n";  
  }  
}
?>