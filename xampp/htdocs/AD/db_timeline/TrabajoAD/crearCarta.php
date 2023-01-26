<?php

$mensaje = null;

//Comprobar que existen valores en el POST
if(isset($_POST["mazo"]) && isset($_POST["anio"]) && isset($_POST["titulo"]) && isset($_POST["imagen"])){
    $mazo = $_POST["mazo"];
    $anio = $_POST["anio"];
    $titulo = $_POST["titulo"];
    $imagen = $_POST["imagen"];

    //Creación de una conexión
    try{
        $conexion = new PDO("mysql:host=localhost;dbname=rankingjuego", "root", "");
        $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $error){
        $conexion = null;
        $mensaje = "<p class='text-warning'>No existe conexión</p>";
    }

    //Comprobar que no exista la carta creada
    if($conexion != null){
        $comando = $conexion -> prepare("SELECT tiempo FROM cartas Where mazo=:mazo");
        $comando -> execute(array(":mazo" => $mazo));
        $resultado = $comando -> fetchAll(PDO::FETCH_COLUMN);
        echo "<script>console.log('hola')</script>";

        if(in_array($anio, $resultado)){
            $mensaje = "<p class='text-danger'>Ya existe una carta creada del año $anio</p>";
            
        } else {
            $comando = $conexion -> prepare("INSERT INTO cartas (mazo, tiempo, evento, imagen) VALUES (:mazo, :tiempo, :evento, :imagen)");
            $comando -> execute(array(
                ":mazo" => $mazo,
                ":tiempo" => $anio,
                ":evento" => $titulo,
                ":imagen" => $imagen
            ));
            $mensaje = "<p class='text-success'>carta creada correctamente en el mazo de $mazo</p>";
        }       
    }
}


try {
    $conexion = new PDO("mysql:host=localhost;dbname=rankingJuego", "root", "");
    $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $error){
    $conexion = null;
}

$comando = $conexion -> prepare("SELECT nombre, descripcion FROM mazos");
$comando -> execute();
$resultado = $comando -> fetchAll(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html>
    <head>
        <title>Timeline - AD</title>
        <meta charset="UTF-8">
        <meta name="google" content="notranslate">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <div class="contenedorCentrado">
            <form method="POST">
                <div class="row">
                    <p>
                        Selecciona un mazo
                        <select id="mazos" name="mazo">
                            <?php
                                foreach($resultado as $mazo){
                                    echo "<option>". $mazo["nombre"] ."</option>";
                                }
                            ?>
                        </select>
                    </p>
                </div>
                <div class="row">
                        <input type="text" name="anio" class="form-control" placeholder="Año del evento..."/>
                </div><br/>
                <div class="row">
                        <input type="text" name="titulo" class="form-control" placeholder="Titulo del evento..."/>
                </div><br/>
                <div class="row">
                    <input type="text" class="form-control" name="imagen" placeholder="ruta a la imagen">
                </div><br/>
                <div class="row" style="margin-left:90px">
                    <button class="btn btn-primary">Crear carta</button>
                </div>
                <?php if($mensaje != null) echo '<divclass="row">'.$mensaje.'</div>'; ?>
            </form>
        </div>
    </body>
</html>
<?php

$conexion = null;

?>