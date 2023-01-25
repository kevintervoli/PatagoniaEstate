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
                <input type="text" name="email" required>
                <span></span>
                <label>Email</label>
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
                <input type="password" name="password" required>
                <span></span>
                <label>Password</label>
            </div>

            <input type="submit" value="Sign Up">
            <?php
            include '../PHP/connect_to_database.php';
            $name = '';
            $surname = '';
            $email = '';
            $address = '';
            $username = '';
            $password = '';

            if (isset($_POST['name'])) {
                $name = $_POST['name'];
            }
            if (isset($_POST['surname'])) {
                $surname = $_POST['surname'];
            }

            if (isset($_POST['email'])) {
                $email = $_POST['email'];
            }

            if (isset($_POST['address'])) {
                $address = $_POST['address'];
            }

            if (isset($_POST['username'])) {
                $username = $_POST['username'];
            }

            if (isset($_POST['password'])) {
                $password = $_POST['password'];
            }
            $sql1 = "SELECT * FROM users WHERE username = '$username' AND email = '$email'";
            $result = $conn->query($sql1);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    if ($row['email'] == $email) {
                        echo '<script>alert("Email already registered !")</script>';
                    } else if ($row['username'] == $username) {
                        echo '<script>alert("Username already exists !")</script>';
                    } else {
                        $sql = "INSERT INTO users (name, surname, email, address, username, pass) VALUES ('$name', '$surname', '$email', '$address', '$username', '$password')";
                        $conn->query($sql);
                    }
                }
            }
            $conn->close();
            ?>

            <div class="signup_link">
                Already a member? <a href="login.php">Log in</a>
            </div>
        </form>
    </div>

</body>

</html>