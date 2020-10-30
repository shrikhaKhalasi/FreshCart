<?php
include('../database/connection.php');
$msg = "";
session_start();
if (isset($_SESSION['isLogin'])) {
    header("location:../mainPage/dashboard.php");
}
// print_r($_POST);
if (isset($_REQUEST['btnRegister'])) {
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $address = $_REQUEST['address'];
    $mobile = $_REQUEST['mobile'];
    $password = $_REQUEST['password'];
    $confirm_password = $_REQUEST['confirm_password'];

    $insertQuery = "INSERT INTO `users`(`name`,`email`,`address`,`mobile`,`password`) VALUES('$name','$email','$address','$mobile','$password')";
    $set = $conn->query($insertQuery);
    echo $insertQuery;
    if ($set) {
        // $msg= "done";
        header('location:login.php');
    } else if($conn->error = "Duplicate entry '$email' for key 'email'"){
        
        $msg = "Email already exists!";
    }else{
        $msg = "Something went wrong!";

    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/form.css">
    <title>Registration</title>
    <script>
        var passReturn;

        function validate() {
            if (document.register.name.value == '') {
                alert('Please enter your name');
                return false;
            } else if (document.register.email.value == '') {
                alert('Please enter your email');
                return false;
            } else if (document.register.address.value == '') {
                alert('Please enter your address');
                return false;
            } else if (document.register.mobile.value == '') {
                alert('Please enter your mobile');
                return false;

            } else if ((document.register.password.value == '') && (document.register.confirm_password.value == '')) {
                alert('Please enter your password');
                return false;
            } else if (passReturn == false) {
                return false;
            } else {
                return true;
            }
        }

        function passCheck() {
            if (document.getElementById('password').value != '' && document.getElementById('confirm_password').value != '') {
                if (document.getElementById('password').value == document.getElementById('confirm_password').value) {
                    document.getElementById('password').style.border = '2px solid green';
                    document.getElementById('confirm_password').style.border = '2px solid green';
                    passReturn = true;
                } else {
                    document.getElementById('password').style.border = '2px solid red';
                    document.getElementById('confirm_password').style.border = '2px solid red';
                    passReturn = false;
                }
            }
        }
    </script>
</head>

<body>
    
    <div class="container">
        <div class="title">Sign Up</div>
        <form name="register" method="post" onsubmit="return(validate());">
            <table>
                <tr>
                    <td><input type="text" name="name" placeholder="Enter Your Name" id="name"></td>
                </tr>
                <tr>

                    <td><input type="email" name="email" placeholder="Enter Email" id="email"></td>
                </tr>
                <tr>
                    
                    <td><textarea name="address" placeholder="Address" id="address"></textarea></td>
                </tr>
                <tr>
                    
                    <td><input type="tel" name="mobile" placeholder="Mobile No" id="mobile"></td>
                </tr>
                <tr>
                    
                    <td><input type="password" name="password" placeholder="Password" id="password" onkeyup="passCheck();"></td>
                </tr>
                <tr>
                    
                    <td><input type="password" name="confirm_password" placeholder="Retype Password" id="confirm_password" onkeyup="passCheck();"></td>
                </tr>
                <tr>
                    <td><?php echo $msg; ?></td>
                </tr>

                <tr>
                    <td colspan="2" class="center"><input type="submit" value="Register" name="btnRegister" class="btn" id="submit"></td>
                </tr>
            </table>

        </form>

    </div>
    <div class="footer"><?php include('../includes/footer.php'); ?></div>

</body>

</html>