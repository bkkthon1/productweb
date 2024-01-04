<meta charset="utf-8">
<?php
session_start();

// Assuming include('include/connect.php'); contains your database connection
include('include/connect.php');

// Remove deprecated session_register
// Use $_SESSION directly to store session variables
$_SESSION["u_username"] = $_POST["u_username"];
$_SESSION["u_password"] = $_POST["u_password"];

$u_username = mysqli_real_escape_string($connect, $_POST["u_username"]);
$u_password = mysqli_real_escape_string($connect, $_POST["u_password"]);

// During user registration
$hashedPassword = password_hash($plainTextPassword, PASSWORD_DEFAULT);
// Save $hashedPassword to the database

// Assuming your 't_user' table has columns 'u_u_username' and 'u_password'
$sql = "SELECT * FROM t_user WHERE u_username = '$u_username' AND u_password = '$u_password'";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);

if ($row) {
    echo "Login สำเร็จ";
    echo "สวัสดี : " . $u_username;
    echo "<br>";
    echo "ลองไปอีกหน้าดูซิว่าคุณ ' .$u_username. ' ยังอยู่หรือไม่<br>";
    echo "<a href='session2.php'>session2.php</a> <br>";
} else {
    echo "username หรือ password ไม่ถูกต้อง";
    echo "<a href='login.php'>กลับไปหน้า Login</a> <br>";
}

// Close the database connection
mysqli_close($connect);
?>
