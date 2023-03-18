<?php

require_once("dbutils.php");

try {
    $conexion = new PDO("mysql:host=localhost;dbname=ukulele", "root", "");
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {
    $conexion = null;
    $mensaje = "<p class='text-warning'>No existe conexión</p>";
}

if (isset($_POST["nombre"])) {
    if ($conexion != null) {
        $nombre = $_POST["nombre"];
        $clave = $_POST["clave"];
        $filas = execute_query(
            $conexion,
            "select * from ukuleles where nombre = :nombre and clave = :clave",
            array(":nombre" => $nombre, ":clave" => $clave)
        );
        if ($filas) {
            session_start();
            $_SESSION["login"] = true;
            header('Location: ukuleles.php');
        } else {
            echo "Login incorrecto";
        }


    }
}


?>

<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <center>
        <div class="container">
            <div class="row">
                <h1>Registrar ukulele</h1>
            </div>
            <form method="POST" action="login.php">
                <div class="row">
                    <input type="text" required style="margin-top:4%;" class="form-control" placeholder="nombre"
                        name="nombre" />
                </div>
                <div class="row">
                    <input type="text" required style="margin-top:4%;" class="form-control" placeholder="clave"
                        name="clave" />
                </div>
                <button class="btn btn-info" style="float:left; margin-top:4%;">Registrar Ukulele</button>
            </form>
        </div>
    </center>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>

</html>