<?php
session_start();

require_once("dbutils.php");

try {
    $conexion = new PDO("mysql:host=localhost;dbname=ukulele", "root", "");
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {
    $conexion = null;
    $mensaje = "<p class='text-warning'>No existe conexión</p>";
}

if (!$_SESSION["login"])
    header('Location: login.php');


$filas = execute_query(
    $conexion,
    "select * from ukuleles",
    array()
);




?>

<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>UKULELES</h1>
        <?php

        foreach ($filas as $fila) {
            echo "<ul><li>" . $fila["nombre"] . "<ul></li><li>" . $fila["precio"] . "</li><li>" . $fila["precio"] . "</li><li>" . $fila["longitud"] . "</li><li>" . $fila["numeroCuerdas"] . "</li><li>" . $fila["marca"] . "</li></ul></ul>";
        }

        ?>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>

</html>