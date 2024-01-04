<?php
session_start();

// Remove deprecated session_register
// Use $_SESSION directly to store session variables
$_SESSION["username"] = $_POST["username"];
$_SESSION["password"] = $_POST["password"];

$username = $_POST["username"];
$password = $_POST["password"];

if ($username == " " && $password == " ") {
    echo "Login สำเร็จ";
    echo "สวัสดี" . $username;
    echo "<br>";
    echo "ลองไปอีกหน้าดูซิว่า username ยังอยู่หรือไม่<br>";
    echo "<a href='session2.php'>session2.php</a> <br>";
} else {
    echo "username หรือ password ไม่ถูกต้อง";
    echo "<a href='login.php'>กลับไปหน้า Login</a> <br>";
}
?>
