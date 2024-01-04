<?php
session_start();
?>
<meta charset="utf-8">
<?php
if (isset($_SESSION["u_username"])) {
    echo "สวัสดีคุณ : " . $_SESSION["u_username"] . "<br>คุณยังอยู่ใน session นะครับ";
} else {
    echo "คุณยังไม่ได้เข้าสู่ระบบ";
}
?>

//**********************
<?php /*
session_start();
?>
<meta charset="utf-8">
<?php
echo "สวัสดีคุณ :";
echo $username."<br>คุณยังอยู่ใน session น้ะครับ";
*/
?>