<?php
$con = mysqli_connect("localhost", "root", "", "an_minecraft_app");
set_time_limit(5000);
// for ($i=1; $i<=20; $i++) 
// {

  // $filename = "frame/trending_photo_frame/frame_".$i."/json_1.json";
  $filename = "2.json";
  
  $data = file_get_contents($filename); 
  
  $array = json_decode($data, true); 

  // $finalOptions ="";            
	if (is_array($array) || is_object($array))
	{
		foreach($array as $row) 
    {	
      // foreach ($row as $key) 
      // {
      //   $c_id = $key['song_cat'];
      //   // echo $key['song_cat_name']; die();
      //   // print_r($key['song_list']); die();
      //   foreach ($key['song_list'] as $value) 
      //   {
            // $s_id = "128";
            // $c_id = "2";
            // $data = $value['sp_image'];
            // $shape_id = $value['shape_id'];
            // $sp_x_pos = $value['sp_x_pos'];
            // $sp_y_pos = $value['sp_y_pos'];
            // $sp_width = $value['sp_width'];
            // $sp_height = $value['sp_height'];
            // print_r($row);die();
            $product_id = $row['product_id'];
            $product_name = $row['product_name'];
            $category_id = $row['category_id'];
            $category_name = $row['category_name'];
            $product_status = $row['product_status'];
            $product_image = $row['item_gallery'];
            $product_description = $row['product_description'];
            $item_archive_file = $row['item_archive_file'];
            $size_archive_file = $row['size_archive_file'];
			    
          $sql = mysqli_query($con,"INSERT INTO `an_minecraft_app_data`(`id`, `cat_id`, `product_name`, `product_status`, `product_image`, `product_description`, `item_archive_file`, `size_archive_file`) VALUES ('Null','$category_id','$product_name','$product_status','$product_image','$product_description','$item_archive_file','$size_archive_file')");
          // echo $sql;
      //   }       
      // }        
		}     
	}else{
		echo"lasun";
	}
// }
?>