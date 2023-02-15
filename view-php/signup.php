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
                $name_temp = $_POST['name'];
                $name=filter_var($name_temp, FILTER_SANITIZE_STRING);

                $surname_temp = $_POST['surname'];
                $surname=filter_var($surname_temp, FILTER_SANITIZE_STRING);

                $email_temp = $_POST['email'];
                $email=filter_var($email_temp, FILTER_SANITIZE_EMAIL);

                if(filter_var($email, FILTER_VALIDATE_EMAIL)===false)
                {
                    echo '<script type=text/javascript>';
                    echo 'alert("Email not valid")';
                    echo '</script>';
                    
                }

                $address_temp = trim($_POST['address']);
                $address=filter_var($address_temp, FILTER_SANITIZE_STRING);

                $username_temp = trim($_POST['username']);
                $username=filter_var($username_temp, FILTER_SANITIZE_STRING);

                $password_temp = $_POST['password'];
                $password=filter_var($password_temp, FILTER_SANITIZE_STRING);

                $age_temp = $_POST['age'];
                $age=filter_var($age_temp, FILTER_SANITIZE_STRING);
                if(!filter_var($age, FILTER_VALIDATE_INT)===0)
                {
                    echo '<script type=text/javascript>';
                    echo 'alert("Age not valid")';
                    echo '</script>';
                }
                $password = password_hash($password, PASSWORD_BCRYPT);
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