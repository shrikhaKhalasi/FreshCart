<?php
// include('../connection.php');
if (isset($_POST['btnPassword'])) {

    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/form.css">
    <title>Forgot Password</title>

</head>

<body>
    <?php 
    // include ('../includes/header.php'); 
    ?>
    <div class="container">
        <div class="title">Forgot Password</div>
        <form method="post">
            <table>
                <tr>
                   
                    <td><input type="email" name="email" id="email" placeholder="Enter your email"></td>
                </tr>
                <tr>
                    <td colspan="2" class="center"><input type="submit" value="Sent password" name="btnPassword" class="btn" id="submit"></td>
                </tr>

            </table>
        </form>
    </div>
    <?php include ('../includes/footer.php'); ?>
</body>

</html>