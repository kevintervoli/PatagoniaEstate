<?php
$uri =  $_SERVER['REQUEST_URI'];
$URL = rtrim($uri, '/');
$URL = filter_var($URL, FILTER_SANITIZE_URL);
$URL = explode('/', $URL);
$URL = array_slice($URL, 3);
$tableName = explode('?', $URL[0]);
$tableName = $tableName[0] ?? NULL;
switch ($tableName) {
    case 'users':
        require_once 'users.php';
        break;
    default:
        header('HTTP/1.1 404 Not Found');
        echo json_encode(array('message' => 'Not Found'));
        break;
}
