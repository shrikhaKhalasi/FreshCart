<?php
include('../database/connection.php');
session_start();
// print_r($_SESSION['cart']);
$id = $_GET['id'];
// print_r($_SESSION['cart']);
if (isset($_SESSION['isLogin'])) {

    $_SESSION['cart'][] = $id;
    print_r($_SESSION['cart']);
    header("location:../mainPage/dashboard.php");
}else{
    header("location:../mainPage/dashboard.php");

}
