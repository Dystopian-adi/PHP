<?php
date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
$from = date('d-m-Y',strtotime('-15 days'));
$to = date('d-m-Y',strtotime('+30 days'));
echo "date from:-".$from." to the:".$to;
?>