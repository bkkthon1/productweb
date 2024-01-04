<?php
session_start();
require('include/connect.php');

$perpage = 3;

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$start = ($page - 1) * $perpage;
$meSql = "SELECT * FROM t_product ORDER BY p_id DESC LIMIT {$start}, {$perpage}";
$meQuery = mysqli_query($meSql);

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
 <?php /*   <link href='css/stylesheet.css' rel='stylesheet' type='text/css'> */  ?>

    <link href="css/bootstrap.css" rel="bootstrap" type="text/css"> </>
    <link href="css/bootstrap.min.css" rel="bootstrap">
    <link href="css/bootstrap-responsive.min.css" rel="bootstrap">
    
</head>

<body>
    <?php
    if (isset($_SESSION['u_username'])) {
        ?>
        <span class="Text-Comment8">welcome : <?php echo $u_username . "<br>"; ?></span>
        <?php include('menu.php');  ?>

        <table width='100%' border='1' cellspacing='1' cellpadding='1'>
            <!-- ... Your existing table code ... -->
        </table>

        <table width='100%' border='1' cellspacing='1' cellpadding='1'>
            <tr>
                <td>
                    <?php for ($i = 1; $i <= $total_page; $i++) { ?>
                        <a href="listproductorder.php?page=<?php echo $i; ?> "><?php echo $i; ?></a>
                    <?php } ?>

                    <a href="listproductorder.php?page=<?php echo $total_page; ?>" aria-label="Next">
                        <span class="Text-Comment12" aria-hidden="true">หน้าถัดไป</span>
                    </a>
                </td>
            </tr>
        </table>

        <p>&nbsp;</p>
    <?php
    } else {
        include('login.php');
    }
    ?>
</body>
</html>

<?php
mysqli_close();
?>
