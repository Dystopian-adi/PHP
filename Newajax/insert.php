<?php 
include('backend/database.php');
$name=$_POST['fname'];
// echo $name;
$email=$_POST['femail'];
// echo $email;
$gender=$_POST['fgender'];
$sports=$_POST['fsports'];
$details=$_POST['fdetails'];
$sql="INSERT INTO `crud`(`name`, `email`, `gender`, `sports`, `details`) 
VALUES ('{$name}','{$email}','{$gender}','{$sports}','{$details}')";
// $result=mysqli_query($conn,$sql) or die('query failed');
if(mysqli_query($conn,$sql)){
    echo "insert successfull";
}else{
    echo "insertion failed";
}