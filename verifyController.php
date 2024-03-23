<?php

include 'verifyModel.php';
$datos = json_decode(file_get_contents('php://input'), true);
header('Content-Type: application/json');
$res = "";

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
            $res=verifySession();
        break;
    case 'POST':
        if (isset($datos['user']) && isset($datos['password'])) {
            $user = $datos["user"];
            $password = $datos["password"];
            $res = validateUser($user, $password);
        } else {
            $res = "No existen los datos.";
        }
        break;
    case 'PUT':

        break;
    case 'DELETE':

        break;
    default:
        $res = "Metodo HTTP no permitido";
        http_response_code(405);
        break;
}

echo json_encode($res);
