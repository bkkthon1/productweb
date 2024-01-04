<?php
include('include/connect.php');

$p_id = $_GET['p_id'];

$sql = mysqli_prepare($connect, "SELECT * FROM t_product WHERE p_id = ? LIMIT 1");
mysqli_stmt_bind_param($sql, 's', $p_id);
mysqli_stmt_execute($sql);
$result = mysqli_stmt_get_result($sql);
$row = mysqli_fetch_array($result);
?> 

<title>frmupdate 216</title>

<form action='update.php' method='post' enctype='multipart/form-data' name='form1' id='form1'>

<table width='100%' border='1' cellspacing='1' cellpadding='1'>
  <tr>
   <td></td>
   <td align="center">แบบฟอร์มบันทึก/แก้ไขข้อมูลประเภทสินค้า</td>
  </tr>
  <tr>
    <td>รหัสสินค้า&nbsp;</td>
    <td><input name='p_id' type='text' size='25' id='p_id' value="<?=$row['p_id'];?>"/>&nbsp;</td>
  </tr>
  <tr>
    <td>ชื่อสินค้า&nbsp;</td>
    <td><input name='p_name' type='text' size='25' id='p_name' value="<?=$row['p_name'];?>"/>&nbsp;</td>
  </tr>
  <tr>
    <td>ราคาสินค้า&nbsp;</td>
    <td><input name='p_price' type='text' size='25' id='p_price' value="<?=$row['p_price'];?>" />&nbsp;</td>
  </tr>
  <tr>
    <td>จำนวนสินค้า&nbsp;</td>
    <td><input name='p_unit' type='text' size='25' id='p_unit' value="<?=$row['p_unit'];?>"/>&nbsp;</td>
  </tr>
  
  <tr>
    <td>ประเภทสินค้า&nbsp;</td>
    <td>
    <select name="type_id" id="type_id" style="width:200px;">
    <?php
    $sql_type = mysqli_query('select * from t_type order by type_id asc');
    while ($row_type = mysqli_fetch_array($sql_type)) {
    ?>
      <option value="<?=$row_type['type_id'];?>"<?php if ($row_type['type_id'] == $row['type_id']) { ?>
      
     selected<?php } ?>>
      <?=$row_type['type_name'];?>
     </option>
     <?php    }  ?>  
    </select>
    </td>
  </tr>
  
<tr>
    <td>อัพโหลดรูปภาพ</td>
    <td>
        <input name='p_photo' type='file' size='35' />&nbsp;
        <input name="chk" type='checkbox' value="1" />ไม่ต้องการแก้ไขรูปภาพ
    </td>
</tr>

<?php
if ($_FILES['p_photo']['error'] === UPLOAD_ERR_OK) {
    // Process the file upload
    $uploadDirectory = 'your_upload_directory/';
    $uploadedFile = $uploadDirectory . basename($_FILES['p_photo']['name']);

    if (move_uploaded_file($_FILES['p_photo']['tmp_name'], $uploadedFile)) {
        // File uploaded successfully, you can now handle storing the file path or other processing.
    } else {
        // Handle the file upload error
        echo "File upload failed.";
    }
}
?>

  <tr>
    <td style='width:120px; height:50px;'>&nbsp;</td>
    <td><input name='submit' type='submit' value='บันทึกข้อมูล' style='width:120px; height:50px;' />
    <input name='btncancle' type='reset' value='ยกเลิก' style='width:120px; height:50px;' id='btncancle'/>
    </td>
    
    <input name="h_p_id" id="h_p_id" type="hidden" value="<?=$p_id;?>" />
  <input name="h_p_photo" id="h_p_photo" type="hidden" value="<?=$row['p_photo'];?>" />
  
  </tr>
</table>
    
</form>
