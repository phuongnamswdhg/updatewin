<!--
xử lý với input radio, checkbox, selectbox, textarea-->
<?php
//8 bước xửa lý form
//B1 debug:
echo '<pre>';
print_r($_GET);
echo '</pre>';
//B2 khai báo error vad result:
$error= '';
$result = '';
//B3 ktr nếu submit form thì mới xử lý form:
if (isset($_GET['show'])){
    //B4 lấy giá trị từ form :
    $email = $_GET['email'];
    // vchus ý nếu như bạn k chọn radio hay checkbox nào thì php k bắt đc dữ liệu :
    $gender = $_GET['gender'];
    $jobs = $_GET['jobs'];
    $country = $_GET['country'];
    $note = $_GET['note'];
    //B5 validate form :
    //phải nhập tất cả các trường
    //email phải dùng định dạng
    if (empty($email)){
        $error = 'phải nhập email';
    }elseif (!isset($_GET['gender' ])){
        $error = 'phải chọn giới tính';
    }elseif (!isset($_GET['jobs'])){
        $error = 'phải chọn nghề nghiệp';
    }elseif (empty($note)) {
        $error = ' phải nhập ghi chú ';
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'email phải đúng định dạng';
    }
    //B6 xử lý logic bài toán chỉ khi ko có lỗi
    if (empty($error)) {
        $result .= " Email: $email";
        //gới tính :
        $gender = $_GET['gender'];
        $gender_text = 'Nam';
        if ($gender ==2){
            $gender_text = 'Nữ';
        }
        $result = "<br> giới tính : $gender";
// nghề nghiệp:
        $jobs = $_GET['jobs'];
        $result .="<br> nghề nghiệp:";
        foreach ($jobs AS $job) {
            switch ($job){
                case 0: $result .="Dev";break;
                case 1 : $result .="tester";break;
                case 2: $result .="bv";
            }
        }
        //quốc gia : xử lý giống radio

        $country_text ='VN';
        if ($country == 1) {
            $country_text = 'JP';
        }
        $result .= "<br> quốc gia : $country_text";
        // ghỉ chú :
        $result .= "<br> ghi chú: $note";

    }
}
//B7 hiển thị error và result ra form


?>

<h3 style="color: red"><?php echo $error;?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>

//B8 hiển thị error và result ra form


<form action="" method="get">
    nhập email:
    <input type="text" name="email" value="<?php echo isset($_GET['email']) ? $_GET['email']: ''?>">
    <br>
    <?php
    // có bao nhiêu radio tạo ra từng đó biến để lưu chẹkbox:
    $checkes_male = '';
    $checked_female = '';
    if (isset($_GET['gender'])) {
        $gender = $_GET['gender'];
        switch ($gender) {
            case 1 :$checked_male = 'checked' ;break;
            case 2 :$checked_female = 'checked' ;
        }
    }
    ?>
    giới tính :
    <input <?php echo $checked_male; ?> type="radio" name="gender" value="1"> Nam
    <input <?php echo $checked_female; ?> type="radio" name="gender" value="2"> Nữ
    <br>
    chọn nghề nghiệp:
    <?php
    //xử lsy tượng tự radio
    $checked_dev = '';
    $checked_tester = '';
    $checked_bv = '';
    if (isset($_GET['jobs'])) {
        $jobs = $_GET['jobs'];
        foreach ($jobs AS $job){
            switch ($job){
                case 0: $checked_dev = 'checked';break;
                case 1: $checked_tester = 'checked';break;
                case 2: $checked_bv = 'checked';break;
            }
        }
    }
    ?>
    <!-- với các input có thể chọn  nhiều value tại 1 thời điểm , name cần ở dạng mảng : checkbox , selrct multiple, filr multiple-->
    <input <?php echo $checked_dev;?> type="checkbox" name="jobs[]" value="0">Dev
    <input <?php echo $checked_tester;?> type="checkbox" name="jobs[]" value="1">tester
    <input <?php echo $checked_bv;?> type="checkbox" name="jobs[]" value="2">bv
    <br>
    <?php
    // select dùng select tại option để trọn sẵn , xử lý giống hệt radio, chỉ khác là select thay vè checked

    // có bao nhiêu radio tạo ra từng đó biến để lưu chẹkbox:
    $select_male = '';
    $select_female = '';
    if (isset($_GET['country'])) {
        $country = $_GET['country'];
        switch ($country) {
            case 1 :
                $select_male = 'select';
                break;
            case 2 :
                $select_female = 'select';
        }
    }

    ?>
    chọ quôc gia :
    <select name="country">
        <option value="0">VN</option>
        <option value="1">JP</option>
    </select>
    <br>
    ghi chú:
    <textarea name="note"></textarea>
    <br>
    <input type="submit" name="show" value="hiển thị">
    <input type="reset" name="reset" value="Reset form">
</form>