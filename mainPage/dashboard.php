<?php
include('../database/connection.php');
session_start();
if (!isset($_SESSION['isLogin'])) {
    header('location:../login.php');
}
$append1 = 1;
$append2 = 1;
$append3 = "";
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array(0);
}
if(isset($_POST['submit'])){
    if ($_POST['search'] != 'all') {
        $append1 = "`name`='" . $_POST['search'] . "'";
    } else {
        $append1 = 1;
    }
}
if (isset($_POST['apply'])) {

    if ($_POST['category'] != 'all') {
        $append2 = "`categories`='" . $_POST['category'] . "'";
    } else {
        $append2 = 1;
    }
    if ($_POST['by'] == 'price_asc') {
        $append3 = "ORDER BY `price` ASC";
    } else if ($_POST['by'] == 'price_desc') {
        $append3 = "ORDER BY `price` DESC";
    }
}
$search = "SELECT * FROM `product-details` WHERE $append1 AND $append2 $append3";

$result = $conn->query($search);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/dashboard.css">

    <title>Dashboard</title>
</head>

<body>
    <?php
    include("../includes/header.php")
    ?>
    <form method="post">

        <div class="container">
            <img src="../assets/images/banner.png" alt="" class="banner">
            <div class="filter">
                <div class="inline_div">Shop by </div>
                <div class="inline_div">
                    Category
                    <select name="category">
                        <option value="all">All</option>
                        <option value=" fruits">Fruits</option>
                        <option value=" vegetables">Vegetables</option>

                    </select></div>
                <div class="inline_div">
                    Price By
                    <select name="by">
                        <option value="">None</option>

                        <option value="price_asc">Price: low to high</option>
                        <option value="price_desc">Price: high to low</option>

                    </select></div>
                <div>
                    <input type="submit" value="apply" name="apply" style="color: black;">
                </div>
            </div>
            <?php
            while ($row = $result->fetch_object()) {
            ?>

                <div class="column">
                    <div class="card">
                        <img src="../assets/product_images/<?php echo $row->image; ?>" alt="Bhindi" style="width:100%;height:150px">
                        <h3><?php echo $row->name . " " . $row->kg; ?></h3>
                        <h4 class="price">Actual Price: &#8377;<?php echo $row->price ?></h4>
                        <h4 class="price">Offer Price: &#8377;<?php echo $row->offer_price ?></h4>

                        <?php if (in_array($row->id, $_SESSION['cart'])) { ?>
                            <p><a class="btn_cart" name="addCart" href="../authenticate/addCart.php?id=<?php echo $row->id; ?>" style='background-color:blueviolet'>Added</a></p>
                        <?php } else { ?>
                            <p><a class="btn_cart" name="addCart" href="../authenticate/addCart.php?id=<?php echo $row->id; ?>">Add to Cart</a></p><?php } ?>
                    </div>
                </div>

            <?php } ?>
        </div>
    </form>

</body>

</html>