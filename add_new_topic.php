<meta charset="utf-8">
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('include/connect.php');

    // Using prepared statements to prevent SQL injection
    $topic = mysqli_real_escape_string($connect, $_POST['topic']);
    $detail = mysqli_real_escape_string($connect, $_POST['detail']);
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $created = date('Y-m-d H:i:s');

    // Prepare and execute the query
    $insert = mysqli_prepare($connect, "INSERT INTO questions (topic, detail, name, created) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($insert, 'ssss', $topic, $detail, $name, $created);

    if (mysqli_stmt_execute($insert)) {
        // Query successful
        echo "<script>alert('Complete added topic'); window.location='main_webboard.php';</script>";
        exit();
    } else {
        // Query failed
        echo "Error: " . mysqli_error($connect);
    }

    // Close the prepared statement
    mysqli_stmt_close($insert);
}
?>
