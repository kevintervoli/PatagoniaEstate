<!-- <?php
// session_start();
// if(!isset($_SESSION['username'])){
//     header('Location: ./view-php/login.php');
// }
?> -->
<!DOCTYPE html>sess
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <h1>Welcome</h1>
    Click here to <a href="./PHP/logout.php">Logout</a>
    <?php
    if (array_key_exists('button', $_POST)) {
        $db_url = 'localhost';
        $db_username = 'root';
        $db_password = '';
        $db_name = 'real_estate';
        $conn = new mysqli($db_url, $db_username, $db_password, $db_name);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "Select * from users";
        $result = $conn->query($sql);
        $conn->close();
    }
    if (array_key_exists('search', $_POST)) {
        $db_url = 'localhost';
        $db_username = 'root';
        $db_password = '';
        $db_name = 'real_estate';
        $conn = new mysqli($db_url, $db_username, $db_password, $db_name);
        $searchRes = $_POST['search'];
        $sql = "Select * from users where name like '%{$searchRes}%'";
        $result2 = $conn->query($sql);
        $conn->close();
    }
    if (array_key_exists('add', $_POST)) {
        $db_url = 'localhost';
        $db_username = 'root';
        $db_password = '';
        $db_name = 'real_estate';
        $conn = new mysqli($db_url, $db_username, $db_password, $db_name);
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $birthday = $_POST['birthday'];
        $sql = "INSERT INTO users (name, surname, userName, password, birthday) VALUES ('{$name}', '{$surname}', '{$username}', '{$password}', '{$birthday}')";
        $addResult = $conn->query($sql);
        $conn->close();
    }
    if (array_key_exists('update', $_POST)) {
        $db_url = 'localhost';
        $db_username = 'root';
        $db_password = '';
        $db_name = 'real_estate';
        $conn = new mysqli($db_url, $db_username, $db_password, $db_name);
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $birthday = $_POST['birthday'];
        $newValue = $_POST['new'];
        $searchId = $_POST['searchId'];
        $sql = "UPDATE users SET name = '{$newValue}' WHERE ID = '{$searchId}'";
        $updateResult = $conn->query($sql);
        $conn->close();
    }

    ?>
    <form method="post">
        <input type="submit" name="button" value="Fill table" />
        <br>
        <br>
        <input type="search" name="search" placeholder="Search" />
        <input type="submit" name="searchButton" value="Search" />
        <br>
        <br>
        <input type="text" name="name" placeholder="Name" />
        <input type="text" name="surname" placeholder="Surname" />
        <input type="text" name="username" placeholder="Username" />
        <input type="text" name="password" placeholder="Password" />
        <input type="text" name="birthday" placeholder="Birthday" />
        <input type="submit" name="add" value="Add" />
        <br>
        <br>
        <input type="text" name="searchId" placeholder="SearchId" />
        <input type="text" name="old" placeholder="Old value" />
        <input type="text" name="new" placeholder="New value" />
        <input type="submit" name="update" value="Update" />
        
    </form>
    <section>
        <table>

            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
                <th>Passowrd</th>
                <th>Birthday</th>
            </tr>
            <?php
            function fillTable($result)
            {
                foreach ($result as $row) {
                    echo "<tr><td>" . $row["ID"] . "</td><td>" . $row["name"] . "</td><td>" . $row["surname"] . "</td><td>" . $row["userName"] . "</td><td>" . $row["password"] . "</td><td>" . $row["birthday"] . "</td></tr>";
                }
            }
            if ((isset($_POST['button']) && isset($result) && $result->num_rows > 0)) {
                fillTable($result);

            } else if ((isset($_POST['search']) && isset($result2) && $result2->num_rows > 0)) {
                // fillTable($result2);
            } else if ((isset($_POST['add']) && isset($result2))) {
                echo "<tr><td colspan=\"5\" style=\"text-align:center;\">Added</td></tr>";
            } else if ((isset($_POST['update']) && isset($result2) && $result->num_rows > 0)) {
                echo "<tr><td colspan=\"5\" style=\"text-align:center;\">Updated</td></tr>";
            } else {
                echo "<tr><td colspan=\"5\" style=\"text-align:center;\">0 results</td></tr>";
            }
            ?>
        </table>
    </section>
</body>

</html>