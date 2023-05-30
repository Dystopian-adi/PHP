<?php
if( $_SERVER['REQUEST_METHOD']=="POST" && $_POST['apikey']=="#Dystopian707@Adi" && !empty($_POST['query'])  && !empty($_POST['ds_user_id'])  && !empty($_POST['sessionid'])  && !empty($_POST['agent']))
{
$query = $_POST['query'];
$ds_user_id = $_POST['ds_user_id'];
$sessionid = $_POST['sessionid'];
$agent = $_POST['agent'];
$ch = curl_init();
$url = "https://www.instagram.com/web/search/topsearch/";
$headers = array(
		"Cookie:ds_user_id=$ds_user_id;sessionid=$sessionid",
    	"Content-Type: application/json",
		"Charset:UTF-8",
		"Accept:application/json"
    );
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$dataArray = [
 'context' => 'blended',
 'query' => $query
 ];
$data = http_build_query($dataArray);
$getUrl = $url."?".$data;
curl_setopt_array($ch, [
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    ]);
curl_setopt($ch, CURLOPT_URL, $getUrl);
curl_setopt($ch, CURLOPT_USERAGENT, $agent);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$response = curl_exec($ch);
if(curl_error($ch)){
    echo 'Request Error:' . curl_error($ch);
}else{
    echo $response;
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