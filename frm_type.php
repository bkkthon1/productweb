<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <title>frm_type 208/214</title>
</head>
<body>
    <form action='insert_type.php' method='post' enctype='multipart/form-data' name='frmtype' id='frmtype'>
        <table width="518" border="1">
            <tr>
                <td width="160">ชื่อประเภทสินค้า 1</td>
                <td width="312"><input name="type_name_1" type="text" size="45" /></td>
            </tr>
            <tr>
                <td width="160">ชื่อประเภทสินค้า 2</td>
                <td width="312"><input name="type_name_2" type="text" size="45" /></td>
            </tr>
            <tr>
                <td width="160">ชื่อประเภทสินค้า 3</td>
                <td width="312"><input name="type_name_3" type="text" size="45" /></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>
                    <input name='submit' type='submit' value='บันทึกข้อมูล' style='width:120px; height:50px;' />
                    <input name='reset' type='reset' value='ยกเลิก' style='width:120px; height:50px;' id='reset' />&nbsp;
                </td>
            </tr>
        </table>
    </form>

    <table align="center" width="80%" border="1" cellpadding="10">
        <tr align="center">
            <td>รูปภาพ</td>
            <td>รหัสสินค้า</td>
            <td>ชื่อสินค้า</td>
            <td>ราคาสินค้า</td>
            <td>จำนวนสินค้า</td>
            <td>ประเภทสินค้า</td>
            <td>แก้ไข</td>
            <td>ลบ</td>
        </tr>
        <?php
        include('include/connect.php');
        $keyword = $_GET['keyword'];
       $sql = mysqli_query($connect, "SELECT * FROM t_product p, t_type t WHERE p.type_id = t.type_id AND p.p_name LIKE '%$keyword%' ORDER BY p.p_id DESC");
        while ($row = mysqli_fetch_array($sql)) {
        ?>
            <tr>
                <td align="center" valign="middle"><img src="photo/<?= $row['p_photo']; ?>" width="100"></td>
                <td align='center' valign='middle'> <?= $row['p_id']; ?></td>
                <td align='center' valign='middle'> <?= $row['p_name']; ?></td>
                <td align='center' valign='middle'> <?= $row['p_price']; ?></td>
                <td align='center' valign='middle'> <?= $row['p_unit']; ?></td>
                <td align='center' valign='middle'> <?= $row['type_name']; ?></td>
                <td align='center' valign='middle'> <a href="frmupdate_product.php?p_id=<?= $row['p_id']; ?>">แก้ไข</a></td>
                <td align='center' valign='middle'>
                    <a href="delete_product.php?p_id=<?= $row['p_id']; ?>" onclick="return confirm('Do you want to delete?')">ลบ</a>
                </td>
            </tr>
        <?php
        }
        ?>

