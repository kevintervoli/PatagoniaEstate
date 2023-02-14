<?php
session_start();

unset($_SESSION['username']);
unset($_SESSION['Status']);

session_destroy();
 // Destroying All Sessions{
header('Location: ../view-php/login.php'); // Redirecting To Home Page

?>