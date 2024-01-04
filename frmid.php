<meta charset="utf-8">
<?php
session_start();

// Assuming include('include/connect.php'); contains your database connection
include('include/connect.php');

// Remove deprecated session_register
// Use $_SESSION directly to store session variables
$_SESSION["username"] = $_POST["username"];
$_SESSION["password"] = $_POST["password"];

$u_username=$_POST['u_username'];
$u_password=$_POST['u_password'];

//***********************************
if(($u_username=='')&&($u_password=='')){
echo ('Login สำเร็จ <br><br>');

echo ('สวัสดีคุณ  :  '.$u_username.'<br>');
echo ('ลองไปอีกหน้าดูซิว่าคุณ ' .$u_username. ' ยังอยู่หรือไม่<br>');
echo ('<a href="session2.php">session2.php</a><br><br>');
}
else{
echo ('username หรือ password ไม่ถูกต้อง<br><br>');
echo ('<a href="login.php">กลับไปหน้าLogin</a><br><br>');
}
echo ('<a href="logout.php">ล้างตัวแปร</a>');

?>

<?php
session_start();
session_register("u_username");
session_register("u_password");
?>
