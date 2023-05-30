<?php
set_time_limit(10000);
$ch = curl_init();

$url = "http://www.riseupinfotech.com/Test";

// $dataArray = [
// 	'query' => ''
// 	];
// $data = http_build_query($dataArray);
// $getUrl = $url."?".$data;

curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_URL, $url);
   
$response = curl_exec($ch);
if(curl_error($ch)){
    echo 'Request Error:' . curl_error($ch);
}else{
    echo $response;
}
 
curl_close($ch);
  
?>