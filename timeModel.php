<?php
function tomandoTiempo()
{

    $current_time = time();
    $login_time = $_SESSION['login_time'];
    $session_duration = $current_time - $login_time;
    $session_time = gmdate("H:i:s", $session_duration);
    $time_acumulado = $_SESSION['time_before'];
    $usuario = $_SESSION['user'];
    $hoy = date("Y-m-d");
    if($hoy !== $_SESSION['date']){
        $_SESSION['time_before'] = '00:00:00';
    }

    
    return array($session_time, $time_acumulado, $usuario,$_SESSION['time_before']);
}

function updateTime()
{
    return include("saveTime.php");
}
