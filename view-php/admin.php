<!DOCTYPE html>
<html lang="en">
    

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
    <?php
    require_once '../PHP/rest_api.php';
    $db = new Database();
    ?>
    <form id="userForm" method="GET" action=".">
        <h1>User Table</h1>
        Click here to <a href="../PHP/logout.php">Logout</a>
        <br>
        <input class="btn btn-primary btn-sm" type="submit" name="fillButton" value="FILL TABLE" />
        <input class="btn btn-primary btn-sm" type="submit" name="add" value="ADD" />
        <input type="text" name="id" placeholder="ID"/>
        <input type="text" name="username" placeholder="USERNAME" />
        <input class='btn btn-danger btn-sm' type='submit' name='deleteButton' value='Delete' />
        <br>
        <br>
    </form>
    <form id="part2" method="POST">
        <input type="number"  name="id_2" placeholder="ID" />
        <input type="text"  name="name" placeholder="Name"/>
        <input type="text" name="surname" placeholder="Surname" />
        <input type="number" name="age" placeholder="Age"/>
        <input type="text" name="email" placeholder="Email" pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$"/>
        <input type="text" name="address" placeholder="Address" />
        <input type="text" name="username_2" placeholder="Username" />
        <input type="text" name="password" placeholder="Password"/>
        <input type="number" name="status" placeholder="Status"pattern = "^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$"/>
        <input class='btn btn-primary btn-sm' type='submit' name='edit' value='EDIT' />
        <a  class='btn btn-primary btn-sm' href="../index.php">GO HOME</a>
        <br>
        <br>
    </form>
    <section>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Email</th>
                <th>Address</th>
                <th>Username</th>
                <th>Password</th>
                <th>Status</th>
            </tr>
            <?php
                if (isset($_POST['edit'])) {
                    $id = $_POST['id_2'];
                    $name = $_POST['name'];
                    $surname = $_POST['surname'];
                    $age = $_POST['age'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $username = $_POST['username_2'];
                    $password = $_POST['password'];
                    $status = $_POST['status'];
                    $password = password_hash($password, PASSWORD_BCRYPT);
                    $db->update($id, $name, $surname, $age, $email, $address, $username, $password, $status);
                }
            ?>
        </table>
    </section>
    <script src="../assets/js/admin-api.js"></script>
</body>

</html>