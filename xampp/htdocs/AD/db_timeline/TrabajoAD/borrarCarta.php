<?php

    $mensaje = null;

    try {
        $conexion = new PDO("mysql:host=localhost;dbname=rankingJuego", "root", "");
        $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $error){
        $conexion = null;
    }
    
    $comando = $conexion -> prepare("SELECT nombre FROM mazos");
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