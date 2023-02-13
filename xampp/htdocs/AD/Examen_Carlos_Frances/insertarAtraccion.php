<?php

try {
    $conexion = new PDO("mysql:host=localhost;dbname=navapark", "root", "");
    $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $error){
    $conexion = null;
    $mensaje = "<p class='text-warning'>No existe conexión</p>";
}

if($conexion != null){
    if(isset($_POST["nombre"]) && isset($_POST["nombre"])){
        $mensaje = "Error al agregar el registro";
            
            if($conexion != null){
                $nombre = $_POST["nombre"];
            $tematica = $_POST["tematica"];
                $comando = $conexion -> prepare("INSERT INTO `atracciones`(`nombre`,`tematica`) VALUES (:nombre,:tematica)");
                $comando -> execute(array(":nombre" => $nombre, ":tematica" => $tematica));
                $mensaje = "Registro agregado correctamente";
            }
        }
}
?>

<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<body>
    <div class="container" style="margin:300px;">
    <div class="row">
        <h1 style="color:black;">Crear atraccion</h1>
    </div>
        <div class="row">
            <form method="POST">
                <input type="text" name="nombre" required placeholder="crear atracción"/>
                <input type="text" name="tematica" required placeholder="elegir tematica"/>
                <button>Crear atraccion</button>
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
<?php

unset($_POST);
$conexion = null;

?>