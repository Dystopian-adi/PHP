<?php

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://facebook-reel-and-video-downloader.p.rapidapi.com/app/main.php?url=https://fb.watch/gT0dfYot5Q/",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: facebook-reel-and-video-downloader.p.rapidapi.com",
		"X-RapidAPI-Key: eae0fb1d62msh11688616b132e6ap150362jsnf06c4025806a"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
}