<?php
session_start();

// Assuming include('include/connect.php'); contains your database connection
include('include/connect.php');

// Remove deprecated session_register
// Use $_SESSION directly to store session variables
$_SESSION["username"] = $_POST["username"];
$_SESSION["password"] = $_POST["password"];

$username = mysqli_real_escape_string($connect, $_POST["username"]);
$password = mysqli_real_escape_string($connect, $_POST["password"]);

// During user registration
$hashedPassword = password_hash($plainTextPassword, PASSWORD_DEFAULT);
// Save $hashedPassword to the database

// Assuming your 't_user' table has columns 'u_username' and 'u_password'
$sql = "SELECT * FROM t_user WHERE u_username = '$username' AND u_password = '$password'";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);

if ($row) {
    echo "Login สำเร็จ";
    echo "สวัสดี" . $username;
    echo "<br>";
    echo "ลองไปอีกหน้าดูซิว่า username ยังอยู่หรือไม่<br>";
    echo "<a href='session2.php'>session2.php</a> <br>";
} else {
    echo "username หรือ password ไม่ถูกต้อง";
    echo "<a href='login.php'>กลับไปหน้า Login</a> <br>";
}

// Close the database connection
mysqli_close($connect);
?>
