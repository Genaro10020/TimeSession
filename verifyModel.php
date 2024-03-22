<?php
include("conexion.php");

function validateUser($user, $password)
{
    global $conexion;

    $consult = "SELECT * FROM users WHERE user=? AND password=?";
    $stmt = $conexion->prepare($consult);
    if (!$stmt) {
        return $conexion->error;
    }

    $stmt->bind_param("ss", $user, $password);
    if (!$stmt->execute()) {
        $stmt->close();
        return $conexion->error;
    }

    $result = $stmt->get_result();
    $count = $result->num_rows;
    if ($count > 0) {
        $fila = $result->fetch_assoc();
        session_start();
        $_SESSION['user'] = $fila['user'];
        $_SESSION['id'] = $fila['id'];
        $_SESSION['time_before'] = $fila['time'];
        $_SESSION['date'] = $fila['fecha'];
        $_SESSION['login_time'] = time();
    }
    $stmt->close();
    $conexion->close();
    return ($count > 0) ? true: false;
}
