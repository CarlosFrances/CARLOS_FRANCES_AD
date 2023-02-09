<?php

    try{
        $conexion = new PDO("mysql:host=localhost;dbname=pruebas", "root", "");
        $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $error){
        $conexion = null;
        $mensaje = "<p>No hay conexion</p>";
    }

    $filaInsertada=false;

    if(isset($_POST["nombre"]) && isset($_POST["precio"]) && isset($_POST["cantidad"])){
        $nombre = $_POST["nombre"];
        $precio = $_POST["precio"];
        $cantidad = $_POST["cantidad"];

        $comando = $conexion->prepare("insert into articulos (nombre,precio,cantidad) values(:nombre, :precio, :cantidad)");
        $comando->execute(array(":nombre" => $nombre, ":precio" => $precio, ":cantidad" => $cantidad));

        $filaInsertada=true;
    }else echo "<p>no</p>";

    if($conexion != null){
        $comando = $conexion->prepare("select nombre from articulos");
        $comando->execute();
        $articulos = $comando->fetchAll(PDO::FETCH_COLUMN);
    }
?>

<html>
    <head></head>
    <body>
        <form method="POST">
            <select>
                <?php
                    foreach($articulos as $articulo){
                        echo "<option>$articulo</option>";
                    }
                ?>
            </select>
            <input type="text" name="nombre" placeholder="nombre...">
            <input type="number" name="precio" placeholder="precio...">
            <input type="number" name="cantidad" placeholder="cantidad...">
            <?php
                if($filaInsertada){
                echo "<p>$nombre</p>";
                echo "<p>$precio</p>";
                echo "<p>$cantidad</p>";
            } else
                echo "<p>fila no insertada</p>";
            ?>
            <button>Go</button>
        </form>
    </body>
</html>