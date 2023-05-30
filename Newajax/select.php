<?php 
include('backend/database.php');

$sql="select *from crud ";
$result=mysqli_query($conn,$sql) or die('sql query failed');
$output="";
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
        $output.="<tr><td>{$row["id"]}</td><td>{$row["name"]}</td>
        <td>{$row["email"]}</td>
        <td>{$row["gender"]}</td>
        <td>{$row["sports"]}</td>
        <td>{$row["details"]}</td>
        <td><button class='btn btn-primary delete' data-id1='{$row['id']}' >Delete</button></td>
        <td><button class='btn btn-success edit' data-id='{$row['id']}'>Edit</button></td></tr>
        ";
    }
   echo $output;
}else{
    echo "record not found";
}
