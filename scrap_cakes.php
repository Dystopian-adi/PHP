<?php
set_time_limit(100000);
$con = mysqli_connect("localhost","root","","cake_app");
$ch = curl_init();

$homeurl = "https://sprinklecake.in/sprinklenew/api/product/home_page_category";
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_URL, $homeurl);
   
$res = curl_exec($ch);
$ar = json_decode($res, true);
foreach($ar['category'] as $key) 
{
	// print_r($key);die();
	if(!array_key_exists("sub_category_id", $key))
	{
		//thumb download
		$folder = $key['category_name'];
		mkdir("cakes_data/".$folder);
		$my_save_dir = "cakes_data/"."$folder"."/";
		$thumbUrl = $key['category_image'];
		$chi = curl_init($thumbUrl);
		$filename = basename($thumbUrl);
		$complete_save_loc = $my_save_dir . $filename;

		$fp = fopen($complete_save_loc, 'wb');

		curl_setopt($chi, CURLOPT_FILE, $fp);
		curl_setopt($chi, CURLOPT_HEADER, 0);
		curl_exec($chi);
		curl_close($chi);
		fclose($fp);
		// end thumb download

		$category_id = $key['category_id'];
		$category_name = $key['category_name'];
		$ch1 = curl_init();	
		$url = "https://sprinklecake.in/sprinklenew/api/product/product_by_catogory";
		// $id = "" . $i . "";
		$dataArray = [
			'category_id' => $category_id
			];
		$data = http_build_query($dataArray);
		$getUrl = $url."?".$data;

		curl_setopt($ch1, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch1, CURLOPT_URL, $getUrl);
		$response = curl_exec($ch1);
		$block_category_name = $key['block_category_name'];
		$category_image = $key['category_image'];
		$category_other_image = $key['category_other_image'];
		$category_order = $key['category_order'];
		$show_in_home_page = $key['show_in_home_page'];
		$home_page_order = $key['home_page_order'];
		$show_in_search = $key['show_in_search'];
		$category_status = $key['category_status'];
		$date_created = $key['date_created'];

		$sql = mysqli_query($con, "INSERT INTO `cake_app_cat`(`category_id`, `category_name`, `block_category_name`, `category_image`, `category_other_image`, `category_order`, `show_in_home_page`, `home_page_order`, `show_in_search`, `category_status`, `date_created`) VALUES ('$category_id', '$category_name', '$block_category_name', '$category_image', '$category_other_image', '$category_order', '$show_in_home_page', '$home_page_order', '$show_in_search', '$category_status', '$date_created')");
		// $last_cat_id=$con->insert_id;
		// echo $last_cat_id."\n";
		$array = json_decode($response, true);
		foreach($array['product'] as $row) 
		{
			// echo "cat:".$cname." In:".$row['product_name']."\n";
			// print_r($row);die();

			$dir = $row['product_name'];
			mkdir("cakes_data/".$folder."/".$dir);
			$my_save_dir1 = "cakes_data/"."$folder"."/"."$dir"."/";			

			$imgUrl = $row['product_image'];
			$ch3 = curl_init($imgUrl);
			$filename1 = basename($imgUrl);
			$complete_save_loc1 = $my_save_dir1 . $filename1;

			$fp1 = fopen($complete_save_loc1, 'wb');

			curl_setopt($ch3, CURLOPT_FILE, $fp1);
			curl_setopt($ch3, CURLOPT_HEADER, 0);
			curl_exec($ch3);
			curl_close($ch3);
			fclose($fp1);
			// echo 'lasun/';
			
			$product_id = $row['product_id'];
			$product_name = $row['product_name'];
			$product_type = $row['product_type'];
			$delivery_time = $row['delivery_time'];
			$best_seller = $row['best_seller'];
			$product_image = $row['product_image'];
			$actual_price = $row['actual_price'];
			$selling_price = $row['selling_price'];
			$avg_rate = $row['avg_rate'];
			$total_rated_user = $row['total_rated_user'];
			$date_created = $row['date_created'];

			$insert = mysqli_query($con ,"INSERT INTO `cake_app_cat_data`(`product_id`, `category_id`, `product_name`, `product_type`, `delivery_time`, `best_seller`, `product_image`, `actual_price`, `selling_price`, `avg_rate`, `total_rated_user`, `date_created`) VALUES ('$product_id', '$category_id', '$product_name', '$product_type', '$delivery_time', '$best_seller', '$product_image', '$actual_price', '$selling_price', '$avg_rate', '$total_rated_user', '$date_created')");
		}
	}
	else
	{
		//thumb download
		$folder = $row['sub_category_name'];
		mkdir("cakes_data/".$folder);
		$my_save_dir = "cakes_data/"."$folder"."/";
		$thumbUrl = $row['sub_category_image'];
		$chi = curl_init($thumbUrl);
		$filename = basename($thumbUrl);
		$complete_save_loc = $my_save_dir . $filename;

		$fp = fopen($complete_save_loc, 'wb');

		curl_setopt($chi, CURLOPT_FILE, $fp);
		curl_setopt($chi, CURLOPT_HEADER, 0);
		curl_exec($chi);
		curl_close($chi);
		fclose($fp);
		//end thumb download

		$sub_category_id = $key['sub_category_id'];
		$category_id = $key['category_id'];
		$sub_category_name = $key['sub_category_name'];
		$ch1 = curl_init();	
		$url = "https://sprinklecake.in/sprinklenew/api/product/product_by_sub_catogory";
		// $id = "" . $i . "";
		$dataArray = [
			'sub_category_id' => $sub_category_id
			];
		$data = http_build_query($dataArray);
		$getUrl = $url."?".$data;

		curl_setopt($ch1, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch1, CURLOPT_URL, $getUrl);
		$response = curl_exec($ch1);
		$block_sub_category_name = $key['block_sub_category_name'];
		$sub_category_image = $key['sub_category_image'];
		$sub_category_other_image = $key['sub_category_other_image'];
		$sub_category_order = $key['sub_category_order'];
		$show_in_home_page = $key['show_in_home_page'];
		$sub_category_click = $key['sub_category_click'];
		$home_page_order = $key['home_page_order'];
		$sub_category_status = $key['sub_category_status'];
		$date_created = $key['date_created'];

		$sql = mysqli_query($con, "INSERT INTO `cake_app_subcat`(`sub_category_id`, `category_id`, `sub_category_name`, `block_sub_category_name`, `sub_category_image`, `sub_category_other_image`, `sub_category_order`, `sub_category_click`, `show_in_home_page`, `home_page_order`, `sub_category_status`, `date_created`) VALUES ('$sub_category_id', '$category_id', '$sub_category_name', '$block_sub_category_name', '$sub_category_image', '$sub_category_other_image', '$sub_category_order', '$sub_category_click', '$show_in_home_page', '$home_page_order', '$sub_category_status', '$date_created')");
		$last_subcat_id=$con->insert_id;
		$array = json_decode($response, true);
		foreach($array['product'] as $row) 
		{
			// echo "cat:".$cname." In:".$row['product_name']."\n";
			// print_r($row);die();			
			$dir = $row['product_name'];
			mkdir("cakes_data/".$folder."/".$dir);
			$my_save_dir1 = "cakes_data/"."$folder"."/"."$dir"."/";			

			$imgUrl = $row['product_image'];
			$ch3 = curl_init($imgUrl);
			$filename1 = basename($imgUrl);
			$complete_save_loc1 = $my_save_dir1 . $filename1;

			$fp1 = fopen($complete_save_loc1, 'wb');

			curl_setopt($ch3, CURLOPT_FILE, $fp1);
			curl_setopt($ch3, CURLOPT_HEADER, 0);
			curl_exec($ch3);
			curl_close($ch3);
			fclose($fp1);
			// echo 'lasun/';die();

			$product_id = $row['product_id'];
			$product_name = $row['product_name'];
			$product_type = $row['product_type'];
			$delivery_time = $row['delivery_time'];
			$best_seller = $row['best_seller'];
			$product_image = $row['product_image'];
			$actual_price = $row['actual_price'];
			$selling_price = $row['selling_price'];
			$avg_rate = $row['avg_rate'];
			$total_rated_user = $row['total_rated_user'];
			$date_created = $row['date_created'];

			$insert = mysqli_query($con ,"INSERT INTO `cake_app_subcat_data`(`product_id`, `sub_category_id`, `product_name`, `product_type`, `delivery_time`, `best_seller`, `product_image`, `actual_price`, `selling_price`, `avg_rate`, `total_rated_user`, `date_created`) VALUES ('$product_id', '$last_subcat_id', '$product_name', '$product_type', '$delivery_time', '$best_seller', '$product_image', '$actual_price', '$selling_price', '$avg_rate', '$total_rated_user', '$date_created')");
		}   
	}
}
if(curl_error($ch1)){
    echo 'Request Error:' . curl_error($ch1);
}else{
    // echo $response;
}
curl_close($ch1);
?>