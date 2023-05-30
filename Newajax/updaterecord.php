<?php 
include('backend/database.php');
$id=$_POST['id'];
$name=$_POST['name'];
$email=$_POST['email'];
$gender=$_POST['gender'];
$sports=$_POST['sports'];
$details=$_POST['details'];
$sql="UPDATE crud SET name='{$name}',email='{$email}',gender= '{$gender}',sports='{$sports}',details='{$details}' WHERE id={$id}";
if(mysqli_query($conn,$sql)){
    echo "update succesfull successfull";
}else{
    echo "update failed";
}