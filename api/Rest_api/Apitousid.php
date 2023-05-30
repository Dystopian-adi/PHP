<?php
if($_SERVER['REQUEST_METHOD']=="POST")
{
	$con = mysqli_connect("localhost", "root", "", "isud");
	$getparam = mysqli_query($con,"SELECT * FROM nani");
	$param = mysqli_fetch_assoc($getparam);
	if ($_POST['appkey']==$param['appkey'] && $_POST['device']==$param['device'] && $_POST['version']==$param['version'] && $_POST['os']==$param['os'])
	{
		if($_POST['action']=="show")
		{
			$result = mysqli_query($con, "SELECT * FROM harbingers");
			while($row = mysqli_fetch_assoc($result))
				{
					$h[]=$row;
				}	
				$response[]=$h;
				echo json_encode(array('harbingers'=>$response));
		}elseif($_POST['action']=="insert"){
			if(!empty($_POST['name']) && !empty($_POST['address']) && !empty($_POST['vision']) && !empty($_POST['no'])){
					$result = mysqli_query($con, "SELECT * FROM harbingers");
					while($row = mysqli_fetch_assoc($result)){
						$no['no']=$row['no'];
					}
					$uno[]=$no;
					if(!in_array($_POST['no'],$uno)){
					$name=$_POST['name'];
					$address=$_POST['address'];
					$vision=$_POST['vision'];
					$no=$_POST['no'];
					$q=mysqli_query($con,"INSERT INTO `harbingers`(`name`,`address`,`vision`,`no`) VALUES ('$name','$address','$vision','$no')");
					echo json_encode(array('Status'=>500,'msg'=>"Inserted..."));
				}
				else{
				echo json_encode(array('Status'=>500,'msg'=>"no already defined..."));
				}
			}else{
				echo json_encode(array('Status'=>500,'msg'=>"please enter the needed values..."));
			}
		}elseif($_POST['action']=="update"){
			if(!empty($_POST['name']) && !empty($_POST['address']) && !empty($_POST['vision']) && !empty($_POST['no']) && !empty($_POST['update_id']))
			{	
				$result = mysqli_query($con, "SELECT * FROM harbingers");
				while($row = mysqli_fetch_assoc($result)){
					$no['no']=$row['no'];
				}
				$uno[]=$no;
				if(!in_array($_POST['no'],$uno)){						
					$update_id=$_POST['update_id'];
					$name=$_POST['name'];
					$address=$_POST['address'];
					$vision=$_POST['vision'];
					$no=$_POST['no'];
					$uq=mysqli_query($con,"UPDATE `harbingers` SET `name`='$name',`address`='$address',`vision`='$vision',`no`='$no' WHERE h_id = $update_id");
					echo json_encode(array('Status'=>500,'msg'=>"Updated..."));
				}
				else{
				echo json_encode(array('Status'=>500,'msg'=>"no already defined..."));
				}		
			}else{
				echo json_encode(array('Status'=>500,'msg'=>"Not Updated..."));
			}
		}elseif($_POST['action']=="delete"){
			if(!empty($_POST['delete_id'])){	
				$delete_id=$_POST['delete_id'];
				$dq=mysqli_query($con,"DELETE FROM `harbingers` WHERE h_id = $delete_id");
				echo json_encode(array('Status'=>500,'msg'=>"deleted..."));
			}else{
				echo json_encode(array('Status'=>500,'msg'=>"Not deleted..."));
			}
		}else{
			echo json_encode(array('Status'=>500,'msg'=>"Action improper..."));
		}
	}
	else{
		echo json_encode(array('Status'=>500,'msg'=>"credential improper..."));
	}
}else{
	echo json_encode(array('Status'=>500,'msg'=>"calling improper method..."));
}
?>