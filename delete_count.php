<?php
$con = mysqli_connect("localhost", "root", "", "vi_holiday_app");

$sql = mysqli_query($con, "SELECT name, COUNT(name) FROM vi_holiday_dates GROUP BY name HAVING COUNT(name) > 1;");
while($row = mysqli_fetch_assoc($sql))
{
	$dname = str_replace("'", "\'", $row['name']);
	for($y=2023;$y<=2025;$y++)
	{
		$query = mysqli_query($con, "SELECT * FROM `vi_holiday_dates` WHERE name = '$dname' AND year = '$y';");
		while($row1 = mysqli_fetch_assoc($query))
		{
			$date_id = $row1['date_id']; 
			echo $date_id;
			$q = mysqli_query($con ,"DELETE FROM `vi_holiday_dates` WHERE name = '$dname' AND year = '$y' AND date_id > '$date_id' ");
		}
	}
}
?>