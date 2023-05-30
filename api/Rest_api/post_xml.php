<?php
if($_SERVER['REQUEST_METHOD']=="POST")
{
	$con = mysqli_connect("localhost", "root", "", "categories");
	$getparam = mysqli_query($con,"SELECT * FROM parameters");
	$param = mysqli_fetch_assoc($getparam);
	$getCat = mysqli_query($con,"SELECT * FROM categories");
	while ($cat = mysqli_fetch_assoc($getCat)) 
	{	$c[]= strtolower($cat['category_name']);	}
	array_push($c,"all");
	if ($_POST['appkey']==$param['appkey'] && $_POST['device']==$param['device'] && $_POST['version']==$param['version'] && $_POST['os']==$param['os'] && strtolower(in_array($_POST['category'],$c))) 	
	{
	$result = mysqli_query($con, "SELECT * FROM categories");
	$xml=new DOMDocument('1.0/utf8');
	$xml->formatOutput=true;
	$dv=$xml->createElement("categories");
	$xml->appendChild($dv);
	while($row = mysqli_fetch_assoc($result))
	{
		$id=$row['category_id'];
	    $for=$xml->createElement("category_id",$row['category_id']);
	    $for=$xml->createElement("category_name",$row['category_name']);
		if($_POST['category']=="all")
		{	
			$query= mysqli_query($con, "SELECT * FROM sub_categories where category_id='$id'");	
		}else{
			$main_cat=$_POST['category'];
			$query= mysqli_query($con, "select * from sub_categories as p,categories as c where c.category_id=p.category_id and c.category_name='$main_cat' and p.category_id='$id'");	
		}	
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
		if(mysqli_num_rows($query)>0)
	    {
	    $dv->appendChild($for);
	    }
	}
	echo $xml->savexml();
	}else{
		$xml=new DOMDocument('1.0/utf8');
		$xml->formatOutput=true;
		$msg="Improper Credential...";
		$show=$xml->createElement("Message",$msg);
		$xml->appendChild($show);
		echo $xml->savexml();
	}
	}else{
	$xml=new DOMDocument('1.0/utf8');
	$xml->formatOutput=true;
	$msg="Calling Improper Method.....";
	$show=$xml->createElement("Message",$msg);
	$xml->appendChild($show);
	echo $xml->savexml();
}
?>