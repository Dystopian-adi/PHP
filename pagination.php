<?php

$con=mysqli_connect("localhost","root","","ax_poster_maker");
// variable to store number of rows per page
$limit = 10;  
// query to retrieve all rows from the table Countries
$getQuery = "select * from ax_poster_upcoming_thumb";    
// get the result
$result = mysqli_query($con, $getQuery);  
$total_rows = mysqli_num_rows($result);    
// get the required number of pages
$total_pages = ceil ($total_rows / $limit);    
// update the active page number
// echo $_POST['page'];
if (!isset ($_POST['page']) ) {  
    $page_number = 1;  
} else {  
    $page_number = $_POST['page'];  
}    
// get the initial page number
$initial_page = ($page_number-1) * $limit;   
// get data of selected rows per page    
$getQuery = "SELECT *FROM ax_poster_upcoming_thumb LIMIT " . $initial_page . ',' . $limit;
// echo $getQuery;  
// $result = mysqli_query($con, $getQuery);       
// //display the retrieved result on the webpage  
// while ($row = mysqli_fetch_array($result)) {  
//     echo $row['cat_id'] . ' ' . $row['cat_name'] . '</br>';  
// }    
?>