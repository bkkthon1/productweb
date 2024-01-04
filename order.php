<?php
session_start();
include("include/connect.php");
$action = isset($_GET['a']) ? $_GET['a'] : "";
$itemCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
$_SESSION['formid'] = sha1('itoffside.com' . microtime());

if (isset($_SESSION['qty'])) {
    $meQty = 0;
    foreach ($_SESSION['qty'] as $meitem) {
        $meQty = $meQty + $meitem;
    }
} else {
    $meQty = 0;
}

if (isset($_SESSION['cart']) and $itemCount > 0) {
    $itemids = "";
    foreach ($_SESSION['cart'] as $itemid) {
        $itemids = $itemids . $itemid . ",";
    }
    $inputitems = rtrim($itemids, ",");
    $meSql = "SELECT * FROM t_product WHERE id IN ({$inputitems})";
    $myQuery = mysqli_query($connect, $meSql); // Use mysqli_query
    $meCount = mysqli_num_rows($myQuery); // Use mysqli_num_rows
} else {
    $meCount = 0;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ระบบซื้อขายออนไลน์</title>
 <?php /*   <link href='css/stylesheet.css' rel='stylesheet' type='text/css'>  */ ?>

    <link href='css/bootstrap.css' rel='bootstrap' type='text/css'>
    <link href="css/bootstrap.min.css" rel="bootstrap">
    <link href="css/bootstrap-responsive.min.css" rel="bootstrap">

</head>
<body>
<?php require_once('include/connect.php'); ?>
<?php
if (isset($_SESSION['u_username'])) {
    ?>
    <span class='Text-Comment8'> ยินดีต้อนรับคุณ : <?php echo $_SESSION['u_username'] . '<br>'; ?>
    </span>

    <?php include('menu.php');   ?>

    <table width='100%' border='1' cellspacing='1' cellpadding='1'>
        <tr>
            <td width='16%'><img src='images/10.png' width='177' height='48'></td>
            <td width='7%'><a href='listproductorder.php'><img src='images/001_20.gif' alt='' width='24' height='24'>หน้าแรก</a>
            </td>
            <td width='77%'><a href='cart.php' class='Text-Comment11'><img src='images/1.png' alt=''
                                                                           width='168' height='48'><?php echo $meQty; ?></a><span
                        class='Text-Comment11'>รายการ</span></td>
        </tr>
    </table>

    <input name="submit" type="submit" value="LOGIN"/>

    <?php
    if ($action == 'removed') {
        echo "<div class='alert alert-warning'>ลบสินค้าเรียบร้อยแล้ว</div>";
    }
    if ($meCount == 0) {
        echo "<div class='alert alert-warning'>ไม่มีสินค้าอยู่ในตระกร้า</div>";
    } else {
        ?>
        <form action="updateorder.php" method="post" enctype="multipart/form-data"
              onSubmit="return updateSubmit()" name="formupdate" id="formupdate">

            <table width="100%" border="1" cellspacing="1" cellpadding="1">
                <tr>
                    <td width="76%">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <!-- ... -->
                        </table>
                    </td>
                    <!-- ... -->
                </tr>

                <tr>
                    <td>&nbsp;</td>
                    <td colspan="3" align="right" class="Text-Comment1">
                        <table width="105%" border="0" cellspacing="0" cellpadding="0"></table>
                        <tr>
                            <td colspan="2" align="center" bgcolor="#FFCC33">
                                <span class="Text-Comment8">กรุณาป้อนข้อมูลเพื่อจดส่งสินค้า</span></td>
                        </tr>
                        <tr>
                            <td align="right" class="Text-Comment1">ชื่อ-นามสกุล</td>
                            <td><input name="order_fullname" type="text" class="Text-Comment43" id="order_fullname"
                                       placeholder="ใส่ชื่อ-นามสกุล " size="60" value="<?php echo $u_username; ?>">
                                <img src="images/bullet.gif" alt="" width="11" height="14"></td>
                        </tr>
                        <tr>
                            <td align="right" class="Text-Comment1">ที่อยู่ในการจัดส่ง</td>
                            <td><textarea name="order_address" cols="63" rows="5" class="Text-Comment43"
                                          id="order_address"></textarea><img src="images/bullet.gif" alt=""
                                                                           width="11" height="14"> </td>
                        </tr>
                        <tr>
                            <td align="right" class="Text-Comment1">เบอร์โทรศัพท์</td>
                            <td><input name="order_phone" type="text" class="Text-Comment43" id="order_phone"
                                       placeholder="ใส่เบอร์โทรศัพท์ที่สามารถติดต่อได้" size="45"><img
                                        src="images/bullet.gif" alt="" width="11" height="14"></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                </td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td width="12%" background="images/head_table.jpg">รหัสสินค้า</td>
                <td width="22%" background="images/head_table.jpg">ชื่อสินค้า</td>
                <td width="27%" background="images/head_table.jpg">รายละเอียดสินค้า</td>
                <td width="89%" background="images/head_table.jpg">จำนวน</td>
                <td width="14%" background="images/head_table.jpg">ราคาต่อหน่วย</td>
                <td width="17%" background="images/head_table.jpg">จำนวนเงิน</td>
            </tr>
            <?php
            $total_price = 0;
            $num = 0;
            while ($meResult = mysqli_fetch_assoc($myQuery)) {
                $key = array_search($meResult['id'], $_SESSION['cart']);
                $total_price = $total_price + ($meResult['p_price'] * $_SESSION['qty'][$key]); ?>
                <tr class="Text-Comment15">
                    <td><?php echo $meResult['p_id']; ?></td>
                    <td><?php echo $meResult['p_name']; ?></td>
                    <td><?php echo $meResult['p_desc']; ?></td>
                    <td><?php echo $_SESSION['qty'][$key]; ?>
                        <input type="hidden" name="qty[]" value="<?php echo $_SESSION['qty'][$key]; ?>" />
                        <input type="hidden" name="p_id[]" value="<?php echo $meResult['id']; ?>" />
                        <input type="hidden" name="p_price[]" value="<?php echo $meResult['p_price']; ?>" />
                    </td>

                    <td><?php echo number_format($meResult['p_price'], 2); ?></td>
                    <td><?php echo number_format(($meResult['p_price'] * $_SESSION['qty'][$key]), 2); ?></td>

                </tr>
                <?php $num++;
            } ?>
            <tr>

                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td align="right" class="Text-Comment1">&nbsp;</td>
                <td align="center" class="Text-Comment1">จำนวนเงินรวมทั้งหมด</td>
                <td><span class="Text-Comment1"><?php echo number_format($total_price, 2); ?>บาท</span></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><span style="text-align:right">
                        <input type="hidden" name="formid" value="<?php echo $_SESSION['formid']; ?>"/>
                    </span><a href="cart.php" type="button"><img src="images/8.png" width="150" height="55"></a></td>
                <td> <button type="submit" style="width:160px; height:58px;"><img src="images/7.png" width="150"
                                                                                    height="55"></button></td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>

            </tr>

            <tr>
                <td>&nbsp;</td>
            </tr>
        </table>
    </form>

    <p>
        <?php }
} else {
    include('login.php');
} ?>
</p>
<p>&nbsp;</p>

<script type="text/javascript">
    function updateSubmit() {
        if (document.formupdate.order_fullname.value === "") {
            alert('โปรดใส่ชื่อ-นามสกุลด้วย');
            document.formupdate.order_fullname.focus();
            return false;
        }
        if (document.formupdate.order_address.value === "") {
            alert('โปรดใส่ที่อยู่ด้วย');
            document.formupdate.order_address.focus();
            return false;
        }
        if (document.formupdate.order_phone.value === "") {
            alert('โปรดใส่เบอร์โทรศัพท์ด้วย');
            document.formupdate.order_phone.focus();
            return false;
        }
        document.formupdate.submit();
        return false;
    }
</script>

</body>
</html>
<?php mysqli_close($connect); ?>
