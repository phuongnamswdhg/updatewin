<?php
$data = file('demo.txt');
echo '<pre>';
print_r($data);
echo '</pre>';
$content = file_get_contents('demo.txt');
var_dump($content);
//echo file_get_contents('htt://123abc');
//2 ghi file
file_get_contents('abc.txt', '123');
//ghi nối tiếp
file_get_contents('def.txt', '456', FILE_APPEND);
