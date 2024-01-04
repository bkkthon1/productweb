<meta charset="utf-8">

<?php
include('include/connect.php');

$p_id = $_POST['p_id'];
$p_name = $_POST['p_name'];
$p_price = $_POST['p_price'];
$p_unit = $_POST['p_unit'];
$type_id = $_POST['type_id'];

//******* ส่งค่าอัพโหลดไฟล์ หรือรูปภาพ *********
$photo_tmp = $_FILES['p_photo']['tmp_name'];
$photo_name = $_FILES['p_photo']['name'];
$photo_size = $_FILES['p_photo']['size'];
$photo_type = $_FILES['p_photo']['type'];

$ext = strtolower(end(explode('.', $photo_name)));
$filename = $p_id . '.' . $ext;

move_uploaded_file($photo_tmp, 'photo/' . $filename);
//***********************************

$insert = mysqli_query("INSERT INTO t_product VALUES('$p_id', '$p_name', '$p_price', '$p_unit', '$type_id', '$filename')");

/*
echo 'รหัสสินค้า : ' .$p_id. '<br>'; 
echo 'ชื่อสินค้า : ' .$p_name.'<br>'; 
echo 'ราคา : '.$p_price. '<br>';
echo 'จำนวน : '.$p_unit. '<br>'; 
echo 'ประเภทสินค้า : '.$type_id.'<br>'; 
echo 'ชื่อไฟล์ภาพ : '.$filename;
*/

echo "<script>";
echo "alert('เพิ่มข้อมูลสินค้าเรียบร้อยแล้ว');";
echo "window.location='frm_product.php';";
echo "</script>";
exit();
?>
