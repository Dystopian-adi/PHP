<?php
$con = mysqli_connect("localhost", "root", "", "categories");
$result = mysqli_query($con, "SELECT * FROM categories");
$xml=new DOMDocument('1.0/utf8');
$xml->formatOutput=true;
$dv=$xml->createElement("categories");
$xml->appendChild($dv);
while($row = mysqli_fetch_assoc($result))
{
	// $ar[]=$row;
	$id=$row['category_id'];
    $for=$xml->createElement("category_id",$row['category_id']);
    $for=$xml->createElement("category_name",$row['category_name']);
	$query= mysqli_query($con, "SELECT * FROM sub_categories where category_id='$id'");	
	$f=$xml->createElement("sub_data");
	while($row1 = mysqli_fetch_assoc($query))
	{
		$ad=$xml->createElement("scat_name",$row1['sub_category_name']);
		$sid=$row1['sub_category_id'];
		$f1=$xml->createElement("in_sub_data");
	    $query1 = mysqli_query($con, "SELECT * FROM s_sub_cat WHERE sub_id='$sid'");
	    while($d = mysqli_fetch_assoc($query1))
		{
			$rd1=$xml->createElement("in_scat_id",$d['in_sub_id']);
			$rd2=$xml->createElement("name",$d['name']);
			$rd3=$xml->createElement("image",'http://localhost/p1/'.$d['image']);
			$f1->appendChild($rd1);	
			$f1->appendChild($rd2);		
			$f1->appendChild($rd3);	
			$ad->appendChild($f1);	
		}
    	$f->appendChild($ad);
	}          
    $for->appendChild($f);
    $dv->appendChild($for);
}
echo $xml->savexml();
?>
