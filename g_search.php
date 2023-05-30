<?php

if(isset($_GET['results']) && $_GET['results'] != "")
{

	$search = $_GET['results'];
	echo "<br />Your Search Result Array:<br /><br />";

	$url = "http://ajax.googleapis.com/ajax/services/search/web?v=1.0&"
	. "q=".str_replace(' ', '%20', $_GET['results']);

	// sendRequest
	// note how referer is set manually
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_REFERER, 'http://www.google.com');
	$body = curl_exec($ch);
	curl_close($ch);
	echo $body;
	// now, process the JSON string
	// $json = json_decode($body);

	// print out the Array
	// print_r($json);

	// now have some fun with the results...
}
else{
	echo("lasun");
}

?>
