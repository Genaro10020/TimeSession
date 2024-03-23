<?php
session_start();
if (isset($_SESSION['user']) && isset($_SESSION['id'])) {
    include("conexion.php");
    $estado = false;
    $id = $_SESSION['id'];

    $fecha_actual = date("Y-m-d"); // Obtener fecha y hora actual

    $current_time = time();
    $login_time = $_SESSION['login_time'];
    $session_duration = $current_time - $login_time;
    $session_time = gmdate("H:i:s", $session_duration);
    $time_befero = $_SESSION['time_before'];
    if ($_SESSION['date'] === $fecha_actual) {
        // Converti  tiempos a segundos
        $session_time_seconds = strtotime($session_time) - strtotime('00:00:00');
        $time_before_seconds = strtotime($_SESSION['time_before']) - strtotime('00:00:00');

        // Sume tiempos en segundos y luego converti a formato de hora
        $total_seconds = $session_time_seconds + $time_before_seconds;
        $session_time = gmdate("H:i:s", $total_seconds);
    }

    $update = "UPDATE users SET time=?, fecha=? WHERE id=?";
    $stmt = $conexion->prepare($update);
    $stmt->bind_param("ssi", $session_time, $fecha_actual, $id); // Bind parameters
    if ($stmt->execute()) {
        $estado = true;
    }

    $stmt->close();
    $conexion->close();
    $estado_str = $estado ? true : false;
    session_destroy();
    return $estado_str;
} else {
    session_destroy();
    return true;
}
