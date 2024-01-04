<?php
session_start();
include('include/connect.php');

$action = isset($_GET['a']) ? $_GET['a'] : "";

$itemCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;

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
    $meSql = "SELECT * FROM t_product WHERE id IN ($inputitems)";
    $meQuery = mysqli_query($connect, $meSql);
    $meCount = mysqli_num_rows($meQuery);
} else {
    $meCount = 0;
}
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset="utf-8">
    <title>ระบบซื้อสินค้าออนไลน์</title>
  
<?php /*  <link href='css/stylesheet.css' rel='stylesheet' type='text/css'> 
*/  ?>
    <link href='css/bootstrap.css' rel='bootstrap' type='text/css'>
    <link href="css/bootstrap.min.css" rel="bootstrap">
    <link href="css/bootstrap-responsive.min.css" rel="bootstrap">

</head>

<body>

    <?php
    if (isset($_SESSION['u_username'])) {
    ?>
        <span class='Text-Comment8'> welcome : <?php echo $_SESSION['u_username'] . '<br>'; ?> </span>
        <?php include('menu.php'); ?>

        <table width="100%" border="1" cellspacing="1" cellpadding="1">
            <tr>
                <td width='27%'><img src='images/z_mn_order.png' alt='' width='300' height='48'> </td>
                <td width='8%'><a href='listproduct.php'><img src='images/001_20.gif' alt='' width='24' height='24'>หน้าแรก</a></td>
                <td width='65%'><a href='cart.php' class='Text-Comment11'><img src='images/1.png' width='168' height='48'></a><span class='Text-Comment11'> <?php echo $meQty; ?>รายการ</span></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
        </table>

        <?php
        if ($action == 'removed') {
            echo "<div class='alert alert-warning'>ลบสินค้าเรียบร้อยแล้ว</div>";
        }
       if ($meCount == 0) {
        echo "<div class='alert alert-warning'>ไม่มีสินค้าอยู่ในตระก้า</div>";
    } else {
?>
        <form action="updatecart.php" method="post" name="form1">
            <table width="100%" border="1" cellspacing="1" cellpadding="1">
                <tr>
                        <td width='14%' align='left' background='images/head_table.jpg'>แสดงภาพสินค้า</td>
                        <td width='9%' align='left' background='images/head_table.jpg'>รหัสสินค้า</td>
                        <td width='8%' align='left' background='images/head_table.jpg'>ชื่อสินค้า</td>
                        <td width='16%' align='left' background='images/head_table.jpg'>รายละเอียดสินค้า</td>
                        <td width='11%' align='left' background='images/head_table.jpg'>จำนวนสั่งซื้อ</td>
                        <td width='6%' align='left' background='images/head_table.jpg'>ราคา</td>
                        <td width='15%' align='left' background='images/head_table.jpg'>จำนวนเงิน</td>
                        <td width='21%' align='left' background='images/head_table.jpg'>ลบรายการสั่งซื้อ</td>
                    </tr>

                    <?php
                    $total_price = 0;
                    $num = 0;
                    while ($meResult = mysqli_fetch_assoc($meQuery)) {
                        $key = array_search($meResult['id'], $_SESSION['cart']);
                        $total_price = $total_price + ($meResult['p_price'] * $_SESSION['qty'][$key]);
                    ?>

                        <tr>
                            <td><img src='photo/<?php echo $meResult['p_photo']; ?>' border='0'></td>
                            <td><?php echo $meResult['p_id']; ?> </td>
                            <td><?php echo $meResult['p_name']; ?> </td>
                            <td> <?php echo $meResult['p_desc']; ?></td>
                            <td> <?php echo $meResult['p_id']; ?></td>
                            <td> <input type='text' name='qty[<?php echo $num; ?>]' value='<?php echo $_SESSION['qty'][$key]; ?>' class='form-control' style='width:60px; text-align:center;'>
                                <input type='hidden' name='arr_key_<?php echo $num; ?>' value='<?php echo $key; ?>'> </td>
                            <td align='center'><?php echo number_format($meResult['p_price'], 2); ?> </td>
                            <td align='center'><?php echo number_format(($meResult['p_price'] * $_SESSION['qty'][$key]), 2); ?> </td>
                        </tr>

                    <?php $num++;
                    } ?>

                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td align='right'></td>
                        <td colspan='2' align='right' class='Text-Comment4'>จำนวนเงินรวม<?php echo number_format($total_price, 2); ?>บาท</td>
                        <td align='right'></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td align='left'><button type='submit' style='width:160px; height:58px;'><img src='images/6.png' width='150' height='55'></button></td>
                        </table>
        </form>
        <a href='order.php' type='button'><img src='images/4.png' width='150' height='55'></a>
<?php
    }
} else {
    include('login.php');
}

mysqli_close();
?>