<!-- from là nơ user nhập thông tin vào sau đó supbmit form để thông tin đc gửi lên serves xử lý
2 sử lý foem
+ thông tin dạng cơ bản : text , số , radio, checkbok..
+ thông tin file

-->
<!--action : đường dẫn để sử lý from gửi lên , chuỗi rỗng tương đương với file hiện tại xử l submit
+ met
-->
<?php
// quy trình 8 bước xử lý form:
// B1 debug: dựa vào method của form để debug mảng tương đương
echo '<pre>';
print_r($_POST);
echo  '</pre>';
//B2 tạo biến chứa lỗi và kết quả để hiển thị ra form
$error = '';
$result = '';
//B3 tra nếu form đc submit r thì mới sử lý form :
if (isset($_POST['show'])){
    //B4 lấy giá trị của form gửi lên để thao tác cho dễ
    $fullname = $_POST['fullname'];
    //B5 validate form : dổ thông tin lỗi vào biến error
    //+ tên k đc để trống : empty
    //+ tên tối thiểu 3 ký tự: strlen
    if (empty($fullname)){
        $error = 'tên k đc để trống';

    }elseif (strlen($fullname) <3){
        $error = 'tên ít nhất 3 ký tự ';
    }
    //B6 xử lý logic chính của bài toán chỉ khi k có lỗi sảy ra
    if (empty($error)) {
        $result = "tên của bạn là : $fullname";
    }
}
//B7 :đổ thông tin lỗi và kết quả ra form
//B8 đổ dữ liệu ra input cảu form sau khi submit -> trải nhiệm ng dùng


?>
<h3 style="colo : red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result;?> </h3>
<form action="" method="post">
nhập tên bạn:
    <input type="text" name="fullname" value="<?php echo isset($_POST['fullname']) ? $_POST['fullname'] : '' ?>"/>
    <br>
    <input type="submit" name="show" value="hiển thị"/>
</form>
