<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>frm_pro 210</title>
</head>
<body>

<?php
    include('include/connect.php');
    ?>
<?php /*
    $p_id = $_GET['p_id'];
    $sql = mysqli_query($connect, "SELECT * FROM t_product WHERE p_id='$p_id' LIMIT 1");
    $row = mysqli_fetch_array($sql);
 */   ?>

    <form action='insert_product.php' method='post' enctype='multipart/form-data' name='form1' id='form1'>

        <table align="center" width="100%" border="0" cellpadding="10">
            

        <table align="center" width="100%" border="0" cellpadding="10">
            <tr>
                <td></td>
                <td align="center">แบบฟอร์มบันทึก/แก้ไขข้อมูลประเภทสินค้า</td>
            </tr>
            <tr>
                <td width="100">รหัสสินค้า&nbsp;</td>
                <td width="204"><input name='p_id' type='text' size='25' id='p_id' value="<?= $row['p_id']; ?>" />&nbsp;</td>
            </tr>
            <tr>
                <td>ชื่อสินค้า&nbsp;</td>
                <td><input name='p_name' type='text' size='25' id='p_name' value="<?= $row['p_name']; ?>" />&nbsp;</td>
            </tr>
            <tr>
                <td>ราคาสินค้า&nbsp;</td>
                <td><input name='p_price' type='text' size='25' id='p_price' value="<?= $row['p_price']; ?>" />&nbsp;</td>
            </tr>
            <tr>
                <td>รายละเอียดสินค้า&nbsp;</td>
                <td><textarea name='p_desc' rows='4' cols='25' id='p_desc'><?= $row['p_desc']; ?></textarea>&nbsp;</td>
            </tr>
            <tr>
                <td>จำนวนสินค้า&nbsp;</td>
                <td><input name='p_unit' type='text' size='25' id='p_unit' value="<?= $row['p_unit']; ?>" />&nbsp;</td>
            </tr>

            <tr>
                <td>ประเภทสินค้า&nbsp;</td>
                <td><select name="type_id" id="type_id" style="width:200px;">
                        <?php
                        $sql_type = mysqli_query('SELECT * FROM t_type ORDER BY type_id ASC');
                        while ($row_type = mysqli_fetch_array($sql_type)) {
                        ?>
                            <option value="<?= $row_type['type_id']; ?>" <?php if ($row_type['type_id'] == $row['type_id']) { ?>
                                    selected <?php } ?>>
                                <?= $row_type['type_name']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td>อัพโหลดรูปภาพ</td>
                <td><input name='p_photo' type='file' size='35' />&nbsp;
                    <input name="chk" type="checkbox" value="1" />ไม่ต้องการแก้ไขรูปภาพ</td>
            </tr>

            <tr>
                <td style='width:120px; height:50px;'>&nbsp;</td>
                <td><input name='submit' type='submit' value='บันทึกข้อมูล' style='width:120px; height:50px;' />
                    <input name='btncancle' type='reset' value='ยกเลิก' style='width:120px; height:50px;' id='btncancle' /></td>

                <input name="h_p_id" id="h_p_id" type="hidden" value="<?= $p_id; ?>" />
                <input name="h_p_photo" id="h_p_photo" type="hidden" value="<?= $row['p_photo']; ?>" />

            </tr>

        </table>

    </form>

</body>

</html>
