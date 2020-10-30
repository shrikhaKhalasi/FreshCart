<?php
session_start();
include "../database/connection.php";
$product = $_GET['cart_delete'];

if (isset($_SESSION['isLogin'])) {
    print_r($_SESSION);
    if (($key = array_search($product, $_SESSION['cart'])) !== false) {
        unset($_SESSION['cart'][$key]);
    }
    print_r($_SESSION);
    header("location:../authenticate/cart.php");
} else {
    header("location:../mainPage/dashboard.php");
} 