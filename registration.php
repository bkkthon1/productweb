<?php
session_start();
include('include/connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $u_username = $_POST['u_username'];
    $u_password = $_POST['u_password'];

    $sql = "SELECT * FROM t_user WHERE u_username = ?";
    $stmt = mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmt, "s", $u_username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($u_password, $row['u_password'])) {
            // Password is correct, proceed with login
            $_SESSION['u_username'] = $u_username;
            // Add other user-related session data if needed
            header("Location: welcome.php"); // Redirect to a welcome page after successful login
            exit();
        } else {
            $error_message = "Incorrect password";
        }
    } else {
        $error_message = "User not found";
    }
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login</title>
</head>

<body>
    <form action="login.php" method="post">
        <label for="u_username">Username:</label>
        <input type="text" name="u_username" required><br>

        <label for="u_password">Password:</label>
        <input type="password" name="u_password" required><br>

        <input type="submit" value="Login">
    </form>

    <?php
    if (isset($error_message)) {
        echo "<p>$error_message</p>";
    }
    ?>
</body>

</html>
