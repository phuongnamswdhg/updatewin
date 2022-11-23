<?php
//demo 1 số hàm cơ bản sử lý chuỗi , số , thời  gian
//1 - sử lý string chuôi
//+ lấy độ dài chuỗi : strlen
//ctrl+Q
$count = strlen('abc');//3
// chuyển thành chuỗi ký tự hoa :strtoupper
$str = strtoupper('qưeqwe');
//+ chuyển thành chuỗi thường: strtolower
//+ chuyển ký tự đầu tiên thành ký tự hoa
echo ucfirst('nam đẹp zai');
//+ hàm cắt chuỗi :substr ctrl+P
echo substr('hello 123', 3);// lo 123
//+ thao tác về số :
//hàm kểm tra kiểu số có phải số hay k :is_numeric
$check = is_numeric(123); //true
//+ hàm làm tròn lên theo phần thập phân : round
echo round(12.123232323);//121
echo round(12.123232323, 2);//12.13
//+làm tròn lân số nguyên gần nhất :ceil
echo ceil(1.37); //2
echo ceil(-1.37);//-1
//+làm tròn xuống số nguyên gần nhất : floor
echo floor(1.37);//1
echo floor(-1.37);//-2
//+ Format số :
$price = 1000000;
echo number_format($price);//1,000,000
echo number_format($price, NULL, NULL,'.');
//+3  thao tác hàm về thời gian time
//+ số giâytinhsh từ thời điểm hiện tại so vs 01-01-1970
echo time();
//sét múi giờ:
date_default_timezone_set('Asia/Ho_Chi_Minh');
//+Format thời gian lấy ra ngày giờ hiện tại : 03//11/2022 21:10:11
echo date('d/m/y H:i:s');
