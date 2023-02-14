<?php
// check if user is logged in by checking if session variable is set
session_start();
if(isset($_SESSION['username'])){

    if($_SESSION['Status']==0)
        header('Location: ../view-php/admin.php');
    else if($_SESSION['Status']==1 || $_SESSION['Status']==2)
        header('Location: ../view-php/client.php');
}

error_reporting(0)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/login.css">
    <title></title>

</head>
<body>
    <div class="center">
        <h1>Login</h1>
        <form method="post">

            <div class="txt_field">
                <input type="text" name="username"required>
                <span></span>
                <label>Username</label>
            </div>

            <div class="txt_field">
                <input type="password" name="password" required>
                <span></span>
                <label>Password</label>
            </div>

            <div class="pass">Forgot Password?</div>
            <input type="submit" value="Login">

            <div class="signup_link">
                Not a member? <a href="signup.php">Signup</a>
            </div>
        </form>
    </div>

<?php
include '../PHP/PDO_conn.php';
?>
</body>
</html>