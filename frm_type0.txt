<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml'>

<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <title>*frm_type 208/214</title>
    <link rel='stylesheet' type='text/css' href='stylesheet.css'>
</head>

<body>

    <table align="center">
        <tr>
            <th>รูปภาพ</th>
            <th>รหัสสินค้า</th>
            <th>ชื่อสินค้า</th>
            <th>ราคาสินค้า</th>
            <th>จำนวนสินค้า</th>
            <th>ประเภทสินค้า</th>
            <th>แก้ไข</th>
            <th>ลบ</th>
        </tr>

        <?php
        include('include/connect.php');
        $keyword = mysqli_real_escape_string($connect, $_GET['keyword']);

        $sql = mysqli_query($connect, "SELECT * FROM t_product p, t_type t WHERE p.type_id = t.type_id AND p.p_name LIKE '%$keyword%' ORDER BY p.p_id DESC");

        while ($row = mysqli_fetch_array($sql)) {
        ?>

            <tr>
                <td align="center" valign="middle"><img src="photo/<?= $row['p_photo']; ?>" alt="Product Image"></td>
                <td><?= $row['p_id']; ?></td>
                <td><?= $row['p_name']; ?></td>
                <td><?= $row['p_price']; ?></td>
                <td><?= $row['p_unit']; ?></td>
                <td><?= $row['type_name']; ?></td>
                <td><a href="frmupdate_product.php?p_id=<?= $row['p_id']; ?>">แก้ไข</a></td>
                <td><a href="delete_product.php?p_id=<?= $row['p_id']; ?>" onclick="return confirm('Do you want to delete?')">ลบ</a></td>
            </tr>

        <?php
        }
        mysqli_close($connect);
        ?>
    </table>

</body>

</html>
