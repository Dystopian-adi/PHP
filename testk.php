<?php
// json file name
$filename = "lasun2.json";

// Read the JSON file in PHP
$data = file_get_contents($filename); 
// echo $data;
$res = array();
$array = json_decode($data, true);
// print_r($array['items']);
// for($i = 0; $i < count($array['items']); $i++)
// {
//     print_r($array['items'][$i]['user']);
// }

foreach($array['items'] as $row) 
{
	$ad['pk_id'] = $row['user']['pk_id'];
	$ad['username'] = $row['user']['username'];
	$ad['profile_pic_url'] = $row['user']['profile_pic_url'];
	$ad['like_count'] = $row['like_count'];
	$ad['comment_count'] = $row['comment_count'];
	if (array_key_exists("carousel_media",$row))
  	{
    	foreach ($row['carousel_media'] as $key) 
    	{
    		foreach ($key['image_versions2']['candidates'] as $value) {
    			# code...
    			$ad['image_url'] = $value['url'];
    		}

    		if (array_key_exists("video_versions", $key)) 
    		{
    			foreach ($key['video_versions'] as $value1) {
    				# code...
    				$ad['video_url'] = $value1['url'];
    			}
    		}
    		else
    		{
    			$ad['video_url'] = "";
    		}
    		$res[]=$ad; 
    	}
    }else
    {
    	foreach ($row['image_versions2']['candidates'] as $value) {
    		# code...
    		$ad['image_url'] = $value['url'];
    	}
    	if(array_key_exists("video_versions", $row)) 
    	{
    		foreach ($row['video_versions'] as $value1) {
	    		$ad['video_url'] = $value1['url'];
	    	}
    	}
    	else
    	{
    		$ad['video_url'] = "";
    	}
    	$res[]=$ad; 
    }
}
$re['error'] = false; 
$re['message'] = 'data fetched';
$re['data'] = $res;
echo json_encode($re);
?>