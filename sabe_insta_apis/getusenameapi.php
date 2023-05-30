<?php
if( $_SERVER['REQUEST_METHOD']=="POST" && $_POST['apikey']=="#Dystopian707@Adi" && !empty($_POST['ds_user_id']) && !empty($_POST['sessionid'])  && !empty($_POST['agent']))
{
$ds_user_id = $_POST['ds_user_id'];
$sessionid = $_POST['sessionid'];
$agent = $_POST['agent'];
$ch = curl_init();
$url = "https://i.instagram.com/api/v1/feed/user/".$ds_user_id;
$headers = array(
		"Cookie:ds_user_id=$ds_user_id;sessionid=$sessionid",
    	"Content-Type: application/json",
		"Charset:UTF-8",
		"Accept:application/json"
    );
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt_array($ch, [
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    ]);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_USERAGENT, $agent);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$response = curl_exec($ch);
if(curl_error($ch)){
    echo 'Request Error:' . curl_error($ch);
}else{
    $res = array();
    $array = json_decode($response, true);
    if($array['status'] == 'fail')
    {
        echo $response;
    }
    else
    {
        foreach($array['items'] as $row) 
        {
            $ad['username'] = $row['user']['username'];
            $ad['full_name'] = $row['user']['full_name'];
            $res[]=$ad; 
        }
        $re['error'] = false; 
        $re['message'] = 'data fetched';
        $re['items'] = $res;
        echo json_encode($re);
    }
}
curl_close($ch);
}
else
{
    $response['error'] = true; 
    $response['message'] = 'Invalid API Params';
    echo json_encode($response);
}
?>