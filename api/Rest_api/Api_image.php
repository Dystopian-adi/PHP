<?php
if($_SERVER['REQUEST_METHOD']=="POST")
{
	$con = mysqli_connect("localhost", "root", "", "photos");
	// $getparam = mysqli_query($con,"SELECT * FROM parameters");
	// $param = mysqli_fetch_assoc($getparam);
	// if ($_POST['appkey']==$param['appkey'] && $_POST['device']==$param['device'] && $_POST['version']==$param['version'] && $_POST['os']==$param['os'])
	// {
		if($_POST['action']=="show"){
			$show = mysqli_query($con,"SELECT * FROM `image`");
			while($row = mysqli_fetch_assoc($show))
				{
					$adi["id"]=$row['image_id'];
					$adi["image"]='http://localhost/p1/image/'.$row['filename'];
					$adi["uploaded_on"]=$row['uploaded_on'];
					$i[]=$adi;
				}	
				$response[]=$i;
				echo json_encode(array('Status'=>400,'data'=>$response));
		}elseif($_POST['action']=="insert"){
			if(!empty($_FILES["addimage"]["name"])){
				$targetDir = "image/";
				$fileName = basename($_FILES["addimage"]["name"]);
				if(!file_exists($targetDir . $fileName)){
					date_default_timezone_set('Asia/Kolkata'); 
					$today = date("Y-m-d H:i:s");
					$targetFilePath = $targetDir . $fileName;
					$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);			 
				    $allowTypes = array('jpg','png','jpeg','gif','pdf');
				    if(in_array($fileType, $allowTypes)){
				        if(move_uploaded_file($_FILES["addimage"]["tmp_name"], $targetFilePath)){		            
				            $insert = mysqli_query($con,"INSERT INTO `image`(`filename`,`uploaded_on`) VALUES ('$fileName','$today')");
				            if($insert){
				                 echo json_encode(array('Status'=>500,'msg'=>"The file ".$fileName. " has been uploaded successfully."));
				            }else{
				                 echo json_encode(array('Status'=>500,'msg'=>"File upload failed, please try again."));
				            } 
				        }else{
				             echo json_encode(array('Status'=>500,'msg'=>"Sorry, there was an error uploading your file."));
				        }
				    }else{
				        echo json_encode(array('Status'=>500,'msg'=>"Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload."));
				    }
				}else{
					echo json_encode(array('Status'=>500,'msg'=>"file already exists."));	
				}
			}else{
			     echo json_encode(array('Status'=>500,'msg'=>"Please select a file to upload."));
			}
		}elseif($_POST['action']=="update"){
			if(!empty($_FILES["addimage"]["name"]) && !empty($_POST['update_id'])) {
					$targetDir = "image/";
					$fileName = basename($_FILES["addimage"]["name"]);
				if(!file_exists($targetDir . $fileName)){
					$update_id=$_POST['update_id'];
					date_default_timezone_set('Asia/Kolkata'); 
					$today = date("Y-m-d H:i:s");
					$targetFilePath = $targetDir . $fileName;
					$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);			 
				    $allowTypes = array('jpg','png','jpeg','gif','pdf');
				    if(in_array($fileType, $allowTypes)){
				    	$unlk = mysqli_query($con, "SELECT `filename` FROM `image` WHERE image_id = $update_id");
				    	$delimage = mysqli_fetch_assoc($unlk);
				    	// print_r($delimage['filename']);die();
				    	unlink('C:/xampp/htdocs/p1/image/'.$delimage['filename']);
				        if(move_uploaded_file($_FILES["addimage"]["tmp_name"], $targetFilePath)){		            
				            $update = mysqli_query($con,"UPDATE `image` SET `filename`='$fileName',`uploaded_on`='$today' WHERE image_id = $update_id");
				            if($update){
				                 echo json_encode(array('Status'=>500,'msg'=>"The file ".$fileName. " has been uploaded successfully."));
				            }else{
				                 echo json_encode(array('Status'=>500,'msg'=>"File upload failed, please try again."));
				            }
				        }else{
				             echo json_encode(array('Status'=>500,'msg'=>"Sorry, there was an error uploading your file."));
				        }
				    }else{
				        echo json_encode(array('Status'=>500,'msg'=>"Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload."));
					}
				}else{
					echo json_encode(array('Status'=>500,'msg'=>"image already exists:Please submit another image."));			
				}
			}else{
				echo json_encode(array('Status'=>500,'msg'=>"Please select a file to upload."));
			}
		}elseif($_POST['action']=="delete"){
	    	if(!empty($_POST['delete_id'])){
				$delete_id=$_POST['delete_id'];
				$unlk = mysqli_query($con, "SELECT `filename` FROM `image` WHERE image_id = $delete_id");
		    	$delimage = mysqli_fetch_assoc($unlk);
		    	unlink('C:/xampp/htdocs/p1/image/'.$delimage['filename']);
				$dq=mysqli_query($con,"DELETE FROM `image` WHERE image_id = $delete_id");
				echo json_encode(array('Status'=>500,'msg'=>"image deleted..."));
			}else{
				echo json_encode(array('Status'=>500,'msg'=>"Not deleted..."));
			}
		}else{
			echo json_encode(array('Status'=>500,'msg'=>"Action improper..."));
		}	
	// }else{
	// 	echo json_encode(array('Status'=>500,'msg'=>"credential improper..."));
	// }
}else{
	echo json_encode(array('Status'=>500,'msg'=>"calling improper method..."));
}
?>