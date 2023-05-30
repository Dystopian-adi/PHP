
<?php
//pagination
$results_per_page = 25; 
$result = $conn->prepare("SELECT `id`, `user_id`, `status`, `sticker_name`, `file_name`, `uploaded_time` FROM `stickers`");
$result->execute();
$rs = $result->get_result();
$number_of_result  = count($rs->fetch_all(MYSQLI_ASSOC));
$number_of_page = ceil ($number_of_result / $results_per_page);
if (!isset($_GET['page']))
{  
  $page = 1;  
}
else
{  
  $page = $_GET['page'];  
}  
$page_first_result = ($page-1) * $results_per_page; 

 $sql = "". $page_first_result . ',' . $results_per_page);
<center>
<div class="pagination pagination1 pagination3 pagination4 pagination6">
<?php
  for($page = 1; $page<= $number_of_page; $page++) 
  {  
    echo '<a href = "list.php?page=' . $page . '">' . $page . ' </a>';  
  }
?>
</div>
</center>

?>