<?php 
include('backend/database.php');

$id=$_POST['id'];
$sql="Select * from crud  where id= {$id}";
$result=mysqli_query($conn,$sql) or die('sql query failed');
$output="";
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
        $output.="<label>Name</label>  
        <input type='hidden' id='fid' value='{$row['id']}' class='form-control'>
        <input type='text' name='name' id='fname' value='{$row['name']}' class='form-control'><br>
        <label>Email</label> 
        <input type='email' name='email' id='femail'  value='{$row['email']}' class='form-control'><br>
        <label>Gender</label> 
<input type='radio' name='gender' id ='fgender'
 {
     value='male'> Male
        <input type='radio' name='gender' id ='fgender' value='female'> Female<br>
        <label>sports</label> 
        <input type='text' name='number' id='fsports'  value='{$row['sports']}' class='form-control'><br>
        <label>Details</label> 
        <textarea class='form-control' id='fdetails' rows='2'> {$row['details']}</textarea>
        <button type='button' class='btn btn-primary update'>Update</button>
        ";
    }
   echo $output;
}else{
    echo "record not found";
}


