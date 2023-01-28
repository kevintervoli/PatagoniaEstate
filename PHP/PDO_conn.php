<?php

$dbhost = "localhost";
$dbname = "real_estate";
$dbuser = "root";
$dbpass = "";
error_reporting(E_ALL ^ E_WARNING);

try{
    $pdo = new PDO("mysql:host=127.0.0.1:3307;dbname=$dbname", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected Successfully";

    $username = null;
    $password = null;
    if(isset($_POST))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
    }

    $stmt = $pdo->prepare("select * from users where username=:username and Password=:pass;");
    $stmt->execute(
        [':username'=>$username, ':pass'=>$password]
    );
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    echo $row['username'];
    if(!is_null($row['Status']) && $row['Status']==1){
        header("Location: ../view-php/admin.php");
    }

}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}



?>