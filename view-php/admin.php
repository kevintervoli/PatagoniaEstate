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
    <form method="post">
        <h1>User Table</h1>
        Click here to <a href="./PHP/logout.php">Logout</a>
        <br>
        <input class="btn btn-primary btn-sm" type="submit" name="button" value="FILL TABLE" />
        <input class="btn btn-primary btn-sm" type="submit" name="add" value="ADD" />
        <input type="text" name="id" placeholder="ID" />
        <input type="text" name="username" placeholder="USERNAME" />
        <input class='btn btn-danger btn-sm' type='submit' name='delete' value='Delete' />
        <br>
        <br>
        <input type="number" name="id" placeholder="ID" />
        <input type="text" name="name" placeholder="Name" />
        <input type="text" name="surname" placeholder="Surname" />
        <input type="number" name="age" placeholder="Age"/>
        <input type="text" name="email" placeholder="Email" />
        <input type="text" name="address" placeholder="Address" />
        <input type="text" name="username" placeholder="Username" />
        <input type="text" name="password" placeholder="Password" />
        <input type="number" name="status" placeholder="Status" />
        <input class='btn btn-primary btn-sm' type='submit' name='ediit' value='EDIT' />
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
                function fillTable($result1)
                {
                $i = 0;
                    foreach ($result1 as $rows) {
                        $i++;
                        echo "<tr><td>" . $rows["ID"] . "</td><td>" . $rows["Name"] . "</td><td>" . $rows["Surname"] . "</td><td>" . $rows["Age"] . "</td><td>" . $rows["Email"] . "</td><td>" . $rows["Address"] . "</td><td>" . $rows["username"] . "</td><td>" . $rows["Password"] . "</td><td>" . $rows["Status"];
                    }
                }
                if (isset($_POST['button'])) {
                    $result = $db->select();
                    fillTable($result);
                } 
                if (isset($_POST['searchButton'])) {
                    $searchId = $_POST['searchId'];
                    $searchUserName = $_POST['searchUserName'];
                    $result = $db->search($searchId, $searchUserName);
                    fillTable($result);
                }
                // delete
                if (isset($_POST['delete'])) {
                    $id = $_POST['id'];
                    $username = $_POST['username'];
                    $db->delete($id, $username);
                    $result = $db->select();
                    fillTable($result);
                }
                // edit
                if (isset($_POST['edit'])) {
                    $id = $_POST['id'];
                    $name = $_POST['name'];
                    $surname = $_POST['surname'];
                    $age = $_POST['age'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $status = $_POST['status'];
                    $db->update($id, $name, $surname, $age, $email, $address, $username, $password, $status);
                    $result = $db->select();
                    fillTable($result);
                }
                // add
                if (isset($_POST['add'])) {
                    // open another page in another window
                    echo "<script>window.open('./add_user.php', '_blank');</script>";
                }
                

            ?>
        </table>
    </section>
</body>

</html>