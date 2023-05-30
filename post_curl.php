<?php

$url = "http://localhost/vi_holiday_app/lasun.php";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: multipart/form-data",
);

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$data = [
    'appkey' => 'GanTzIOadi707',
    'device' => 'onepiece',
    'ver' => '9.1',
    'category' => 'france'
];

curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
// Return response instead of outputting
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Execute the POST request
$response = curl_exec($ch);
//code
$array = json_decode($response, true);
$iv = base64_decode($array['status']);
$tag = base64_decode($array['message']);
$ciphertext = $array['data']; 
$key = 'lasun707is#you';
$cipher = "aes-128-gcm"; 
$original_plaintext = openssl_decrypt($ciphertext, $cipher, $key, $options=0, $iv, $tag);
echo $original_plaintext."\n";die();
// foreach ($array as $key) {
// 	//do something
// }
if(curl_error($ch)){
	echo 'Request Error:' . curl_error($ch);
}else{
    echo $response;
}	
curl_close($ch);
?>

