<?PHP

include '../PHP/connect_to_database.php';

$username = '';
$password = '';
if(isset($_POST['username'])){
    $username = $_POST['username'];
}

if(isset($_POST['password'])){
    $password = $_POST['password'];
}
$sql = "SELECT * FROM users WHERE username = '$username' AND pass = '$password'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if($row['username'] == $username && $row['pass'] == $password){
            session_start();
            $_SESSION['username'] = $username;
            if($row['admin']){
                header('Location: ../admin.php');
            }

        } else {
            echo "Login failed";
        }
    }
}
$conn->close();
?>