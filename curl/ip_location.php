<?php
 $ipaddress = $_SERVER['REMOTE_ADDR']
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script language="JavaScript" src="http://www.geoplugin.net/javascript.gp" type="text/javascript"></script>
</head>
<body>
<h1><?php echo $ipaddress;?></h1>
<?php
$new_arr[]= unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR']));
echo "Latitude:".$new_arr[0]['geoplugin_latitude']." and Longitude:".$new_arr[0]['geoplugin_longitude'];
?>
</body>
</html>