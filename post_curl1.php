<?php

$url = "https://3dparallax.online/3DParallax/v1/get_double_wallpaper_new.php";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: multipart/form-data",
);

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$data = [
    'app_secret_key' => '5000655646dab433130901e8ff104d92',
    'avoid_item_ids' => "'102','134','119','150','126','118','105','124','117','133','103','156','98','138','137','136','111','153','155','7','146','129','123','149','139','12','143','144','154','104','142','122','108','135','145','1','114', '95', '116', '140', '125', '101', '151', '99', '131', '130', '132', '141','115', '106', '11', '128', '107', '147', '127', '157', '148', '121', '8', '96','100', '152', '5'",
    'appVersion' => '67',
    'user_device_serial_no' => '196b9cccfc6868e9',
    'time_in_millis' => '1669262993306',
    'user_id' => '2506956'
];

curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
// Return response instead of outputting
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Execute the POST request
$response = curl_exec($ch);
//code
$array = json_decode($response, true);
foreach ($array['list'] as $key) {
	//do something
	$dir = $key['img_id'];
	$get_link = str_replace('1.jpg', '', $key['img1_uhd']);
	for($i=1;$i<=2;$i++)
	{
		$create = $get_link.$i.".jpg";
		mkdir("double_wallpapers/".$dir);
		$my_save_dir = "double_wallpapers/".$dir."/";

		$ch = curl_init($create);
		$filename = basename($create);
		$complete_save_loc = $my_save_dir . $filename;

		$fp = fopen($complete_save_loc, 'wb');

		curl_setopt($ch, CURLOPT_FILE, $fp);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_exec($ch);
		curl_close($ch);
		fclose($fp);
		// echo '<h1>Lasun Kanda. </h1>';
		// echo $create."|<^_^>|";
	}
	$ar[]="'$dir',";
}
echo implode(" ",$ar);
if(curl_error($ch)){
	echo 'Request Error:' . curl_error($ch);
}else{
    print_r($response);
}	
curl_close($ch);
?>

