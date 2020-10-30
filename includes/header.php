<?php
include('../database/connection.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/style/dashboard.css">
  <title>Header</title>

  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>

<body>
  <div class="nav">
    <a href="../mainPage/dashboard.php" class="hoverable" ><img src="../assets/images/logo.png" class="logo hoverable"></a>
    <div class="search-container">
      <form method="post">
        <input type="search" placeholder="Search vegetables and fruits.." name="search">
        <button type="submit" name="submit">Search</button>
      </form>
    </div>
    <ul>
      <li><a href="../mainPage/about.php" class="navLink"><i class='fas fa-heart' style='font-size:20px'></i>About </a></li>
      <li><a href="../authenticate/cart.php" class="navLink"><i class='fas fa-cart-plus' style='font-size:20px'></i> Cart</a></li>
      <!-- <li><a href="../mainPage/offer.php" class="navLink"><i class="fa fa-gift" style='font-size:20px'></i> Offer</a></li> -->
      <?php if (isset($_SESSION['isLogin']) OR isset($_SESSION['isAdmin'])) { ?><li><a href="../authenticate/logout.php" class="navLink"><i class="fa fa-fw fa-power-off" style='font-size:20px'></i></a></li><?php } else { ?>
        <li><a href="../authenticate/login.php" class="navLink"><i class="fa fa-fw fa-user" style='font-size:20px'></i>Sign in</a></li><?php } ?>

    </ul>
  </div>

