<?php session_start();
if (isset($_SESSION['user'])) {
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="utf-8">
        <title>Panel</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> <!--BOOTSRAP CSS-->
        <link href="https://fonts.googleapis.com/css?family=Nunito|Overpass&display=swap" rel="stylesheet"><!--CSS-->
        <link rel="stylesheet" href="css/index.css" defer>
        <script src="https://unpkg.com/vue@3.2.36/dist/vue.global.js"></script><!--VUE 3-->
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script><!--AXIOS-->
    </head>

    <body class="container-fluid contenido-panel">
        <div id="vue" class="row container align-items-start">
            <div class="row">
                <div class="col-12 d-flex justify-content-start align-items-start">
                    <div>
                        <h4></h4>
                        <h4 class="text-info">{{usuario}}, sumatoria: <label class="text-warning">{{acumulado}}</label> </h4>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center align-items-center text-center">
                <div class="col-12 contador">
                    {{contador}}
                </div>
                <div class="col-12">
                    <button class="boton" @click="cerrarSession()">Cerrar Sesión</button>
                </div>
            </div>
        </div>
        <script src="js/panel.js"></script>
    </body>

    </html>
<?php
} else {
    session_destroy();
    header('location:index.php');
}
?>