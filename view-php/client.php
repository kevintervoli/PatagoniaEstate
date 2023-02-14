<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="center_div">
    <h1>Client Page</h1>
    Click here to <a href="../PHP/logout.php">Logout</a>
    <a  class='btn btn-primary btn-sm' href="../index.php">GO HOME</a>
    </div>
    <div class="gallery">
    <?php include '../PHP/loadClient.php';?>
    </div>
</body>
</html>