<?php
function tomandoTiempo()
{

    $current_time = time();
    $login_time = $_SESSION['login_time'];
    $session_duration = $current_time - $login_time;
    $session_time = gmdate("H:i:s", $session_duration);
    $time_acumulado = $_SESSION['time_before'];
    $usuario = $_SESSION['user'];
    return array($session_time, $time_acumulado, $usuario);
}

function updateTime()
{
    return include("saveTime.php");
}
