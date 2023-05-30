<?php 
include('backend/database.php');
$id=$_POST['id'];
$sql="DELETE FROM crud where id= {$id}";
if(mysqli_query($conn,$sql)){
    echo "record deleted successfully";
}else{
    echo "record not found";
}
?>