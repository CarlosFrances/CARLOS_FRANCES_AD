<?php

//Creación de una conexión
try {
    $conexion = new PDO("mysql:host=localhost;dbname=navapark", "root", "");
    $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $error){
    $conexion = null;
    $mensaje = "<p class='text-warning'>No existe conexión</p>";
}

$comando = $conexion -> prepare("SELECT nombre FROM atracciones");
$comando -> execute();
$atracciones = $comando -> fetchAll(PDO::FETCH_COLUMN);

$comando = $conexion -> prepare("SELECT * FROM viajes");
$comando -> execute();
$viajes = $comando -> fetchAll(PDO::FETCH_ASSOC);   
?>


<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<body>
    <div class="container"  style="margin:200px;">
    <div class="row">
        <h1 style="color:black;">Vista general</h1>
        <?php
            foreach($atracciones as $atraccion){
                echo "<div class='row' style='margin-left:30px;'><h3>".$atraccion."</h3></div>"; 
                $comando = $conexion -> prepare("SELECT hora,edad FROM viajes where atraccion=:atraccion");
                $comando -> execute(array(":atraccion" => $atraccion));
                $viajesIter = $comando -> fetchAll(PDO::FETCH_ASSOC);  
                foreach($viajesIter as $viaje) 
                echo "<div class='row' style='margin-left:60px;'><h6>Hora del viaje: ".$viaje["hora"].", edad: ".$viaje["edad"]." años</h6></div>";  
            }
            
        ?>
    </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>