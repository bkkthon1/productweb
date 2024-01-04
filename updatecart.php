<?php
session_start();
$itemid = isset($_GET['itemid']) ? $_GET['itemid'] : "";
if ($_POST) {
    for ($i = 0; $i < count($_POST['qty']); $i++) {
        $key = $_POST['arr_key_' . $i];
        $_SESSION['qty'][$key] = $_POST['qty'][$i];
    }
    header('location:cart.php');
} else {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
        $_SESSION['qty'] = array();
    }
    if (in_array($itemid, $_SESSION['cart'])) {
        $key = array_search($itemid, $_SESSION['cart']);
        $_SESSION['qty'][$key] = $_SESSION['qty'][$key] + 1;
        header('location:listproductorder.php?a=exists');
    } else {
        array_push($_SESSION['cart'], $itemid);
        $key = array_search($itemid, $_SESSION['cart']);
        $_SESSION['qty'][$key] = 1;
        header('location:listproductorder.php?a=add');
    }
}
?>
