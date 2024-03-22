<?php session_start();
include("saveTime.php");
session_destroy();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Accesos</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito|Overpass&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css" defer>
    <script src="https://unpkg.com/vue@3.2.36/dist/vue.global.js"></script><!--VUE 3-->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> <!--AXIOS-->
</head>

<body>
    <div id="vue" class="contenedor">
        <div class="central">
            <div class="login">
                <div class="titulo">
                    CREDENCIALES
                </div>
                <form @submit.prevent="verifyUser()">
                    <label>Usuario:</label>
                    <input type="text" v-model="user" name="usuario" placeholder="Usuario">
                    <label>Contraseña:</label>
                    <input type="password" v-model="password" placeholder="Contraseña" name="password">
                    <div class="submit">
                        <button type="submit" title="Ingresar" name="Ingresar">Login</button>
                    </div>
                </form>
                <div class="pie-form">
                    <a href="contrasena.html">¿Perdiste tu contraseña?</a>
                    <a href="registrate.html">¿No tienes Cuenta? Registrate</a>
                </div>
            </div>
        </div>
    </div>
    <script src="js/index.js"></script>
</body>

</html>