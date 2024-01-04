<meta charset="utf-8">
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('include/connect.php');

    // Using prepared statements to prevent SQL injection
    $detail = mysqli_real_escape_string($connect, $_POST['detail']);
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $postid = mysqli_real_escape_string($connect, $_POST['id']);

    $insert = mysqli_prepare($connect, "INSERT INTO answers (detail, name, question_id) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($insert, 'ssi', $detail, $name, $postid);

    // Check if the query was successful
    if (mysqli_stmt_execute($insert)) {
        // Update the question's reply count
        mysqli_query($connect, "UPDATE questions SET reply = reply + 1 WHERE id = $postid");

        echo "<script>";
        echo "alert('Already replied');";
        echo "window.location='main_webboard.php';";
        echo "</script>";
        exit();
    } else {
        // Handle the case where the query failed
        echo "Error: " . mysqli_error($connect);
    }

    // Close the prepared statement
    mysqli_stmt_close($insert);
}
?>
