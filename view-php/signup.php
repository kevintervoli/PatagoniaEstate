<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/signup.css">
    <title></title>

</head>
<body>
    <div class="center">
        <h1>Sign Up</h1>
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

            <input type="submit" value="Sign Up">

            <div class="signup_link">
                Already a member? <a href="login.php">Log in</a>
            </div>
        </form>
    </div>

<?php
//database connection
include '../PHP/authenticate_user.php';
include '../PHP/connect_to_database.php';
?>
</body>
</html>