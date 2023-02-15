<?php
    require_once '../PHP/rest_api.php';
    $method = $_SERVER['REQUEST_METHOD'];
        switch( $method ){
            case 'GET':
                $db = new Database();
                $result = $db->select();
                header('HTTP/1.1 200 OK');
                echo json_encode($result);
                break;
            case 'DELETE':
                $db = new Database();
                $db->delete( $_GET['id'] , $_GET['username']);
                header('HTTP/1.1 200 OK');
                echo json_encode("User deleted successfully");
                break;
            default:
            // method not allowed
            header('HTTP/1.1 405 Method Not Allowed');
            break;
        }

?>