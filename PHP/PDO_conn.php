<?php

$dbhost = "localhost";
$dbname = "real_estate";
$dbuser = "root";
$dbpass = "";

try{
    $pdo = new PDO("mysql:host=127.0.0.1:3306;dbname=$dbname", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $username = null;
    $password = null;
    if(isset($_POST))
    {
        $username_temp = $_POST['username'];
        $password_temp = $_POST['password'];
        
        $username=filter_var($username_temp, FILTER_SANITIZE_STRING);
        $password=filter_var($password_temp, FILTER_SANITIZE_STRING);
        $stmt = $pdo->prepare("select * from users where username=:username");
    
    $stmt->execute(
        [':username'=>$username]
    );
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if($row){
        if(password_verify($password,$row['Password'])){
            if(!is_null($row['Status']) && $row['Status']==0){
                session_start();
                $_SESSION['username'] = $username;
                header("Location: ../view-php/admin.php");
            }
            else if(!is_null($row['Status']) && ($row['Status']==1 || $row['Status']==2)){
                
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['Status']=$row['Status'];
                header("Location: ../view-php/client.php");
            }
        }
        else{
            echo "Username or password is incorrect";
        }
    }
    }

}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}



?>