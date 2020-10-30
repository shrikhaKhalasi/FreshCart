<?php
include('../database/connection.php');
session_start();

if (!isset($_SESSION['isLogin'])) {
    header('location:login.php');
}

$item_ids = $_SESSION['cart'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/dashboard.css">

    <title>Your Cart</title>
</head>

<body>
    <?php include("../includes/header.php"); ?>
    <div class="cart-div">
        <div class="cart">
            <h1 class="cart-heading">Your Cart</h1>
            <form action="" method="get">
                <table class="item-details" style="border-collapse: collapse; display: inline-table;">

                    <tr class="item-details">
                        <h3>
                            <th class="item-details">No.
                        </h3>
                        </th>
                        <h3>
                            <th class="item-details">Category
                        </h3>
                        </th>
                        <h3>
                            <th class="item-details">Name
                        </h3>
                        </th>
                        <h3>
                            <th class="item-details">Price
                        </h3>
                        </th>
                        <h3>
                            <th class="item-details">Is_available
                        </h3>
                        </th>
                        <h3>
                            <th class="item-details">Image</th>
                        </h3>
                        <h3>
                            <th class="item-details">Action</th>
                        </h3>
                    </tr>
                    <?php
                    $counter = 1;
                    $cart_total = number_format(0, 2);
                    foreach ($item_ids as $key => $value) {
                        if ($value == 0) {
                            continue;
                        }
                        $result = $conn->query("SELECT * FROM `product-details` WHERE `id` = '$value'");
                        $row = $result->fetch_object();
                    ?>
                        <tr class="item-details">
                            <td class="item-details"><?php echo $counter;
                                                        $counter += 1; ?></td>
                            <td class="item-details"><?php echo $row->categories; ?></td>
                            <td class="item-details"><?php echo $row->name; ?></td>
                            <td class="item-details"><?php echo $row->offer_price; ?></td>
                            <td class="item-details"><?php echo $row->is_available; ?></td>
                            <td class="item-details"><img src="../assets/product_images/<?php echo $row->image; ?>" style="height:100px; "></td>
                            <td class="item-details"><a class="btn_cart" href="../authenticate/deletefromcart.php?cart_delete=<?php echo $row->id; ?>">Remove</a></td>

                        </tr>
                    <?php $cart_total += $row->offer_price;
                    } ?>
                </table>
            </form>
        </div>
        <div class="cart2">

            <h1 class="cart-heading">Place Order</h1>
            <div class="placeOrder">
                <h3 class="left">Payment Details </h3>
                <br><br><br><br>
                <div class="flex_container">
                    <div class="payment">MRP Total</div>
                    <div><?php echo number_format($cart_total, 2);  ?></div>
                </div>
                <div class="flex_container">
                    <div class="payment">Discount</div>
                    <div class="blure"> <?php $discount_percentage = 0;
                                        echo $discount_percentage." %"; ?></div>
                </div>
                <div class="flex_container">
                    <div class="total">Total Amount</div>
                    <div> <?php $discount = ($cart_total * $discount_percentage) / 100;
                            $final = $cart_total - $discount;
                            echo number_format($final, 2); ?></div>
                </div>



                <input type="submit" value="Place Order" class="orderBtn">
            </div>

        </div>
    </div>
</body>

</html>