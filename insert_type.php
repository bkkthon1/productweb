<meta charset="utf-8">
<title>209 รับข้อมูลจาก frm_type</title>
<?php
include('include/connect.php');
$type_name = $_POST['type_name'];

$insert = mysqli_query($connect, "INSERT INTO t_type (type_id, type_name) VALUES ('', '$type_name')");

echo "<script>";
echo "alert('เพิ่มข้อมูลประเภทสินค้าเรียบร้อยแล้ว');";
echo "window.location='frm_type.php';";
echo "</script>";
exit();
?>
