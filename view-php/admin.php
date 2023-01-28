<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <h1>Welcome</h1>
    Click here to <a href="./PHP/logout.php">Logout</a>
    <?php
    require_once '../PHP/rest_api.php';
    $db = new Database();
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
        <input type="number" name="age" placeholder="Age"/>
        <input type="text" name="email" placeholder="Email" />
        <input type="text" name="address" placeholder="Address" />
        <input type="text" name="username" placeholder="Username" />
        <input type="text" name="password" placeholder="Password" />
        <input type="number" name="status" placeholder="Status" />

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
                <th>Age</th>
                <th>Email</th>
                <th>Address</th>
                <th>Username</th>
                <th>Passowrd</th>
                <th>Status</th>
            </tr>
            <?php
                function fillTable($result1)
                {
                    foreach ($result1 as $rows) {
                        echo "<tr><td>" . $rows["ID"] . "</td><td>" . $rows["Name"] . "</td><td>" . $rows["Surname"] . "</td><td>" . $rows["Age"] . "</td><td>" . $rows["Email"] . "</td><td>" . $rows["Address"] . "</td><td>" . $rows["username"] . "</td><td>" . $rows["Password"] . "</td><td>" . $rows["Status"] . "</td></tr>";
                    }
                }
                // use fill table if the button is pressed
                if (isset($_POST['button'])) {
                    $result = $db->select();
                    // turn result into an array

                    // var_dump($result);
                    // fillTable($result);
    
                } 
            ?>
        </table>
    </section>
</body>

</html>