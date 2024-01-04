<?php
session_start();
$formid = isset($_SESSION['formid']) ? $_SESSION['formid'] : "";

if ($formid !== $_POST['formid']) {
    echo 'E00001|| SESSION ERROR RETRY AGAIN.';
} else {
    unset($_SESSION['formid']);

    if ($_POST) {
        include('include/connect.php');
        $order_fullname = mysqli_real_escape_string($_POST['order_fullname']);
        $order_address = mysqli_real_escape_string($_POST['order_address']);
        $order_phone = mysqli_real_escape_string($_POST['order_phone']);

        $meSql = "INSERT INTO order_date (order_fullname, order_address, order_phone) VALUES (NOW(), '{$order_fullname}', '{$order_address}', '{$order_phone}')";
        $meQuery = mysqli_query($meSql);

        if ($meQuery) {
            $order_id = mysqli_insert_id();

            for ($i = 0; $i < count($_POST['qty']); $i++) {
                $order_detail_quantity = mysqli_real_escape_string($_POST['qty'][$i]);
                $order_detail_price = mysqli_real_escape_string($_POST['p_price'][$i]);
                $product_id = mysqli_real_escape_string($_POST['p_id'][$i]);

                $lineSql = "INSERT INTO order_details (order_detail_quantity, order_detail_price, product_id, order_id) ";
                $lineSql .= "VALUES ('{$order_detail_quantity}', '{$order_detail_price}', '{$product_id}', '{$order_id}')";

                mysqli_query($lineSql);
            }

            mysqli_close();
            unset($_SESSION['cart']);
            header('location: listproductorder.php?a=order');
        } else {
            mysqli_close();
            header('location: listproductorder.php?a=orderfail');
        }
    }
}
?>
