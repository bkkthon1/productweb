<?php
session_start();

$u_username = $_POST['u_username'];
$u_password = $_POST['u_password'];

if (($u_username=="atcha")&&($u_password="123456")) {
echo "Login สำเร็จ";
echo "สวัสดี : ".$u_username;
echo "<br>";
echo "ลองไปอีกหน้าดูซิว่า username ยังอยู่หรือไม่<br>";
echo "<a href='session2.php'>session2.php</a> <br>";
}else{
echo "username หรือ password ไม่ถูกต้อง";
echo "<a href='login.php'>กลับไปหน้าLogin</a> <br>";
}

echo ('<a href="logout.php">ล้างตัวแปร</a>');
?>