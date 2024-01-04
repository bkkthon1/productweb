<?php
session_start();
?>
<meta charset="utf-8">
<?php
include('include/connect.php');

$u_username = $_POST['u_username'];
$u_password = $_POST['u_password'];

// Check for empty fields
if (empty($u_username) || empty($u_password)) {
    echo "<script>";
    echo "alert('กรุณากรอกทุกช่อง');";
    echo "window.location='login.php';";
    echo "</script>";
    exit();
}

$sql = "SELECT * FROM t_user WHERE u_username = ?";
$stmt = mysqli_prepare($connect, $sql);
mysqli_stmt_bind_param($stmt, "s", $u_username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    if (password_verify($u_password, $row['u_password'])) {
        // Password is correct, proceed with login
        $_SESSION['u_username'] = $row['u_username'];
        $_SESSION['u_password'] = $row['u_password'];

        echo "<script>";
        echo "alert('ยินดีต้อนรับเข้าสู่ระบบ');";
        echo "window.location='index.php';";
        echo "</script>";
        exit();
    } else {
        // Password is incorrect
        echo "<script>";
        echo "alert('Username or Password ไม่ถูกต้อง');";
        echo "window.location='login.php';";
        echo "</script>";
        exit();
    }
} else {
    // User not found
    echo "<script>";
    echo "alert('Username or Password ไม่ถูกต้อง');";
    echo "window.location='login.php';";
    echo "</script>";
    exit();
}
?>
