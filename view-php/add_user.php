<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
    <h1>New User</h1> 
    <form method="post">
        <div class="row mb-1">
            <label for="name" class="col-sm-1 col-form-label">Name</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="surname" class="col-sm-1 col-form-label">Surname</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="surname" name="surname" placeholder="Surname" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="age" class="col-sm-1 col-form-label">Age</label>
            <div class="col-sm-6">
                <input type="number" class="form-control" id="age" name="age" placeholder="Age" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="email" class="col-sm-1 col-form-label">Email</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="email" name="email" placeholder="Email" required pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$">
            </div>
        </div>
        <div class="row mb-3">
            <label for="address" class="col-sm-1 col-form-label">Address</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="address" name="address" placeholder="Address" required >
            </div>
        </div>
        <div class="row mb-3">
            <label for="username" class="col-sm-1 col-form-label">Username</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="password" class="col-sm-1 col-form-label">Password</label>
            <div class="col-sm-6">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required pattern = "^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$">
            </div>
        </div>
        <div class="row mb-3">
            <label for="confirm_password" class="col-sm-1 col-form-label">User Status</label>
            <div class="col-sm-6">
                <input type="password" class="form-control" id="status" name="status" placeholder="User Status" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <input type="submit" class="btn btn-primary" name="add" value="add" value="Add User">
            </div>
        </div>
    </form>
    <?php
    require_once '../PHP/rest_api.php';
    $db = new Database();
    // add user
        if(isset($_POST['add'])){
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $age = $_POST['age'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $status = $_POST['status'];
            $password = password_hash($password, PASSWORD_BCRYPT);
            $db->insert($name, $surname, $age, $email, $address, $username, $password, $status);
        }
    ?>

</body>
</html>