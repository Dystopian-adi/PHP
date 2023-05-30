<?php
// ini_set('memory_limit', '1024M');
// $ch = curl_init();
// $url = "https://clashmentor.com/content.html?entity_type=article&entity_id=1";
// curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_HEADER, 0);

// //should save html in $html
// $html = curl_exec($ch);
// // echo $html;
require 'simple_html_dom.php';

// $html = file_get_html('http://localhost/p2/1.html');
$html = file_get_html('http://localhost/p2/1.html');
$str = '';
// get news block
// foreach($html->find('table tbody tr td strong span') as $article) {
//     // $lasun = str_replace('<span style="color: rgb(255, 255, 255);">', '', $article);
//     // $kanda = str_replace('</span>', '', $lasun);
//     $str .= $kanda.",";
// }
// echo $str;
// $array = explode(",", $str);
// $mine = array_diff($array, ['']);
// // print_r($array);
// echo json_encode(array("data" => $mine));

$str1 ='';
foreach($html->find('table tbody tr td strong') as $article1) {
    // echo $article1;
    // $l = str_replace('<strong><span style="color: rgb(255, 255, 255);">', '', $article1);
    // $k = str_replace('</span></strong>', '', $l);
    // $j = str_replace('</strong>', '', $k);
    // $b = str_replace('<strong>', '', $j);
    $lasun = strip_tags($article1);
    $str1 .= $lasun." , ";
}
// echo $str1;
$array1 = explode(" , ", $str1);
$mine1 = array_diff($array1, ['']);

// print_r($array);
echo json_encode(array("data" => $mine1));
?>