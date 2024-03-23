<?php
function tomandoTiempo()
{
    session_start();
    $usuario = "";
    $time_acumulado = "";
    $session_time = "";
    if (isset($_SESSION['user'])) {
        $session_open = true;
        $usuario = $_SESSION['user'];
        $current_time = time();
        $login_time = $_SESSION['login_time'];
        $session_duration = $current_time - $login_time;
        $session_time = gmdate("H:i:s", $session_duration);
        $time_acumulado = $_SESSION['time_before'];
    } else {
        session_destroy();
        $session_open = false;
    }
    return array($session_open, $session_time, $time_acumulado, $usuario);
}

function cerrarSession()
{
    return include("saveTime.php");
}
