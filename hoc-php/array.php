<?php
//array.php
// Kiểu dữ liệu mảng
// 1 - Định nghĩa
// + Là kiểu dữ liệu có cấu trúc
// + Lưu đc nhiều giá trị tại 1 thời điểm, các giá trị có thể
//có thể là bất cứ kiểu dữ liệu nào
// Bài toán, lưu trữ tên của 500 anh em và hiển thị ra toàn bộ
//500 tên đó
$name1 = 'a';
$name2 = 'b';
$name3 = 'c';
echo $name1;
echo $name2;
echo $name3;
// 2 - Cú pháp khai báo: 2 cách
// C1: dùng cho mọi phiên bản PHP
$names = array('a', 'b', 'c');
// C2: dùng chi PHP >= 5.4
$names = ['a', 'b', 'c'];
// 3 - Thuật ngữ
// + element: là phần tử mảng
// + key - value: đặc trưng cho từng phần tử mảng, để xác định
//đc chính xác 1 phần tử mảng, bắt buộc phải dựa vào key của nó
$numbers = [2, 4, 6, 8];
// Phần tử mảng có key = 2, value = 6
// Phần tử mảng có key = 3, value = 8
// Phần tử mảng có key = 4, value = lỗi undefined
// 4 - Thao tác thủ công để lấy giá trị mảng:
echo $numbers[2]; //6
echo $numbers[3]; //8
// echo $numbers[4]; // lỗi undefined
// - Cách debug mảng:
echo '<pre>';
print_r($numbers);
echo '</pre>';
//5 sử dụng vòng lặp để xử lý  mảng :
$numbers =[2,4,6,8];
//lấy số phần tử mảng:
$count = count($numbers); //4
for ($key = 0 ; $key < $count; $key++) {
    echo $numbers[$key];
}
// for, while, do ... while khi lặp mảng luôn cần đến số phần tử mảng tr phải thân điều khiển lăp -> t thao tác và ngoài ra chỉ lặp đc cho mảng có key là số

//6 vòng lặp foreach chuyên dùngdđể lặp mảng
$numbers = [2,4,6,8];
// dạng đầy đủ key value
foreach ($numbers AS $key => $value) {
    echo "phần tử mảng có key = $key thì value = $value";
}
//dạng khuyết key
foreach ($numbers AS $value) {
    echo "value = $value";
}
// 7 phân loại mảng :
//+ mảng số nguyên/tuần tự : key đều ở dạng số nguyên
$names = ['a', 'b','c','d'];
//+ mảng kết hợp : key xuất hiện ở dạng chuỗi
$infos = [
    'fullname' => 'namdz',
    'age' => 20,
    'address' => 'HG'
];
echo '<pre>';
print_r($infos);
echo '</pre>';
//lấy thủ công ;
echo $infos['fullname'];//namdz
echo $infos['address'];//HG
//lấy dùng vòng lặp :
foreach ($infos AS $string => $info){
    echo "key: $string, value: $info";

}
//+ mảng đa chiều : mảng trong mảng
$infos =  [
    'classNAme' => 'php0922e',
    'amount' => 23 ,
    'province' => [
        'HG',
        'TQ',
        'HN' => [
            'a',
            'b',
            'c'
        ]
    ]
    ];
// lấy thủ công
echo $infos['province'][0]; //HN
echo $infos['province']['HN'][1];//b
echo '<pre>';
print_r($infos);
echo '</pre>';
//vòng lặp :
foreach ($infos AS $key => $value){
    //echo "<br>key: $key ,value: $value" cẩn thaank khi echo trong mảng đa chiều

}
// mảng càng nhiều chiều càng phức tạp , nếu mảng do bạn tự định nghĩa chỉ nên dừng ở tối đa 3 chiều
// 8 thẻ viết tắt của foreach
//+ dùng khi hiển thị HTML phức tạp
$class= ['HTML','CSS','JS', 'PHP'];
?>
<table border="1" cellspacing="8" cellpadding="0">
    <tr>
        <td>tên lớp</td>
    </tr>
    <?php foreach ($class AS $language): ?>
    <tr>
        <td><?php echo $language;?> </td>
    </tr>
<?php endforeach;?>
</table>

<?php
//9 1 số hàm php thao tác với mảng
//+ tính tổng mảng :
$numbers = [1,2,3];
$S= array_sum($numbers);//6
//+ ktra tồn tại phần tử mảng thei=o key hay không :isset
$names = ['a','b','c'];
$check = isset($names[4]); //false
var_dump($check);
//+ đếm số ohaanf rử mảng : count
//+ chuyển chuỗi thành mảng dựa vào ký tự phân tách : explode
$str = 'hello mandz 123';
$arrs = explode(' ',$str);
echo '<pre>';
print_r($arrs);
echo '</pre>';

// chuyển về chuỗi implode
//xóa phần tử mảng : unset
$numbers = [1,2,3];
unset($numbers[2]);
echo '<pre>';
print_r($numbers);
echo '</pre>';
?>