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
                <input type="text" name="name" required>
                <span></span>
                <label>Name</label>
            </div>
            <div class="txt_field">
                <input type="text" name="surname" required>
                <span></span>
                <label>Surname</label>
            </div>
            <div class="txt_field">
                <input type="text" name="email" required pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$">
                <span></span>
                <label>Email</label>
            </div>
            <div class="txt_field">
                <input type="number" name="age" required >
                <span></span>
                <label>Age</label>
            </div>
            <div class="txt_field">
                <input type="text" name="address" required>
                <span></span>
                <label>Address</label>
            </div>
            <div class="txt_field">
                <input type="text" name="username" required>
                <span></span>
                <label>Username</label>
            </div>

            <div class="txt_field">
                <input type="password" name="password" required pattern = "^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$">
                <span></span>
                <label>Password</label>
            </div>

            <input type="submit" value="Sign Up">
            <?php
            require_once '../PHP/rest_api.php';
            $db = new Database();     
            if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['address']) && isset($_POST['username']) && isset($_POST['password'])) {
                $name = $_POST['name'];
                $surname = $_POST['surname'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $age = $_POST['age'];
                $db->insert($name, $surname,$age, $email, $address, $username, $password,1);
            }
            ?>

            <div class="signup_link">
                Already a member? <a href="login.php">Log in</a>
            </div>
        </form>
    </div>

</body>

</html>