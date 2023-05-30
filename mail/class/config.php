<?php
$con = new PDO("mysql:host=localhost;dbname=drsyttvbhp", "drsyttvbhp", "Knj9nRTh4c");
if(!$con)
{
	echo json_encode(array("status" =>400,"data"=>"Database issue"));
}
?>