<?php
include('../database/connection.php');

session_start();
if (isset($_SESSION['isLogin'])) {
    header("location:../mainPage/dashboard.php");
}
//admin side
if (isset($_REQUEST['btnLogin'])) {
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $getAdmin = "SELECT * FROM `admin-login` WHERE `username` = '$username' AND `password` = '$password' ";

    $rows = $conn->query($getAdmin);

    if ($rows->num_rows == 1) {
        $user = $rows->fetch_object();
        $_SESSION['isAdmin'] = true;
        $_SESSION['username'] = $user->username;
        // echo "done";
        header("location:../mainPage/adminPage.php");
    } else {
        echo "Login fail";
    }
    //user side
    $getUser = "SELECT * FROM `users` WHERE `name` = '$username' AND `password` = '$password' ";

    $rows = $conn->query($getUser);

    if ($rows->num_rows == 1) {
        $user = $rows->fetch_object();
        $_SESSION['isLogin'] = true;
        $_SESSION['user'] = $user->username;
        $_SESSION['cart'] = array(0);
        // echo "done";
        // $path = abs_url('index.php');
        header("location:../mainPage/dashboard.php");
    } else {
        echo "Login fail";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/form.css">
    <title>Sign In</title>
    <script>
        function validate() {
            if (document.login.email.value == '') {
                alert('Please enter your email');
                return false;
            } else if (document.login.password.value == '') {
                alert('Please enter password');
                return false;
            } else {
                return true;
            }
        }
    </script>
</head>

<body>
    <?php
    include('../includes/header.php');
    ?>
    <div class="container">
        <div class="title">Sign In</div>
        <form name="login" method="post" onsubmit="return(validate());">
            <table>
                <tr>

                    <td><input type="username" name="username" id="name" placeholder="Enter Your Email"></td>
                </tr>

                <tr>

                    <td><input type="password" name="password" id="password" placeholder="Password"></td>
                </tr>
                <tr>
                    <td colspan="2" class="right"><a href="forgot.php">Forgot Password</a></td>

                </tr>
                <tr>
                    <td colspan="2" class="center"><input type="submit" value="Login" name="btnLogin" class="btn" id="submit"></td>
                </tr>
                <tr>
                    <td colspan="2" class="center">Not registered?<a href="registration.php">Signup</a></td>

                </tr>
            </table>
        </form>
    </div>
    <?php include('../includes/footer.php'); ?>
</body>

</html>