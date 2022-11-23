<?php
//connection.php
//- cách kết nối csdl Mysql thừ php sử dụng thư viện :
//+ mysqli: sử dụng tại thời điểm hiện tại để demo
// hỗ trọ code kết nối = function php thuần , OOP
// chỉ hỗ trợ kết nối tới csdl Mýql
//+PDO: sử dụng sau khi OPP
// chỉ hỗ trợ code theo OOP
// hỗ trọ kết nối tới nhiều csdl
//1 - cài thư viện Mysqli: xampp cài
// 2 - code kết nối sử dụng mýqli
//+ tạo csdl: php0922e_mysqli
//+ tạo bảng: products: id,name,price,created_at
//a / khởi tạo kết nối :
// khai báo hằng số lưu thông tin kết nối :
// tên máy chủ đag lưu csdl cần kết nối :
const DB_HOST = 'localhost';
// username login vào csdl:
const DB_USERNAME = 'root'; // username XAMP tạo ra
// password login csdl:
const DB_PASWORD = '';//pasword XAMPP tạo với tài khoản root
// tên csdl sẽ kết nối:
const DB_NAME = 'php0922e_mysqli';
//cổng của csdl s kết nối : dựa vào XAMPP để check port
const DB_PORT = 3306;
$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASWORD, DB_NAME, DB_PORT);
if(!$connection) {
    die('lỗi kết nối: '. mysqli_connect_error());
}
echo 'kết nối vsdl php0922e_mysqli thành công';
// b - INSERT:
// products:id,name,price,created_at
//B1 - viết truy vấn :
$sql_insert = "INSERT INTO products(name, price)
VALUES('Iphuone123', 1000)";
//B2 - thực thi truy vấn : INSERT trả về boolean
$is_insert = mysqli_query($connection, $sql_insert);
var_dump($is_insert);
// cách debug khi false, copy chuối truy vấn B1 , thực thi trực tiếp tại tab sql của phpMyadmin trong csdl tương ướng
//c - update
// cập nhập name = abc, price = 123 với id = 1
//B1 - viết truy vấn :
$sql_update = "UPDATE products SET name='abc', price=123
WHERE id = 1";
//B2 thực thi chuy vấn : update trả về boolean
$is_update = mysqli_query($connection, $sql_update);
var_dump($sql_update);
//d - delete:
// xóa user có id > 4
//B1 viết truy vấn :
$sql_delete = "DELETE FROM products WHERE id > 4";
//B2 - thực thi :delete trả về boolea
$is_delete = mysqli_query($connection, $sql_delete);
var_dump($sql_delete);
// 3 truy vấn INSERT, UPDATE , DELETE giống nhua vè các bước
//e - select :
//+ SELECT 1 bản ghi : lấy ra sản phẩn có id =1
//B1 - viết truy vấn :
$sql_select_one = "SELECT * FROM products WHERE id = 1 ";
// B2 THỰC THI truy vấn :SELECT trả về obj trung gian nào đó
$result_one = mysqli_query($connection,$sql_select_one);
//B3 trả về rưới dạng mảng kết hợp 1 chiều :
$products = mysqli_fetch_assoc($result_one);
echo '<pre>';
print_r($products);
echo '<pre>';
echo "tên: ". $products['name'];
//+ SELECT nhiều bản ghi : lấy ra tất cả sẩn phẩm
//B1 - viết truy vấn :
$sql_select_all = "SELECT * FROM products";
//B2 - thực thi : select trả về obj trung gian
$result_all = mysqli_query($connection, $sql_select_all);
//B3 - trả về mảng kết hợp 2 chiều chứa các bản ghi :
$products = mysqli_fetch_all($result_all, MYSQLI_ASSOC) ;
echo '<pre>';
print_r($products);
echo '<pre>';
foresch ($products AS $products) {
    echo "tên sản phẩm: " .$products['pricce'];
}

?>