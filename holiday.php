<?php
$con = mysqli_connect("localhost", "root", "", "vi_holiday_app");

set_time_limit(5000);

$filename = "ch23.json";

$data = file_get_contents($filename); 

$array = json_decode($data, true); 

foreach($array['holidays'] as $row) 
{
	// print_r($row);die();
	$name = str_replace("'", "\'", $row['name']);
	$description = str_replace("'", "\'", $row['description']);
	$country = str_replace("'", "\'", $row['country']['name']);
	$first = $row['date']['iso'];
	$arr = explode("T", $first, 2);
	$date = $arr[0];
	$year = $row['date']['datetime']['year'];
	$month = $row['date']['datetime']['month'];
	$day = $row['date']['datetime']['day'];
	$locations = str_replace("'", "\'", $row['locations']);
	$primary_type = str_replace("'", "\'", $row['primary_type']);

	$date = "INSERT INTO `vi_holiday_dates`(`country_id`, `date`, `name`, `description`, `country`, `year`, `month`, `day`, `locations`, `holiday_type`) VALUES ('9','$date','$name','$description','$country','$year','$month','$day','$locations','$primary_type')";

	if ($con->query($date) === TRUE) 
	{
		$last_id = $con->insert_id;
		$c_type = count($row['type']);
		for($t=0;$t<$c_type;$t++)
		{
			$type = $row['type'][$t];
			$in_type = mysqli_query($con, "INSERT INTO `vi_holiday_type`(`date_id`, `type`) VALUES ('$last_id','$type')");
		}
		if(is_array($row['states']))
		{
			$c_states = count($row['states']);
			for($s=0;$s<$c_states;$s++)
			{
				$state_name = str_replace("'", "\'", $row['states'][$s]['name']);
				$in_state_name = mysqli_query($con, "INSERT INTO `vi_holiday_states`(`date_id`, `state`) VALUES ('$last_id','$state_name')");
			}
		}else
		{
			$state_name = $row['states'];
			$in_state_name = mysqli_query($con, "INSERT INTO `vi_holiday_states`(`date_id`, `state`) VALUES ('$last_id','$state_name')");
		}
	}
	else 
	{
		echo "Error: " . $date . "<br>" . $con->error;
	}
	// print_r($row);die();
}
?>