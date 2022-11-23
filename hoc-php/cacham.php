<?php
//test_file_.php
//-  các hàm nhứng trong file trong php
echo'nội dùng file test_file.php';
// tạo 1 file test1.php ngang cùng cấp vs p0hp
// nhung file : include, require, include_once,
// require_once -> 2 nhóm include và require

include 'test1.php';// nhúng nhiều lần
include_once 'test1.php';// nhúng 1 lần
include_once 'test1.php';

require_once 'test1.php';// khác vs include file k tồn tại mà code vẫn chạy như include
//->ưu tiên dùng require_once để nhúng file 1
// lần duy nhất và dừng thực thi khi file k tồn tại

echo 'hello';
?>
