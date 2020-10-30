<?php
include('../database/connection.php');
session_start();

if (!$_SESSION['isAdmin']) {
    header("location:../authentication/login.php");
}
// print_r($_POST);
if (isset($_POST['btnAdd'])) {
    
    $tempName = $_FILES['user_image']['tmp_name'];
    $fileName = $_FILES['user_image']['name'];
    $destination = '../assets/product_images/' . $fileName;
    move_uploaded_file($tempName, $destination);
    
    $category = $_REQUEST['category'];
    $name = $_REQUEST['name'];
    $price = $_REQUEST['price'];
    $kg = $_REQUEST['kg']; 
    $is_available = $_REQUEST['is_available'];
    $offer_price = $_REQUEST['offer_price'];
    $image = $fileName;
    // echo $user_image;

    $insertQuery = "INSERT INTO `product-images`(`categories`,`name`,`price`,`kg`,`is_available`,`offer_price`,`image`) VALUES('$category','$name','$price','$kg','$is_available',' $offer_price','$image')";
    // echo $insertQuery;
    if ($conn->query($insertQuery)) {
        $registered = "You Are Successfully Registered!";
        // header("location:../index.php");
    } else {
        $notregistered = "Something Went Wrong!" . $conn->error;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/form.css">
    <title>Admin</title>

</head>

<body>
    <?php
    include("../includes/header.php")
    ?>
    <div class="container">
        <div class="title">Add Item</div>
        <form action="" method="post">

            <table>
                <tr>
                    <td><input type="text" name="category" placeholder="Enter category" id="category"></td>
                </tr>
                <tr>
                    <td><input type="text" name="name" placeholder="Enter name" id="name"></td>
                </tr>
                <tr>
                    <td><input type="number" name="price" placeholder="price" id="price"></td>
                </tr>
                <tr>
                    <td><input type="text" name="kg" placeholder="enter weight e.g g,kg" id="weight"></td>
                </tr>
                <tr>
                    <td><input type="text" name="is_available" placeholder="yes or no " id="is_available"></td>
                </tr>
                <tr>
                    <td><input type="number" name="offer_price" placeholder="offer price" id="offer_price"></td>
                </tr>
                <tr>
                    <td><input type="file" name="image" id="image"></td>
                </tr>

                <tr>
                    <td colspan="2" class="center"><input type="submit" value="Add Item" name="btnAdd" class="btn" id="submit"></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>