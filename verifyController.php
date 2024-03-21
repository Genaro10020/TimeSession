<?php
session_start();
if(isset($_SESSION['nombre'])){
include 'verifyModel.php';
$arreglo = json_decode(file_get_contents('php://input'), true);
header('Content-Type: application/json');
$res = "";

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':

        break;
    case 'POST':
    
            if(isset($_POST["user"]) && $_POST["pass"]){
                $user = $_POST["user"];
                $user = $_POST["pass"];
                $res= "";
            }else{
                $res= "No existen las variables requ";
            }
       
        break;
    case 'PUT':
       
        break;
    case 'DELETE':
      
        break;

    default:
            $res[] = "Método HTTP no permitido";
            http_response_code(405); // Método no permitido
        break;
}

echo json_encode($res);
}else{
    header("Location:index.php");
}
?>