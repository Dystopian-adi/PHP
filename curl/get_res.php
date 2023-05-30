<?php
if($_SERVER['REQUEST_METHOD']=="POST")
{
    $ch = curl_init();
  
    $url = "http://api.openweathermap.org/data/2.5/forecast";
    // if($_POST['days']==1){
    //     $cnt=6*$_POST['days'];
    // }
    // else(){

    // }
    $params = ['lat' => '21.2294557',
    'lon' => '72.897441',
    // 'cnt'=>$cnt,
    'appid' => '523dcb17e6b92527d1ed9df5d4533d46'];
  
    $data = http_build_query($params);
  
    $getUrl = $url."?".$data;
  
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_URL, $getUrl);
    curl_setopt($ch, CURLOPT_TIMEOUT, 80);
       
    $response = curl_exec($ch);
    //code
    $array = json_decode($response, true); 
    
    foreach ($array as $row) {
        print_r($row);
    }

    //end code
        
    if(curl_error($ch)){
        echo 'Request Error:' . curl_error($ch);
    }else{
        // print_r($response);
        echo "string";
    }
       
    curl_close($ch);
}
else{
    echo json_encode(array("status" =>400 ,"data"=>"Wrong something is !!!"));
}  
?>