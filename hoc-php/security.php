<!--
- 2 lỗi ba mâ cơ bản trong form
+ XSS : cross-site scritring -->
<?php
if (isset($_POST['submit'])){
    $fullname = $_POST['fullname'];
    echo "tên của bạn: $fullname";
  //  <script>alert('hello')</script>
}?>
<form>
    nhập tên :
    <input type="text" name="fullname">
    <input type="submit" name="submit" value="hiển thị ">
</form>