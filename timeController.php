<?php
session_start();
include 'timeModel.php';
$datos = json_decode(file_get_contents('php://input'), true);
header('Content-Type: application/json');
$res = "";

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $res = tomandoTiempo();
        break;
    case 'POST':

        break;
    case 'PUT':
        $res = updateTime();
        break;
    case 'DELETE':

        break;
    default:
        $res = "Metodo HTTP no permitido";
        http_response_code(405);
        break;
}

echo json_encode($res);
