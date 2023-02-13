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

if(isset($_POST["atraccion"])){
    $mensaje = "Error al eliminar la atraccion";
            
            if($conexion != null){
                $atraccion = $_POST["atraccion"];
                $comando = $conexion -> prepare("DELETE FROM `atracciones` WHERE nombre = :nombre");
                $comando -> execute(array(":nombre" => $atraccion));
                $mensaje = "Registro eliminado correctamente";
            }
        }
?>

<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<body>
    <div class="container"  style="margin:200px;">
    <div class="row">
        <h1 style="color:black;">Eliminar atraccion</h1>
    </div>
        <div class="row">
        <form method="POST">
            <select required name="atraccion" style="width:200px;margin-bottom:100px;">
                <?php
                    foreach($atracciones as $atraccion){
                    echo "<option>$atraccion</option>";
                    }
                ?>
            </select>
                
                <button>Eliminar</button>
        </form>
        </div>
        <div class="row">
            <?php
            if (isset($mensaje))
                echo "<p>$mensaje</p>";
            ?>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>