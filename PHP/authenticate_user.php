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
// print query result
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if($row['username'] == $username && $row['pass'] == $password){
            session_start();
            $_SESSION['username'] = $username;
            if($row['admin']){
                header('Location: ../admin.php');
            }
            else {
                header('Location: ../tesing.php');
            }
        } else {
            echo "Login failed";
        }
    }
}
$conn->close();
?>