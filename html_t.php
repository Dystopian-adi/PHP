<?php
require 'simple_html_dom.php';

$html = file_get_html('http://localhost/p2/1.html');
// $html = file_get_html('http://localhost/p2/2.html');
$str = '';
// get news block
foreach($html->find('table tbody tr') as $article) {
    // $lasun = str_replace('<span style="color: rgb(255, 255, 255);">', '', $article);
    // $kanda = str_replace('</span>', '', $lasun);
    // $str .= $kanda.",";
    foreach($article->find('td') as $value) {
    	echo strip_tags($value);
    }
}
// echo $str;
// $array = explode(",", $str);
// $mine = array_diff($array, ['']);
// // print_r($array);
// echo json_encode(array("data" => $mine));
?>