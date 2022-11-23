<?php
echo 'nội dung file test1.php';
//+1 toán tử
//+ toán tử số học + = * / $ ++ ==
//+ toán tử so sánh :==> >= < <= !=
//+ toán tử logic: && || !
//+ toán tử gán : = += -= *= /= *=
// 2 câu lệnh điều kiện :
// +if else elseif
//- toán tử điều kiện, thay thế cho if else
$number = 5;
if ($number  > 0 ) {
    echo 'Number > 0';

}else{
    echo 'Number <=0';
}
echo $number > 0 ? 'Number > 0 ' :'Number <=0';
// -  thẻ viết tắt if else elseif
//+ hển thị 1 bảng html có 2 hàng , mỗi hàng có 2 cột nếu như
//Biến number > 0
$number = 5 ;
if ($number > 0) {
    echo '<table border="1" cellspacing="0" cellpadding="8">   ';
        echo '<tr>';
            echo '<td>A</td>';
            echo '<td>B</td>';
        echo  '<tr>';
        echo '<tr>';
            echo '<td>C</td>';
            echo '<td>D</td>';
        echo '</tr>';
    echo  '</table>';
}
?>
<?php if ($number >0): ?>
<table border="1" cellpadding="0" cellspacing="8">
    <tr>
        <td>A</td>
        <td>B</td>
    </tr>
    <tr>
        <td>C</td>
        <td>D</td>
    </tr>
</table>


<?php if ($number == 0): ?>

<?php elseif ($number ==1):?>
<?php elseif ($number == 2):?>
<?php else:?>



//3 vòng lặp : for while do  while
//4 - từ khóa break, continue trong vòng lặp giống js
