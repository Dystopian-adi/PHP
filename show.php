<?php
$lasun = array();
$kanda = "";
$con=mysqli_connect("localhost","root","","drashti_data");
$query = mysqli_query($con, "SELECT  DISTINCT Category FROM `anime` ");
while($all=mysqli_fetch_assoc($query))
{
	$kanda.=$all['Category'].",";
}
$kanda=str_replace(" ", "", $kanda);
$lasun[]=explode(",", $kanda);
// echo $kanda;
$garlic = array_unique($lasun[0]);
$garlic = array_diff($garlic,[""]);
echo json_encode(array("data"=>$garlic));
?>