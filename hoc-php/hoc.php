<!DOCTYPE html>
<html>
<head>
    <title>php co ban</title>
</head>
<body>
<?php
//1-biến
$name = 'manhnv';
$age = 32;
// kiểu giữ liệu
//+ integer : kiểu số nguyên
$munber1 = 123;
$munber2 = -123;
// hàm dubeg (xem thông tin)
var_dump($munber1);
echo $munber1; //123
//+ float(double): kiểu số thực hoặc số nguyên ngoài phạm vi
//integer
$munber1= 1.23;
var_dump($munber1);
//+string; được bao bởi ' hoăc "
$name = 'manhnv';
$address = "hn";
//+  chuỗi nối
echo 'tên của tôi là :' . $name;
echo "tên của tôi là : $name ";
echo 'tên của tôi là : $name';
var_dump($name);
//+ boolean: true/false
$is_male = true;
$is_female = false;
$a = TRue ;
var_dump($is_male);
//-4 kiểu dữ liệu trên là kiểu dữ liệu nguyên thủy
//+ null: 1 giá trị duy nhất là null
$var1 = null;
var_dump($var1);
//+ array: kiểu ,mảng
//+ object: kiểu đối tượng
// 3 ép kiểu dữ liệu : sử dụng từ khóa khiểu dữ liệu trc biến
$munber = 11.5;
var_dump($munber);//float
$result1 = (integer) $munber; //1
$result2  = (integer) $munber;// '11.5'
//0, chuỗi rỗng , null, mảng rỗng , đối tượng rỗng ép sang boollean
//= false, và ngược lại

$result3 = (bool) $munber ; //true
if (3) {
    echo 'hello';
}
//4 hằng
//+ cú pháp
define('PI',3.14);
define('MAX',10);
const FULLNAME = 'manhnv'; // ưu tiên
echo FULLNAME ;
// FULLNAME = 'abc;
echo "<br>" . __LINE__;
echo "<br>" . __FILE__;
echo "<br>" . __DIR__;
//5 HÀM
function sum($number1,$number2) {
    return $number1 + $number2;

}
$sum1 = sum(number1, number2);
echo"tổng =  $sum1";
//6  - truyền kiểu biến tham trị , tham chiếu vào hàm

$munber = 5;
echo "<br> ban đầu number = $munber";//5
function changeNumber($num){
    $num = 1;
    echo "<br>bên trong hàm giá trị, =$num";

}
 changeNumber($num); {
    $num=1;
    echo"<br>sau khi gọi hàm, number = $munber";
    //->munber k bị thay đổi sau khi gọi hàm -> truyền tham trị
    //-> truyền bản sao của biến vào trong hàm, bản gốc giữ nguyên


};
?>
</body>
</html>