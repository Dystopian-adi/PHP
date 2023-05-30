<?php
$con = mysqli_connect("localhost","root","","panchang");
set_time_limit(10000);
$ch = curl_init();
$url = "https://api.prokerala.com/v2/astrology/panchang/advanced";
for ($i=8; $i<=9; $i++)
{
	$day = "" . $i . "";
	if ($day < 10) {
		$day = '0'.$day;
	}
	$headers = array(
	   'Content-Type: application/json',
	   'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxMmRiOWU0Mi02Zjg3LTQxZjUtYmIzYS00OGExNWM0ZDRkN2QiLCJqdGkiOiI1MmQ1NGE0YWIwNWEwYmM2NWU4MmM3NDIxZGViYzk0M2VhMTBhNzk5MmI0NDFjZWEzNjc4ZTI4NGI3MzQyYjM4NGU4YzkyYTI0YzJhODNiYyIsImlhdCI6MTY4Mzc4NjM3Ni4zMzUxMjIsIm5iZiI6MTY4Mzc4NjM3Ni4zMzUxMjQsImV4cCI6MTY4Mzc4OTk3Ni4zMzUwMDYsInN1YiI6ImYxN2M3MGYyLTAxNzYtNDY3Ny05YzU2LWU2NTE1YWFlZjliYiIsInNjb3BlcyI6W10sImNyZWRpdHNfcmVtYWluaW5nIjo0MjcyLCJyYXRlX2xpbWl0cyI6W3sicmF0ZSI6NSwiaW50ZXJ2YWwiOjYwfV19.QtK_dXrnCoxrZaZx1NC_Y6M1Uqf3tDEeGyUEVCprk3O4eH2JJCrWPl_fDXTjqJ-lLsDP8Hs1BK_1Hb5uOPQHwt_rDpAynlNOy6J5kXeeDl63xqHY3leoFZDa-PKDn2DqzLynb27XzTFEosdDHCnhN1aSafZGwd3IqM_4b9E66CCTSWzjiJChgxtOmvK9nOdSFzzaad5k_LO9kqk6WRkB8pXJJfCASmasHW5k0XKpwT_N81ysEvxi6wJaXHSM1DWKs5gZz7j4DoXlmUled3-R3cdq-VdosSg4Xw3LT3kjznaiI-xCngj57iYviGn_HuJOwTpWng62uHZ7evDLaYkReA'
	);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $dataArray = [
    	'ayanamsa' => '1',
    	'coordinates' => '21.170240,72.831062',
    	'datetime' => '2023-01-'.$day.'T12:25:00Z',
    	'la' => 'en'
		];
    $data = http_build_query($dataArray);
    $getUrl = $url."?".$data;
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_URL, $getUrl);
	$response = curl_exec($ch);
	$array = json_decode($response, true);
	$vaara = $array['data']['vaara'];
	$sunrise = $array['data']['sunrise'];
	$ar = (explode("T",$sunrise));
	$date = $ar[0];
	$sunset = $array['data']['sunset'];
	$moonrise = $array['data']['moonrise'];
	$moonset = $array['data']['moonset'];

	$sql = "INSERT INTO `tbl_panchang_day`(`vaara`, `date`, `sunrise`, `sunset`, `moonrise`, `moonset`) VALUES ('$vaara','$date','$sunrise','$sunset','$moonrise','$moonset')";
	if($con->query($sql) === TRUE) 
	{
		$last_id = $con->insert_id;
		foreach($array['data']['nakshatra'] as $row) 
		{
			$name = $row['name'];
			$lord_id = $row['lord']['id'];
			$lord_name = $row['lord']['name'];
			$lord_vedic_name = $row['lord']['vedic_name'];
			$start = $row['start'];
			$end = $row['end'];

			mysqli_query($con,"INSERT INTO `tbl_panchang_nakshatra`(`id`, `name`, `lord_id`, `lord_name`, `lord_vedic_name`, `start`, `end`) VALUES ('$last_id','$name','$lord_id','$lord_name','$lord_vedic_name','$start','$end');");
		}
		foreach($array['data']['tithi'] as $row1) 
		{
			$index = $row1['index'];
			$name = $row1['name'];
			$paksha = $row1['paksha'];
			$start = $row1['start'];
			$end = $row1['end'];

			mysqli_query($con,"INSERT INTO `tbl_panchang_tithi`(`id`, `index`, `name`, `paksha`, `start`, `end`) VALUES ('$last_id','$index','$name','$paksha','$start','$end')");
		}
		foreach($array['data']['karana'] as $row2) 
		{
			$index = $row2['index'];
			$name = $row2['name'];
			$start = $row2['start'];
			$end = $row2['end'];

			mysqli_query($con,"INSERT INTO `tbl_panchang_karana`(`id`, `index`, `name`, `start`, `end`) VALUES ('$last_id','$index','$name','$start','$end')");
		}
		foreach($array['data']['yoga'] as $row3) 
		{
			$name = $row3['name'];
			$start = $row3['start'];
			$end = $row3['end'];
			mysqli_query($con,"INSERT INTO `tbl_panchang_yoga`(`id`, `name`, `start`, `end`) VALUES ('$last_id','$name','$start','$end')");
		}
		foreach($array['data']['auspicious_period'] as $row4) 
		{
			$name = $row4['name'];
			$type = $row4['type'];
			$start = $row4['period'][0]['start'];
			$end = $row4['period'][0]['end'];
			mysqli_query($con,"INSERT INTO `tbl_panchang_auspicious`(`id`, `name`, `type`, `start`, `end`) VALUES ('$last_id','$name','$type','$start','$end')");
		}
		foreach($array['data']['inauspicious_period'] as $row5) 
		{
			$name = $row5['name'];
			$type = $row5['type'];
			$start = $row5['period'][0]['start'];
			$end = $row5['period'][0]['end'];
			mysqli_query($con,"INSERT INTO `tbl_panchang_inauspicious`(`id`, `name`, `type`, `start`, `end`) VALUES ('$last_id','$name','$type','$start','$end')");
		}
	} 
    if(curl_error($ch)){
        echo 'Request Error:' . curl_error($ch);
    }else{
        echo $response;
    }
}   
curl_close($ch);
?>