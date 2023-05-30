<?php
set_time_limit(10000);
$url = "https://photovideomakerwithmusic.com/js_plant_app/plant_details.php";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: multipart/form-data",
);

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$data = [
    'appkey' => 'DystopianisAdi707',
    'os' => 'andy',
    'ver' => '9.6',
    'device' => 'shin'
];

curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
// Return response instead of outputting
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Execute the POST request
$response = curl_exec($ch);
//code
$array = json_decode($response, true);
foreach ($array['data'] as $key) {
	//do something
	$check = $key['cat_thumb'];
	// Initialize an URL to the variable
	$link = "https://photovideomakerwithmusic.com/js_plant_app".$check;
	// Use get_headers() function
	$headers = @get_headers($link);
	// Use condition to check the existence of URL
	if($headers && strpos( $headers[0], '200')) {
		echo "URL Exist";
	}
	else {
		echo $link;die();
		
	}
	// Display result
}
if(curl_error($ch)){
	echo 'Request Error:' . curl_error($ch);
}else{
    // print_r($response);
}	
curl_close($ch);

?>
