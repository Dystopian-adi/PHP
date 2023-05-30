<?php
$con = mysqli_connect("localhost", "root", "", "vi_holiday_app");

$sql = mysqli_query($con, "SELECT * FROM `vi_holiday_dates`");
while($row = mysqli_fetch_assoc($sql))
{
	$state = "";
	$date_id = $row['date_id'];
	$query = mysqli_query($con, "SELECT * FROM `vi_holiday_states` WHERE date_id = '$date_id' ");
	while($row1 = mysqli_fetch_assoc($query))
	{
		$state .= $row1['state'].",";
	}
	$state = rtrim($state, ",");
	$update = mysqli_query($con, "UPDATE `vi_holiday_dates` SET `all_states`='$state' WHERE date_id = '$date_id' ");
	echo $state."  /  ";
}
?>