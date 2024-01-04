<meta charset="utf-8">
<?php
include("include/connect.php");
$p_id = $_GET['p_id'];
$sql = mysqli_query("select p_photo from t_product where p_id='$p_id'");
$row = mysqli_fetch_array($sql);
unlink("photo/{$row['p_photo']}"); // Corrected the array notation
$delete = mysqli_query("delete from t_product where p_id='$p_id' limit 1");
echo "<script>";
echo "alert('ลบข้อมูลเรียบร้อยแล้ว');";
echo "window.location='index.php';"; // Corrected the window.location
echo "</script>";
exit();
?>
