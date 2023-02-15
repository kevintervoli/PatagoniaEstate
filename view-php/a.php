<?php
$pass = "pass";
$hash = password_hash($pass, PASSWORD_BCRYPT);
echo $hash;
echo '"'.password_verify($pass, $hash).'"';
?>