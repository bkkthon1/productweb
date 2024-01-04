<?php
session_start();

$u_username = isset($_POST['u_username']) ? $_POST['u_username'] : '';
$u_password = isset($_POST['u_password']) ? $_POST['u_password'] : '';

if (!empty($u_username) && !empty($u_password)) {
    // Validate the username and password (you might want to check against a database)
    // For now, let's assume validation is successful
    $_SESSION['u_username'] = $u_username;

    echo 'Login สำเร็จ <br><br>';
    echo 'สวัสดีคุณ : ' . $u_username . '<br>';
    echo 'ลองไปอีกหน้าดูซิว่าคุณ ' . $u_username . ' ยังอยู่หรือไม่<br>';
    echo '<a href="session2.php">session2.php</a><br><br>';
} else {
    echo 'Username หรือ Password ไม่ถูกต้อง<br><br>';
    echo '<a href="login.php">กลับไปหน้า Login</a><br><br>';
}

echo '<a href="logout.php">ล้างตัวแปร</a>';
?>
