<meta charset="utf-8">
<title>มาจาก แก้ไข frmupdate_pro</title>
<?php
include("include/connect.php");

$p_id = $_POST['p_id'];
$p_name = $_POST['p_name'];
$p_price = $_POST['p_price'];
$p_unit = $_POST['p_unit'];
$type_id = $_POST['type_id'];
$h_p_id = $_POST['h_p_id'];
$h_p_photo = $_POST['h_p_photo'];
$chk = $_POST['chk'];

if ($chk != 1) {
    @unlink("photo/$h_p_photo");

    $photo_tmp = $_FILES['p_photo']['tmp_name'];
    $photo_name = $_FILES['p_photo']['name'];
    $photo_size = $_FILES['p_photo']['size'];
    $photo_type = $_FILES['p_photo']['type'];

    $ext = strtolower(end(explode('.', $photo_name)));
    $filename = $p_id . "." . $ext;
    copy($photo_tmp, "photo/$filename");
}

$update = mysqli_query("UPDATE t_product
    SET p_id='$p_id',
    p_name='$p_name',
    p_price='$p_price',
    p_unit='$p_unit',
    type_id='$type_id' 
    WHERE p_id='$h_p_id'"
);

echo "<script>";
echo "alert('แก้ไขข้อมูลสินค้าเรียบร้อยแล้ว');";
echo "window.location='select_product.php';";
echo "</script>";
exit();
?>
